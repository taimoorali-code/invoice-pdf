<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ClientDetails;
use App\Models\LineItem;
use App\Models\ShippingAddress;
use App\Models\ShippingLine;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mpdf\Mpdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('index', compact('orders'));
    }

    public function viewInvoice($id)
    {
        $order = Order::with(['shippingAddress', 'lineItems', 'clientDetails'])
        ->findOrFail($id);

        return view('invoice', compact('order'));
    }

    public function downloadInvoice($id)
    {
        $order = Order::findOrFail($id);
        $pdf = Pdf::loadView('welcome', compact('order'));
        $pdfFileName = $order->id . '.pdf';

        return $pdf->download($pdfFileName);
    }

    public function store(Request $request)
    {
        // Validate the uploaded file
        $validator = Validator::make($request->all(), [
            'json_file' => 'required|file|mimes:json',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        try {
            // Load the JSON file
            $jsonContent = file_get_contents($request->file('json_file')->getRealPath());
            $data = json_decode($jsonContent, true);
    
            // Check if the JSON decoding was successful
            if (json_last_error() !== JSON_ERROR_NONE) {
                return response()->json(['error' => 'Invalid JSON format'], 422);
            }
    
            $order = DB::transaction(function () use ($data) {
                // Start by storing the order details
                $orderData = $data['order'];
    
                $order = Order::create([
                    'admin_graphql_api_id' => $orderData['admin_graphql_api_id'],
                    'app_id' => $orderData['app_id'],
                    'browser_ip' => $orderData['browser_ip'],
                    'buyer_accepts_marketing' => $orderData['buyer_accepts_marketing'],
                    'cancel_reason' => $orderData['cancel_reason'],
                    'cart_token' => $orderData['cart_token'],
                    'checkout_id' => $orderData['checkout_id'],
                    'checkout_token' => $orderData['checkout_token'],
                    'confirmation_number' => $orderData['confirmation_number'],
                    'confirmed' => $orderData['confirmed'],
                    'contact_email' => $orderData['contact_email'],
                    'created_at' => $orderData['created_at'],
                    'currency' => $orderData['currency'],
                    'current_subtotal_price' => $orderData['current_subtotal_price'],
                    'current_total_discounts' => $orderData['current_total_discounts'],
                    'current_total_price' => $orderData['current_total_price'],
                    'current_total_tax' => $orderData['current_total_tax'],
                    'customer_locale' => $orderData['customer_locale'],
                ]);
    
                // Store client details
                if (isset($orderData['client_details'])) {
                    ClientDetails::create([
                        'order_id' => $order->id,
                        'accept_language' => $orderData['client_details']['accept_language'],
                        'browser_ip' => $orderData['client_details']['browser_ip'],
                        'user_agent' => $orderData['client_details']['user_agent'],
                    ]);
                }
    
                // Store shipping address
                if (isset($orderData['shipping_address'])) {
                    ShippingAddress::create([
                        'order_id' => $order->id,
                        'first_name' => $orderData['shipping_address']['first_name'],
                        'last_name' => $orderData['shipping_address']['last_name'],
                        'address1' => $orderData['shipping_address']['address1'],
                        'address2' => $orderData['shipping_address']['address2'],
                        'city' => $orderData['shipping_address']['city'],
                        'province' => $orderData['shipping_address']['province'],
                        'zip' => $orderData['shipping_address']['zip'],
                        'country' => $orderData['shipping_address']['country'],
                        'phone' => $orderData['shipping_address']['phone'],
                    ]);
                }
    
                // Store line items
                if (isset($orderData['line_items'])) {
                    foreach ($orderData['line_items'] as $item) {
                        LineItem::create([
                            'order_id' => $order->id,
                            'title' => $item['title'],
                            'quantity' => $item['quantity'],
                            'price' => $item['price'],
                            'product_id' => $item['product_id'],
                        ]);
                    }
                }
    
                // Store shipping lines
                if (isset($orderData['shipping_lines'])) {
                    foreach ($orderData['shipping_lines'] as $line) {
                        ShippingLine::create([
                            'order_id' => $order->id,
                            'title' => $line['title'],
                            'code' => $line['code'],
                            'price' => $line['price'],
                        ]);
                    }
                }
                
            });
    
                $orders = Order::orderBy('created_at', 'desc')->get();

                return redirect()->route('orders.index')->with('orders', $orders);
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}

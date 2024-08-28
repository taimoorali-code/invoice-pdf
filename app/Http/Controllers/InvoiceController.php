<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function generateInvoice(Request $request)
    {
        $json = json_decode(file_get_contents(resource_path('json/5649919246528.json')), true);
        $invoice = $json['order'];
        dd($invoice);
        $pdf = Pdf::loadView('invoice', ['invoice' => $invoice]);
        return $pdf->download('invoice.pdf');
    }
}

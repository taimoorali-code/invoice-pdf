<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div style="max-width: 800px; margin:auto;">
        <table style="width: 80%; margin-top: 20px; border-collapse: collapse;">
            <tr>
                <td style="width: 33%; vertical-align: top;">
                    <h1 style="color: #d18a7d; margin-bottom: 16px;">{{ __('invoice.invoice_title') }}</h1>
                    <div style="margin-bottom: 12px; display: flex; flex-direction: column">
                        <span style="color: #d18a7d;">{{ __('invoice.invoice') }}:</span> <br>
                        <span style="font-weight: bold;">{{ $order->id }}</span>
                    </div>
                    <div style="display: flex; flex-direction: column">
                        <span style="color: #d18a7d;">{{ __('invoice.issue_date') }}:</span> <br>
                        <span style="font-weight: bold;">{{ $order->created_at->format('M. d, Y') }}</span>
                    </div>
                </td>
                <td style="width: 33%; vertical-align: top; padding: 16px; border-left: 2px solid #d18a7d;">
                    <span style="font-weight: bold; color: #d18a7d;">{{ __('invoice.sold_by') }}</span>
                    <div style="display: flex; flex-direction: column; margin: 8px 0;">
                        <span style="font-weight: bold;">Noha Nabil Beauty FZCo</span>
                        <span>Office No. B34BS33O002</span>
                        <span>Jafza 22 Building</span>
                        <span>Jebel Ali Free Zone</span>
                        <span>Dubai</span>
                        <span>DU</span>
                        <span>United Arab Emirates</span>
                        <span>TRN: 100454885300003</span>
                    </div>
                    <div style="display: flex; flex-direction: column; margin-top: 40px;">
                        <span style="font-weight: bold; color: #d18a7d;">CLIENT</span> <br>
                        <span style="font-weight: bold;">{{ $order->shippingAddress->first_name }} {{ $order->shippingAddress->last_name }}
                            </span><br>
                        <span>{{ $order->shippingAddress->city }}</span><br>
                        <span>{{ $order->shippingAddress->address1 }}</span><br>
                        <span>{{ $order->shippingAddress->zip }}</span><br>
                    </div>
                </td>
                <td style="width: 33%; vertical-align: top; padding: 16px;">
                    <img width="122" height="55"
                        src="data:image/png;base64,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"
                        alt="Company Logo" />
                </td>
            </tr>
        </table>

        <div style="margin-top: 20px; overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="border-bottom: 3px solid #d18a7d;">
                    <tr>
                        <th style="color: #d18a7d; width: 30%;">{{ __('invoice.item') }}</th>
                        <th style="color: #d18a7d; width: 20%;">{{ __('invoice.description') }}</th>
                        <th style="color: #d18a7d; width: 10%;">{{ __('invoice.quantity') }}</th>
                        <th style="color: #d18a7d; width: 10%;">{{ __('invoice.unit_price') }}</th>
                        <th style="color: #d18a7d; width: 10%;">{{ __('invoice.discount') }}</th>
                        <th style="color: #d18a7d; width: 10%;">{{ __('invoice.tax_amount') }}</th>
                        <th style="color: #d18a7d; width: 10%;">{{ __('invoice.total') }}</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($order->lineItems as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $order->current_total_discounts }}%</td>
                        <td>{{ $order->current_total_tax }}د.إ</td>
                        <td>{{ $item->quantity * $item->price }}</td>
                    </tr>
                    @endforeach


                    <!-- New rows with colspan -->
                    <tr style="margin-top: 20px">
                        <td colspan="2" style="padding: 8px; border-bottom: 1px solid #ddd;"></td>
                        <td colspan="3" style="padding: 8px; border-bottom: 1px solid #ddd; vertical-align: middle;">
                            {{ __('invoice.total') }}</td>
                        <td colspan="2"
                            style="padding: 8px; border-bottom: 1px solid #ddd; text-align: right; vertical-align: middle;">
                            {{ $order->current_total_price }}</td>
                    </tr>
                    <tr style="margin-top: 20px">
                        <td colspan="2" style="padding: 8px;"></td>
                        <td colspan="3" style="padding: 8px; vertical-align: middle;">{{ __('invoice.amount_paid') }}</td>
                        <td colspan="2" style="padding: 8px; text-align: right; vertical-align: middle;">0.00 د.إ</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 20px; border: 1px dotted #d18a7d; width: 100%; border-collapse: collapse;">
            <table style="width: 100%; border: none;">
                <tr>
                    <td style="width: 25%; padding: 20px 4px; color: #d18a7d;">{{ __('invoice.issue_date') }}:</td>
                    <td style="width: 25%; padding: 20px 4px; color: #d18a7d;">{{ $order->created_at->format('M. d, Y') }}</td>
                    <td style="width: 25%; padding: 20px 4px; color: #d18a7d;">{{ __('invoice.amount_due') }}:</td>
                    <td style="width: 25%; padding: 20px 20px; text-align: right; color: #d18a7d;">{{ $order->current_total_price }} إ.د</td>
                </tr>
            </table>
        </div>
        

        <div style="background: #e7e6e6; padding: 40px 20px; margin-top: 20px;">
            <div style="padding: 20px;">
                <!-- Thank you message and payment/order details -->
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <tr>
                        <td style="width: 66.66%; padding-right: 10px;">
                            <span>{{ __('invoice.thank_you_for_your_purchase') }}</span>
                        </td>
                        <td style="width: 33.33%; padding-left: 10px; border-left: 2px solid #cecdcdb0;">
                            <div>
                                <span style="color: #d18a7d; font-weight: bold;">{{ __('invoice.payment_method') }}</span><br>
                                <span style="font-weight: bold;">Credit Card</span>
                            </div>
                            <div style="margin-top: 10px;">
                                <span style="color: #d18a7d; font-weight: bold;">{{ __('invoice.order_number') }}</span><br>
                                <span>#{{ $order->confirmation_number }}</span>
                            </div>
                        </td>
                    </tr>
                </table>
                
                <!-- Contact information -->
                <div style="border-top: 2px solid #cecdcdb0; padding-top: 20px; margin-top: 20px;">
                    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                        <tr>
                            <td style="width: 25%; padding-right: 10px; border-right: 2px solid #cecdcdb0;">
                                <span style="color: #d18a7d; font-weight: bold;">Noha Nabil Beauty FZCO</span>
                            </td>
                            <td style="width: 25%; padding-right: 10px; border-right: 2px solid #cecdcdb0;">
                                <span style="font-weight: bold;">Phone: +9718006642</span>
                            </td>
                            <td style="width: 25%; padding-right: 10px; border-right: 2px solid #cecdcdb0;">
                                <span>Email: customercare@nnbeauty.com</span>
                            </td>
                            <td style="width: 25%; padding-right: 10px;">
                                <span>Website: nohanabil.com</span>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <!-- Social media and link -->
                <div style="margin-top: 20px; text-align: center;">
                    <span>Facebook: facebook.com/NohaNabilBeauty</span>
                </div>
                <div style="margin-top: 20px; text-align: center;">
                    <span>View this document online at https://noha-nabil.sufio.com/cxqy9zseba4q?fekfcevfcg.</span>
                </div>
            </div>
        </div>
        
    </div>


</body>

</html>

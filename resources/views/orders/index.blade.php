<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            Orders Details
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('invoice.order_id') }}</th>
                        <th>{{ __('invoice.customer_email') }}</th>
                        <th>{{ __('invoice.subtotal_price') }}</th>
                        <th>{{ __('invoice.total_price') }}</th>
                        <th>{{ __('invoice.order_date') }}</th>
                        <th>{{ __('invoice.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->contact_email }}</td>
                        <td>{{ $order->current_subtotal_price }}</td>
                        <td>{{ $order->current_total_price }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('orders.invoice.view', $order->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> {{ __('invoice.view_invoice') }}
                            </a>
                            <a href="{{ route('orders.invoice.download', $order->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-download"></i> {{ __('invoice.download_pdf') }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

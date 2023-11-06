<div class="modal fade" id="verModal" wire:model="modal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="verModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verModalLabel">Create New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($order)
                    <h5><b>Order Ref:</b>{{ $order->order_ref }}</h5>
                    <h5><b>Customer Name:</b>{{ $order->customer_name }}</h5>
                    <h5>
                        <b>Total Qty:</b>
                        {{ $order->orderLines->sum('qty') }}
                    </h5>
                    <hr>
                    <h5>Detalle de orden</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Costo</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderLines as $orderLine)
                                <tr>
                                    <td> {{ $orderLine->id }}</td>
                                    <td> {{ $orderLine->product->name }}</td>
                                    <td> {{ $orderLine->product->cost }}</td>
                                    <td> {{ $orderLine->qty }}</td>
                                    <td> {{ $orderLine->qty * $orderLine->product->cost }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td><b>Total:</b> {{ $totalCantidad }}</td>
                                <td><b>Total:</b> {{ $total }}</td>
                            </tr>
                        </tfoot>
                    </table>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

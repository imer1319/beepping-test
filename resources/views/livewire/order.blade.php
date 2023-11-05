<div>
    @include('livewire.show')
    <div class="form-group">
        <input wire:model.debounce.1500ms='search' type="text" class="form-control" name="search" id="search"
            placeholder="Buscar orden">
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order Ref</th>
                <th>Customer Name</th>
                <th>Total Qty</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_ref }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->orderLines->sum('qty') }}</td>
                    <td>
                        <a data-toggle="modal" data-target="#verModal" class="btn btn-primary"
                            wire:click="show({{ $order->id }})">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
</div>

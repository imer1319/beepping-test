<?php

namespace App\Http\Livewire;

use App\Models\Order as ModelsOrder;
use Livewire\Component;
use Livewire\WithPagination;

class Order extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $modal = false;
    public $search = "";
    public $order;
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        return view('livewire.order', [
            'orders' => ModelsOrder::with('orderLines')
                ->latest()
                ->orWhere('order_ref', 'LIKE', $search)
                ->orWhere('customer_name', 'LIKE', $search)
                ->paginate(10),
        ]);
    }

    public function show($id)
    {
        $this->order = ModelsOrder::with('orderLines', 'orderLines.product')->findOrFail($id);
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }
}

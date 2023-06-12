<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Detalle;
use App\Models\Tipo;
use Livewire\Component;

class VehiculoComponent extends Component
{

    use WithPagination;
    public $IdD, $tipos, $tipo/* , $detalles */, $tipo_id, $description, $search;

    protected $rules = [
        'tipo_id' => 'required',
        'description' => 'required|string|min:4',
    ];    

    protected $messages = [
        'tipo_id.required' => 'The Type field is required.',
        'description.required' => 'The Details field is required.',        
        'description.min' => 'The Details field must be at least 4 characters.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function clear()
    {
        $this->tipo = "";
        $this->tipo_id = "";
        $this->description = "";
    }

    public function render()
    {
        $this->tipos = Tipo::where('estado', true)->get();

        return view('livewire.vehiculo-component',[
            /* 'detalles' => Detalle::where('description', 'like', '%' . $this->search . '%')->paginate(4) */
            'detalles' => Detalle::where('estado', true)->paginate(4)
        ]);
    }

    public function store()
    {
        $this->validate();

        Detalle::create([
            'tipo_id' => $this->tipo_id,
            'description' => $this->description,
            $this->clear()
        ]);
    }

    public function insert(){
        $this->validate(['tipo' => 'required'],
    [
        'tipo.required' => 'The Type field is required.',
    ]);
        Tipo::create([
            'tipo' => $this->tipo,
            $this->clear()
        ]);
    }

    public function edit($id)
    {
        $detalle = Detalle::findOrFail($id);
        $this->clear();
        $this->tipo_id = $detalle->tipo_id;
        $this->description = $detalle->description;
        $this->IdD = $detalle->id;
    }

    public function update($id)
    {
        $this->validate();
        $detalle = Detalle::findOrFail($id);
        $detalle->tipo_id = $this->tipo_id;
        $detalle->description = $this->description;
        $detalle->save();
        $this->clear();
        
    }

    public function delete($id)
    {
        $detalles = Detalle::find($id);
        $detalles->estado = false;
        $detalles->save();
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Distribuidora;
use App\Models\Desarrolladora;

class Selector extends Component
{
    public $desarrolladoras = [];
    public $distribuidoras;
    public $distrId;
    public $desarId;

    public function mount()
    {
        $this->distribuidoras = Distribuidora::all();
        $this->desarrolladoras = collect();
    }
    public function render()
    {
        return view('livewire.selector');
    }
    public function updatedDesarId($valor)
    {
        dd("Hola");
        $this->desarrolladoras = Desarrolladora::where('distri_id', $valor)->get();
        $this->desarrolladora = $this->desarrolladoras->first()->id ?? null;
    }
}

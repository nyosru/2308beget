<?php

namespace App\Livewire\Cup;

use App\Models\krugi\Cup;
use Livewire\Component;

class Index extends Component
{
    public $cups;

    public function mount(){
        $this->cups = Cup::all();
    }

    public function render()
    {
        return view('livewire.cup.index');
    }
}

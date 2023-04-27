<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $search;

    public function render()
    {
        $this->emit('getSearch', $this->search);
        return view('livewire.search');
    }
}

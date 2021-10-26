<?php

namespace App\Http\Livewire\Navigation;

use Livewire\Component;

class TopNavi extends Component
{
    public function render()
    {
        return view('livewire.navigation.top-navi')
            ->extends('layouts.app');
    }
}

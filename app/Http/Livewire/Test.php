<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Test extends Component
{
    public $search = '';

    public function render()
    {
    return view('livewire.test', [
        'users' => User::where('name', $this->search)->get(),
    ]);
}
}

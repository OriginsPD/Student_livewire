<?php

namespace App\Http\Livewire\Auth;

use Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function store()
    {
        $data = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {

            return redirect()->route('admin.dashboard');
        }
    }

    public function updated(): void
    {
        $this->validate([
            'email' => 'email',
            'password' => 'min:5'
        ]);
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

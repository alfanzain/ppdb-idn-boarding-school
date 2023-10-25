<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class StudentLogin extends Component
{
    use AuthenticatesUsers;

    public $email;
    public $password;

    public function render()
    {
        return view('livewire.guest.student-login');
    }
}

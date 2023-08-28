<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Rule('required|string|max:19|unique:users,username')]
    public $username = '';

    #[Rule('required|email|max:255|unique:users,email')]
    public $email = '';

    #[Rule('required|min:8')]
    public $password = '';
}

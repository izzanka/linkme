<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required|email|max:255')]
    public $email = '';

    #[Rule('required|max:255')]
    public $password = '';

    #[Rule('required|boolean')]
    public $remember = false;
}

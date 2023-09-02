<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class LinkForm extends Form
{
    #[Rule('required|string|max:15')]
    public $title = '';

    #[Rule('required|url|active_url|max:255')]
    public $url = '';
}

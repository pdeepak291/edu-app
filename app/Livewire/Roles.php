<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Roles extends Component
{
    #[Rule('required|unique:roles')]
    public $role_name;

    public function saveRole(){

        $this->validate();

        Role::create([

        ]);
    }

    public function render()
    {


        return view('livewire.roles');
    }
}

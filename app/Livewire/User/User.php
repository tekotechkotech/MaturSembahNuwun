<?php

namespace App\Livewire\User;

use Livewire\Component;
use PowerComponents\LivewirePowerGrid\PowerGrid;

class User extends Component
{
    public function render()
    {
        $grid = new PowerGrid(User::query());

        $grid->addColumn('name', 'Name')
            ->addColumn('email', 'Email')
            ->addColumn('created_at', 'Created At')
            ->addColumn('updated_at', 'Updated At');

        return $grid->render();

        return view('livewire.user.user');
    }
}

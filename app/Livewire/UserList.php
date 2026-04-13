<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserList extends Component
{

    public $users;

    public function mount()
    {
        //$this->users = User::all();
        $this->users = User::where('del_flg', '<>', 1)->get();
    }

    public function render()
    {
        return view('livewire.user-list');
    }

}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;

class UserEdit extends Component
{

    public $userID;
    public $name;
    public $email;
    public $error=0;

    public function mount($userID)
    {

        //echo $userID;
        //$user = User::findOrFail($userID);
        $user = User::where('id', '=', $userID)
                    ->where('del_flg', '=', 0)
                    ->first();

        if(empty($user->id))
        {
            $request->session()->flash('message', 'データが存在しません');
            $this->error = 1;   //エラー

        }else{

            $this->userID = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;

        }

    }

    public function render()
    {
        return view('livewire.user-edit');

    }

    //編集
    public function update(Request $request, User $userID)
    {
        //del_flg
        //0:編集可能 1:削除済

        $validated = $request->validate([
            'name' => 'required|max:150',
            'email' => 'required|max:250',
        ]);

        $validated['id'] = $userID;
        $userID->update($validated);
    
        $request->session()->flash('message','変更しました');
        return back();
        

    }
}

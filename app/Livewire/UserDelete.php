<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;

class UserDelete extends Component
{

    public $userID;
    public $name;
    public $error=0;

    public function mount($userID)
    {

        //dump($userID);
        
        $user = User::where('id', '=', $userID)
                    ->where('del_flg', '=', 0)
                    ->first();

        if(empty($user->id))
        {
            session()->flash('message', 'データは削除されました');
            $this->error = 1;   //エラー

        }else{

            $this->userID = $user->id;
            $this->name = $user->name;
            session()->flash('message', '以下の社員名を削除します');
        }

    }

    //削除
    public function delete($userID)
    {

        
        //dump($userID);
        
        //del_flg
        //0:編集可能 1:削除済

        //User::where('id', '=', $userID)->update(['del_flg' => '1']);
        //User::find($userID)->update(['del_flg' => '1']);
    
        $user = User::find($userID);
        $user->del_flg = '1';
        $user->save();

        //session()->flash('message','削除しました');
        $this->error = 1;   //エラーではない
        //return back();


        return redirect()->route('users.list');
        
    }

    public function render()
    {
        return view('livewire.user-delete');
    }
}

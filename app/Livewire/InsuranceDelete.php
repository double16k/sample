<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceDelete extends Component
{
    public $insuranceID;
    public $name;
    public $error=0;

    public function mount($insuranceID)
    {

        //dump($userID);
        
        $insurance = Insurance::where('id', '=', $insuranceID)
                    ->where('del_flg', '=', 0)
                    ->first();

        if(empty($insurance->id))
        {
            session()->flash('message', 'データは削除されました');
            $this->error = 1;   //エラー

        }else{

            $this->insuranceID = $insurance->id;
            $this->name = $insurance->name;
            session()->flash('message', '以下の社員名を削除します');
        }

    }

    //削除
    public function delete($insuranceID)
    {

        //dump($userID);
        
        //del_flg
        //0:編集可能 1:削除済

        //User::where('id', '=', $userID)->update(['del_flg' => '1']);
        //User::find($userID)->update(['del_flg' => '1']);
    
        $insurance = Insurance::find($insuranceID);
        $insurance->del_flg = '1';
        $insurance->save();

        //session()->flash('message','削除しました');
        $this->error = 1;   //エラーではない
        //return back();


        return redirect()->route('insurance.list');
        
    }
    public function render()
    {
        return view('livewire.insurance-delete');
    }
}

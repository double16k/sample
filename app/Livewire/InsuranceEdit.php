<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceEdit extends Component
{
    public $insuranceID;
    public $name;

    public function mount($insuranceID)
    {
        //dump($insuranceID);

        $insurance = Insurance::where('id', '=', $insuranceID)
                    ->where('del_flg', '=', 0)
                    ->first();

        if(empty($insurance->id))
        {
            $request->session()->flash('message', 'データが存在しません');
            $this->error = 1;   //エラー

        }else{

            $this->insuranceID = $insurance->id;
            $this->name = $insurance->name;
        }

    }

    //編集
    public function update(Request $request, Insurance $insuranceID)
    {
        //del_flg
        //0:編集可能 1:削除済

        $validated = $request->validate([
            'name' => 'required|max:150',
        ]);

        $validated['id'] = $insuranceID;
        $insuranceID->update($validated);
    
        $request->session()->flash('message','変更しました');
        return back();
        

    }

    public function render()
    {
        return view('livewire.insurance-edit');
    }
}

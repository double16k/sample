<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsuranceList extends Component
{

    public $insurances;

    public function mount()
    {
        //$this->users = User::all();
        $this->insurances = Insurance::where('del_flg', '<>', 1)->get();
    }

    //登録
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:150',
            'del_flg' => '0',
        ]);

        Insurance::create($validated);
        $request->session()->flash('message','追加しました');
        return back();

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
        return view('livewire.insurance-list');
    }
}

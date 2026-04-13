<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Piechart;
use Illuminate\Http\Request;

class InsuranceChart extends Component
{

    // チャート表示用
    public function chart(){
        //$piecharts=Piechart::all();
        //return view('insurance-chart', compact('piecharts'));
        //return view('livewire.insurance-chart');
    }
 
    // 投票結果をデータベースに保存用
    public function vote(Request $request){
        $favorite=Piechart::where('piechart', $request->dango)->first();
        $favorite->number++;
        $favorite->update();
 
        return back();
    }


    public function render()
    {
        return view('livewire.insurance-chart');
    }

}

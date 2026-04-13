<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Piechart as PiechartModel;   // データベース名の変更(class名と被るため)
use Illuminate\Http\Request;


class PieChart extends Component
{

    // チャート表示用
    public function chart(){
        $piecharts=PiechartModel::all();
        return view('livewire.pie-chart', compact('piecharts'));
        //return view('livewire.pie-chart');
    }
 
    // 投票結果をデータベースに保存用
    public function vote(Request $request){
        $favorite=PiechartModel::where('piechart', $request->piechart)->first();
        $favorite->number++;
        $favorite->update();
 
        return back();
    }
/*
    public function render()
    {
        return view('livewire.pie-chart');
    }
*/
}

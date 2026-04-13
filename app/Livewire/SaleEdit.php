<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sale;
use App\Models\User;
use App\Models\Insurance;
use App\Models\Content;
use Illuminate\Http\Request;

class SaleEdit extends Component
{

    public $saleID;
    public $user;
    public $insurance;
    public $content;
    public $sale;


    // グラフのデータ（例：投票結果）
    public $data = [
        'labels' => ['項目A', '項目B', '項目C'],
        'values' => [30, 50, 20],
    ];


    public function mount($saleID)
    {

        //dump($saleID);

        $this->sale = Sale::where('id', '=', $saleID)
                    ->where('del_flg', '=', 0)
                    ->first();


        //dump($this->sale->id);

        if(!empty($this->sale->id))
        {

            $this->user = User::where('del_flg', '=', 0)
                        ->where('id', '=', $this->sale->user_id)
                        ->first();
            
            $this->insurance = Insurance::where('del_flg', '=', 0)
                        ->where('id', '=', $this->sale->insurance_id)
                        ->first();

            $this->content = Content::where('del_flg', '=', 0)
                        ->where('id', '=', $this->sale->content_id)
                        ->first();

            //session()->flash('message', 'データが存在しません');
            $this->error = 1;   //エラー

        }else{

            $this->saleID = $this->sale->id;
        }

    }

    //編集
    public function update(Request $request, Sale $saleID)
    {
        //del_flg
        //0:編集可能 1:削除済

        $validated = $request->validate([
            'm_number' => 'required|min:0',
            'f_number' => 'required|min:0',
            'amount' => 'required|min:0',
        ]);

        $validated['id'] = $saleID;
        $saleID->update($validated);
    
        $request->session()->flash('message','変更しました');
        return back();
        

    }

    // レンダー
    public function render()
    {
        return view('livewire.sale-edit');
    }
}

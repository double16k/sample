<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\KanriCalender as KanriCalenderModel;
use Illuminate\Support\Carbon;

class KanriCalender extends Component
{
    //public $selectedItems = [];
    public $room1 = []; 


    public function mount()
    {
        // 既存データを取得する場合、JSON文字列を配列にデコードする必要がある場合があります
        // $this->selectedCategories = json_decode(auth()->user()->categories) ?? [];
    }

    public function save()
    {
        //$this->validate();

        // 今日（時間を含む現在日時）
        $now = Carbon::now();
        $now_format = $now->format('Y-m-d');

        $date_check = KanriCalenderModel::where('date', '=', $now_format)->first();

        // データベースに日付が存在した場合
        if(!empty($date_check))
        {
            KanriCalenderModel::where('date', '=', $now_format)->update(['room1' => $this->room1]);
            
        }
        else
        {
            // データベースに保存 (JSONとして保存される)
            KanriCalenderModel::create([
                'room1' => $this->room1, 
                'date' => $now_format,
            ]);
        
        }



        //$test = KanriCalenderModel::all();
        //dump($test);
    }

    public function render()
    {
        return view('livewire.kanri-calender');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Insurance;
use App\Models\Content;
use App\Models\Sale;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Livewire\Attributes\Validate;

class SaleList extends Component
{

    public $Lists;      //　リストデータ

    // 1. ユーザー
    public $selecteUsers;   //初期セレクトボックス

    // 2. 保険会社名
    public $selectInsurances;

    // 3. 保険名
    public $selectContents;


    // 日付
    public $year;
    public $month;
    public $years;
    public $months;


    public $check;

    // セレクトボックス(select)
    #[Validate('required|min:1')]
    public $selectUser;

    #[Validate('required|min:1')]
    public $selectInsurance;

    #[Validate('required|min:1')]
    public $selectContent;

    // 数値入力データ(input)
    #[Validate('required|min:0')]
    public $m_number;

    #[Validate('required|min:0')]
    public $f_number;

    #[Validate('required|min:0')]
    public $amount;


    // user_id から名前取得
    public $userData=[];

    public $date;


    public function mount()
    {

        //社員表示
        $this->selecteUsers = User::where('del_flg', '=', 0)->get();

        //保険会社名表示
        $this->selectInsurances = Insurance::where('del_flg', '=', 0)->get();

        //保険名
        $this->selectContents = Content::where('del_flg', '=', 0)->get();

        //日付
        //$this->selectedDate = Carbon::now()->subYear()->format('Y-m');


        $this->year = Carbon::now()->year;
        $this->month = Carbon::now()->month;


        // 1から12までの配列を生成 [1, 2, ..., 12]
        $this->months = range(1, 12);
        

        // セレクトボックスの年リスト（過去5年〜未来1年）
        for ($i = -1; $i < 1; $i++) {
            $this->years[] = Carbon::now()->addYear($i)->year;
        }
        // 月リスト
        //$this->months = range(1, 12);

    }

    public function regist()
    {

        //$this->validate();

        //日付追加
        $this->date = $this->year."-".$this->month."-01";

        //dump($date);

        $this->validate();

        
        $this->check = Sale::where('user_id', '=', $this->selectUser)
            ->where('insurance_id', '=', $this->selectInsurance)
            ->where('content_id', '=', $this->selectContent)
            ->where('date', '=', $this->date)
            ->where('m_number', '=', $this->m_number)
            ->where('f_number', '=', $this->f_number)
            ->where('amount', '=', $this->amount)
            ->where('del_flg', '=', 0)
            ->first();


        if(!isset($this->check)){

            Sale::create([
                'user_id' => $this->selectUser,
                'insurance_id' => $this->selectInsurance,
                'content_id' => $this->selectContent,
                'date' => $this->date,
                'm_number' => $this->m_number,
                'f_number' => $this->f_number,
                'amount' => $this->amount,
            ]);

            session()->flash('message','追加しました');

        }else{
            session()->flash('message','同じデータが存在します');
        }

        //dump($this->selectUser);
        
        return back();
             
    }

    public function search()
    {

        // エラーをリセット
        $this->resetValidation();

        // 日付追加
        $this->date = $this->year."-".$this->month."-01";

        $this->Lists = Sale::where('del_flg', '=', 0)
        
        ->when($this->selectUser, function ($query) {
            $query->where('user_id', '=',  $this->selectUser);
            //$this->userData = User::where('id', '=', $this->selectUser)->where('del_flg', '=', 0)->first();
        })

        ->when($this->selectInsurance, function ($query) {
            $query->where('insurance_id', '=',  $this->selectInsurance);
        })

        ->when($this->selectContent, function ($query) {
            $query->where('content_id', '=',  $this->selectContent);
        })

        ->when($this->year, function ($query) {
            $query->where('date', '=', $this->date);
        })

        ->when($this->m_number, function ($query) {
            $query->where('m_number', '=',  $this->m_number);
        })

        ->when($this->f_number, function ($query) {
            $query->where('f_number', '=',  $this->f_number);
        })       

        ->when($this->amount, function ($query) {
            $query->where('amount', '=',  $this->amount);
        })
        
        ->get();

        foreach($this->Lists as $key=>$List)
        {
            // user->name取得
            $this->userData[$key] = User::where('id', '=', $List->user_id)->where('del_flg', '=', 0)->first();

        }




    }


    public function render()
    {
        return view('livewire.sale-list');
    }
}

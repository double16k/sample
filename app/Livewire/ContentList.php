<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContentList extends Component
{

    public $contents;

    public function mount()
    {

        $this->contents = Content::where('del_flg', '<>', 1)->get();

    }

    //登録
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:150',
        ]);

        Content::create($validated);
        $request->session()->flash('message','追加しました');
        return back();

    }

    //編集
    public function update(Request $request, Content $contentID)
    {
        //del_flg
        //0:編集可能 1:削除済

        $validated = $request->validate([
            'name' => 'required|max:150',
        ]);

        $validated['id'] = $contentID;
        $contentID->update($validated);
    
        $request->session()->flash('message','変更しました');
        return back();
    }

    public function render()
    {
        return view('livewire.content-list');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Content;
use Illuminate\Http\Request;


class ContentEdit extends Component
{
    public $contentID;
    public $name;

    public function mount($contentID)
    {
        //dump($contentID);

        $content = Content::where('id', '=', $contentID)
                    ->where('del_flg', '=', 0)
                    ->first();

        if(empty($content->id))
        {
            $request->session()->flash('message', 'データが存在しません');
            $this->error = 1;   //エラー

        }else{

            $this->contentID = $content->id;
            $this->name = $content->name;
        }

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
        return view('livewire.content-edit');
    }
}

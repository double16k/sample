<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentDelete extends Component
{
    public $contentID;
    public $name;
    public $error=0;

    public function mount($contentID)
    {

        //dump($userID);
        
        $content = Content::where('id', '=', $contentID)
                    ->where('del_flg', '=', 0)
                    ->first();

        if(empty($content->id))
        {
            session()->flash('message', 'データは削除されました');
            $this->error = 1;   //エラー

        }else{

            $this->contentID = $content->id;
            $this->name = $content->name;
            session()->flash('message', '以下の保険名を削除します');
        }

    }

    //削除
    public function delete($contentID)
    {

        dump($contentID);
        
        //del_flg
        //0:編集可能 1:削除済
    
        $content = Content::find($contentID);
        $content->del_flg = '1';
        $content->save();

        //session()->flash('message','削除しました');
        $this->error = 1;   //エラーではない
        //return back();

        //リダイレクト
        return redirect()->route('content.list');
        
    }

    public function render()
    {
        return view('livewire.content-delete');
    }
}

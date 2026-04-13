<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserListController extends Controller
{
    //
    public function update(Request $request, Post $post)
    {
        //0:編集可能 1:削除済
        $del_flg = DB::table('users')->where('del_flg', '0')->value('del_flg');

        if($del_flg==0){}{

            $validated = $request->validate([
                'name' => 'required|max:150',
                'email' => 'required|max:250',
            ]);

        }else{
            $request->session()->flash('変更しました');
        }
    }

    //編集画面表示
    public function edit(Request $request, Post $post)
    {
        return view('users.edit', compact('post'));
    }


    //削除画面表示
    public function del(Request $request, Post $post)
    {
        return view('users.del', compact('post'));
    }

}

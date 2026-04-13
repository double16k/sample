<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function create()
    {
        return view('post/create');
    }

    /* 登録 */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);
        $validated['user_id'] = auth()->id();
        $post = Post::create($validated);


        //セッション
        $request->session()->flash('message', '保存しました');
        return back();
    }

    /* 一覧表示 */
    public function index()
    {
        //$posts = Post::all();
        //$posts = DB::table('posts')->get();
        $posts = Post::where('user_id', '=', auth()->id())->get();
        return view('post.index', compact('posts'));
    }

    /* 詳細表示 */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }

    /* 編集画面 */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /* 編集画面 */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);
        $validated['user_id'] = auth()->id();
        $post->update($validated);
        $request->session()->flash('message', '更新しました');
        return back();
    }



}

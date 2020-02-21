<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = \Request::query();
        

       //isset()は、PHPメソッドで数値があるかを判断する。
        if(isset($query['category_id'])){
            $posts = Post::where('category_id',$query['category_id'])->latest()->get();
            $posts ->load('category','user','tags');
            return view('posts.index',['posts'=>$posts]);
        }
        elseif(isset($query['tag_name'])){
            $posts = Post::where('content','like',"%{$query['tag_name']}%")->latest()->get();
            $posts ->load('category','user','tags');
            return view('posts.index',['posts'=>$posts]);
        }
        
        else {
            $posts = Post::latest()->get();
            $posts ->load('category','user','tags');
            return view('posts.index',['posts'=>$posts]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('posts.create',[]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $post = new Post;
        // 全てのリクエストを取得
        if ($request->file('image')->isValid([])) {
            $image = $request->image->storeAs('public/images', Auth::id() . '.jpg');
            $post -> image = basename($image);
            $post -> user_id = $request->user_id;
            $post -> category_id = $request->category_id;
            $post -> title = $request->title;
            $post -> content = $request->content;
            $post->save();
            
            preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->content, $match);
            // preg_match_all('/＃([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->content, $match);
            
            $tags = [];
            foreach ($match[1] as $tag) {
            $record = Tag::firstOrCreate(['tag_name' => $tag]);
            array_push($tags, $record);
            };
             $tag_ids = [];
            foreach ($tags as $tag) {
            array_push($tag_ids, $tag['id']);
            };
            $post->tags()->attach($tag_ids);
            
            return redirect('/')->with('success', '保存しました。');
            } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['image' => '画像がアップロードされていないか不正なデータです。']);
        }

        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ＄id->$postに変更した理由は、postのデータを使用したいから
    public function show(Post $post)
    {
        //
        $post ->load('category','user','comments.user');

        return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request)
    {
        //
        $search = $request->search;
        $posts = Post::where('title','like',"%{$search}%")
        ->orwhere('content','like',"%{$search}%")->get();
        $search_count = '「'.$search.'」'.'の検索結果が'.count($posts).'件です';
        return view('posts.index',['posts'=>$posts,'search_count'=>$search_count]);
        
    }
}

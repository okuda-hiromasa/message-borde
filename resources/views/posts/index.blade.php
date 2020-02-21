@extends('layouts.app')

@section('content')

<div class="panel-heading">Postページ</div>
<div class="panel-body">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @foreach($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">タイトル：{{$post->title}}</h5>
            <p class="card-text">
                カテゴリー：
                <a href="{{route('posts.index',['category_id'=>$post->category_id])}}">
                    {{$post->category->category_name}}
                </a>
            </p>
            <p class="card-text">
                タグ：
                @foreach($post->tags as $tag)
                <a href="{{route('posts.index',['tag_name'=>$tag->tag_name])}}">
                    #{{$tag->tag_name}}
                </a>
                @endforeach
            </p>
            <p class="card-text">
                投稿者：
                <a href="{{route('users.show',$post->user_id)}}">
                    {{$post->user->name}}
                </a>
            </p>
            <p class="card-text">内容：{{$post->content}}</p>
            <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">詳細</a>
        </div>
    </div>
    @endforeach
</div>
            
@endsection

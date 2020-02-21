@extends('layouts.app')

@section('content')

<div class="panel-heading">{{$user->name}}の投稿</div>
<div class="panel-body">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @foreach($user->posts as $post)
    <div class="card my-3">
        <div class="card-body">
            <h5 class="card-title">タイトル：{{$post->title}}</h5>
            <p class="card-text">内容：{{$post->content}}</p>
            <p class="card-text">
                カテゴリー：
                <a href="{{route('posts.index',['category_id'=>$post->category_id])}}">
                    {{$post->category->category_name}}
                </a>
            </p>
            <p class="card-text">
                投稿者： {{$post->user->name}}                   
            </p>
            <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">詳細</a>
        </div>
    </div>
    @endforeach
</div>
            
@endsection

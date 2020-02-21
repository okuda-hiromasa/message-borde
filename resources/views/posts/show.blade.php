@extends('layouts.app')

@section('content')
                <div class="panel-heading">Postページ</div>
                <div class="panel-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">タイトル：{{$post->title}}</h5>
                            <p class="card-text">内容：{{$post->content}}</p>
                            <p class="card-text">カテゴリー：{{$post->category->category_name}}</p>
                            <p class="card-text">投稿者：{{$post->user->name}}</p>
                        </div>
                        <div class="">
                            <img class="img-fluid" src="{{asset('storage/images/'.$post->image)}}" alt="" >
                        </div>
                    </div>
                    <div class="m-3">
                    <h5>コメント一覧</h5>
                    @foreach($post->comments as $comment)
                        <div class="card my-3">
                            <div class="card-body">
                            <!-- $comment->commentは、storeで作成した$commentからcommentを呼び出す -->
                                <p class="card-text">{{$comment->comment}}</p>
                                <p class="card-text">投稿者：{{$comment->user->name}}</p>
                            </div>
                        </div>
                    @endforeach
                        <a href="{{route('comments.create',['post_id'=>$post->id])}}" class="btn btn-primary my-3">コメントする</a>
                        </div>
                    </div>
                </div>
@endsection

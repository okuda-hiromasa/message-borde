@extends('layouts.app')

@section('content')
                <div class="panel-heading">Postページ</div>
                <div class="panel-body">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{route('posts.store')}}" method="post"enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">タイトル</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="タイトル" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">カテゴリー</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                    <option >選択</option >
                                    <option value="1">book</option >
                                    <option value="2">caff</option >
                                    <option value="3">twitter</option >
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">画像</label>
                                    <input type="file" class="row ml-1" id="exampleFormControlFile1" placeholder="画像" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"> 内容</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <button type="submit" class="btn btn-primary">投稿</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@extends('layouts.app')

@section('content')
                <div class="panel-heading">Commentページ</div>
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
                            <form action="{{route('comments.store')}}" method="post">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"> コメント</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="post_id" value="{{ $post_id }}">
                                <button type="submit" class="btn btn-primary">投稿</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection

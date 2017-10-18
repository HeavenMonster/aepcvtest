@extends("layouts.master")

@section("content")

    <ol class="breadcrumb">
        <li><a href="{{ action('PostController@index') }}">Ieraksti</a></li>
        <li class="active">Dienasgrāmatas ieraksts {{ $post->id }}</li>
    </ol>

    <p><a class="btn btn-primary" href="{{ action('PostController@edit', $post) }}">Labot šo ierakstu</a></p>

    <h3>{{ $post->title }}</h3>
    <p>{{ $post->text }}</p>

    <h2>Komentāri</h2>
    @if(count($post->comments) < 1)
        <p>Nav komentāru</p>
    @endif
    <div class="row">
        @foreach($post->comments as $comment)
            <form class="col-lg-6" action="{{ action('CommentController@block', $post->id) }}" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ csrf_field() }}
                        <input name="email" type="text" value="{{ $comment->email }}" hidden>
                        <p>
                            {{ $comment->email }}
                            <input class="btn btn-danger btn-xs" type="submit" value="Bloķēt"><br>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-time"></span>
                            {{ $comment->created_at }}
                        </p>
                    </div>
                    <div class="panel-body">
                        {{ $comment->comment }}
                    </div>
                </div>
            </form>
        @endforeach
    </div>

    @include('fragments.validation_errors')

    <form action="{{ action('CommentController@store', $post) }}" method="post">
        <h2>Komentēt</h2>
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Tavs epasts</label>
            <input class="form-control" id="email" type="text" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="comment">Tavs komentārs</label>
            <textarea class="form-control" id="comment" name="comment">{{ old('comment') }}</textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Komentēt">
    </form>

@endsection
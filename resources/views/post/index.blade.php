@extends("layouts.master")

@section("content")

    <p>
        <a class="btn btn-primary" href="{{ action('PostController@create') }}">Pievienot jaunu ierakstu</a>
    </p>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-lg-6 post">
                <form action="{{ action('PostController@delete', $post->id) }}" method="post">
                    {{ csrf_field() }}
                    <h3>
                        <a href="{{ action('PostController@show', $post) }}">{{ $post->id }}: {{ $post->title }}</a>
                        <input class="btn btn-danger btn-xs" type="submit" value="Dzēst">
                    </h3>
                    <p>
                        <span class="glyphicon glyphicon-time"></span>
                        Izveidots: {{ $post->created_at }}
                    </p>
                    <p>
                        <span class="glyphicon glyphicon-time"></span>
                        Atjaunots: {{ $post->updated_at }}
                    </p>
                </form>
            </div>
        @endforeach
    </div>

@endsection
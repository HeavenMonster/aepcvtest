@extends("layouts.master")

@section("content")

    <ol class="breadcrumb">
        <li><a href="{{ action('PostController@index') }}">Ieraksti</a></li>
        <li><a href="{{ action('PostController@show', $post) }}">Dienasgrāmatas ieraksts {{ $post->id }}</a></li>
        <li class="active">Ieraksta labošana</li>
    </ol>

    @include('fragments.validation_errors')

    <form action="{{ action('PostController@update', $post) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="title">Ieraksta virsraksts</label>
            <input class="form-control" id="title" type="text" name="title" value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group">
            <label for="text">Ieraksta teksts</label>
            <textarea class="form-control" id="text" name="text">{{ old('text', $post->text) }}</textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Rediģēt">
    </form>

@endsection
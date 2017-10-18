@extends("layouts.master")

@section("content")

    <ol class="breadcrumb">
        <li><a href="{{ action('PostController@index') }}">Ieraksti</a></li>
        <li class="active">Jauna ieraksta izveidošana</li>
    </ol>

     {{ method_field('PUT') }}

    @include('fragments.validation_errors')

    <form action="{{ action('PostController@store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Ieraksta virsraksts</label>
            <input class="form-control" id="title" type="text" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="text">Ieraksta teksts</label>
            <textarea class="form-control" id="text" name="text">{{ old('text') }}</textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Izveidot">
    </form>

@endsection
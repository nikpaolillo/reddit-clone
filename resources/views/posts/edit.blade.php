@extends('layouts.app')

@section('content')

    <h2>Edit Post</h2>
    @include('posts._form', ['post' => $post])

@endsection
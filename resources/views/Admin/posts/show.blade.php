@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>{{ $post->title }}</h1>
        <div class="mb-3">{{ $post->slug }}</div>
        <div>{{ $post->content }}</div>
    </section>
@endsection
@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>{{ $post->title }}</h1>
        <div class="mb-3">{{ $post->slug }}</div>
        <div>{{ $post->content }}</div>
        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-primary mt-3 mb-2">Modifica post</a>
        <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare il post selezionato?')">Cancella</button>
        </form>
    </section>
@endsection
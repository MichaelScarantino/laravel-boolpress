@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>{{ $post->title }}</h1>
        <div class="mb-3">{{ $post->slug }}</div>
        <div class="mb-3">Categoria:{{ $post->category ? $post->category->name : 'nessuna' }}</div>
        <div class="mb-3">Tags:
            @forelse ($post->tags as $tag)
                {{ $tag->name }} {{ $loop->last ? '' : ', ' }}
            @empty
                Nessuno
            @endforelse
        </div>

        @if ($post->cover)

            <div>
                <img src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}">
            </div>
            
        @endif

        <div>{{ $post->content }}</div>
        <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-primary mt-3 mb-2">Modifica post</a>
        <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare il post selezionato?')">Cancella</button>
        </form>
    </section>
@endsection
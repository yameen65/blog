@extends('layout.app')

@section('content')
    <h2>{{ $post->tittle }}</h2>
    <p>{{ $post->content }}</p>

    <!-- Display Comments -->
    <h3>Comments</h3>
    @foreach($post->comments as $comment)
        <div>
            <strong>{{ $comment->user->name }}</strong>
            <p>{{ $comment->body }}</p>
            <small>Posted on {{ $comment->created_at->format('d M Y, h:i A') }}</small>
        </div>
    @endforeach

    <!-- Add Comment Form -->
    @auth
        <form action="{{ route('comments.store', $post) }}" method="POST">
            @csrf
            <div>
                <label for="body">Write a Comment:</label>
                <textarea name="body" id="body" rows="4"></textarea>
                @error('body')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Post Comment</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Log in</a> to Write a Comment.</p>
    @endauth
@endsection

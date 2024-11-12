@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <!-- Post Content -->
        <div class="card mb-5 shadow-lg">
            <div class="card-body">
                <h2 class="card-title">{{ $post->tittle }}</h2>
                <p class="card-text">{{ $post->content }}</p>
            </div>
        </div>

        <!-- Display Comments -->
        <div class="comments-section mb-5">
            <h3 class="mb-4">Comments</h3>
            @forelse($post->comments as $comment)
                <div class="card mb-3 border-0 bg-light shadow-sm">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">{{ $comment->user->name }}</h6>
                        <p class="card-text">{{ $comment->body }}</p>
                        <small class="text-muted">Posted on {{ $comment->created_at->format('d M Y, h:i A') }}</small>
                    </div>
                </div>
            @empty
                <p class="text-muted">No comments yet. Be the first to comment!</p>
            @endforelse
        </div>

        <!-- Add Comment Form -->
        @auth
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5>Add a Comment</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('comments.store', $post) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="body" class="form-label">Your Comment:</label>
                            <textarea name="body" id="body" rows="4" class="form-control" placeholder="Write your comment here..."></textarea>
                            @error('body')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Post Comment</button>
                    </form>
                </div>
            </div>
        @else
            <div class="text-center">
                <p><a href="{{ route('login') }}" class="btn btn-outline-primary">Log in</a> to Write a Comment.</p>
            </div>
        @endauth
    </div>
@endsection

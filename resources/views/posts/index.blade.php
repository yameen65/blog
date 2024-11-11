@extends('layout.app')

@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>

    @foreach($posts as $post)
        <div class="post-preview mt-4">
            <h2><a href="{{ route('posts.show', $post) }}"></a></h2>
            <h3>{{ $post->tittle }}</h3>
            <p>{{ Str::limit($post->content, 100) }}</p>

            <a href="{{ route('posts.show', $post) }}" class="btn btn-link">Read More</a>
        </div>
    @endforeach

    <div class="pagination">
        {{ $posts->links() }}
    </div>
@endsection

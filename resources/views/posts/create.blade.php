@extends('layout.app')

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div>
            <label>Tittle</label>
            <input type="text" name="tittle" value="{{ old('tittle') }}">
            @error('tittle')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Content</label>
            <textarea name="content">{{ old('content') }}</textarea>
            @error('content')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Create Post</button>
    </form>
@endsection

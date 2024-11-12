@extends('layout.app')

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div>
            <label>Tittle</label>
            <input type="text" name="tittle" value="{{ old('tittle') }}" placeholder="Enter tittle name?">
            @error('tittle')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            <label>Content</label>
            <textarea name="content"  placeholder="Enter content name?">{{ old('content') }}</textarea>
            @error('content')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit">Create Post</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-4">{{ $post->title }}</h1>
        <h4> @if ($post->cathegory){{ $post->cathegory->name }}@else No cathegory selected @endif</h4>
        <p class="text-justify">{{ $post->content }}</p>
        <address>{{ $post->getFormattedDate('created_at') }}</address>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="ml-2 btn btn-warning">Edit</a>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="delete-button">
                @csrf
                @method('DELETE')
                <button type="submit" class="ml-2 btn btn-danger">Delete</button>
            </form>
            <a class="ml-2 btn btn-secondary" href="{{ route('admin.posts.index') }}">Back</a>
        </div>
    </div>

@section('scripts')
    <script src="{{ asset('js/confirm-delete.js') }}">
    </script>
@endsection
@endsection

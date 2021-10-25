@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('alert-message'))
            <div class="alert alert-{{ session('alert-type') }}">{{ session('alert-message') }}</div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="my-3">My posts</h1>
            <a class="btn btn-success" href="{{ route('admin.posts.create') }}">New Post</a>
        </div>
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Cathegory</th>
                    <th scope="col">Created at</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>@if ($post->cathegory)<span class="badge badge-pill badge-info px-2">{{ $post->cathegory->name }}</span>@else - @endif</td>

                        <td>{{ $post->getFormattedDate('created_at') }}</td>
                        <td class="w-100 d-flex justify-content-end">
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="ml-2 btn btn-primary">Read</a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="ml-2 btn btn-warning">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post"
                                class="delete-button">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-2 btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">There are no posts to show.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <footer class="mt-5 d-flex justify-content-center">
            {{ $posts->links() }}
        </footer>
        <hr>
        <section id="posts-by-cathegories" class="mt-5">
            <div class="row">
                @foreach ($cathegories as $cathegory)
                    <div class="col-md-4">
                        <header>
                          <h2 class="mb-3">{{ $cathegory->name }}</h2>
                          <p class="text-muted ml-3">({{ count($cathegory->posts) }})</p>
                        </header>
                        @forelse ($cathegory->posts as $post)
                            <h5 class="my-2">
                                <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
                            </h5>
                        @empty No posts in this cathegory
                        @endforelse
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    @section('scripts')
        <script src="{{ asset('js/confirm-delete.js') }}">
        </script>
    @endsection
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('alert-message'))
            <div class="alert alert-{{ session('alert-type') }}">{{ session('alert-message') }}</div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="my-3">My cathegories</h1>
            <a class="btn btn-success" href="{{ route('admin.cathegories.create') }}">New Cathegory</a>
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
                @forelse ($cathegories as $cathegory)
                    <tr>
                        <td>{{ $cathegory->id }}</td>
                        <td>{{ $cathegory->name }}</td>
                        <td>{{ $cathegory->color }}</td>
                        <td class="w-100 d-flex justify-content-end">
                            <a href="{{ route('admin.cathegories.show', $cathegory->id) }}" class="ml-2 btn btn-primary">Read</a>
                            <a href="{{ route('admin.cathegories.edit', $cathegory->id) }}" class="ml-2 btn btn-warning">Edit</a>
                            <form action="{{ route('admin.cathegories.destroy', $cathegory->id) }}" method="post"
                                class="delete-button">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-2 btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">There are no cathegories to show.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <footer class="mt-5 d-flex justify-content-center">
            {{ $cathegories->links() }}
        </footer>
    </div>

    @section('scripts')
        <script src="{{ asset('js/confirm-delete.js') }}">
        </script>
    @endsection
@endsection

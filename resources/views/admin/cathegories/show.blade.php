@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-4">{{ $cathegory->name }}</h1>
        <p class="mt-5 mb-4">Color: {{ $cathegory->color }}</p>        
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.cathegories.edit', $cathegory->id) }}" class="ml-2 btn btn-warning">Edit</a>
            <form action="{{ route('admin.cathegories.destroy', $cathegory->id) }}" method="post" class="delete-button">
                @csrf
                @method('DELETE')
                <button type="submit" class="ml-2 btn btn-danger">Delete</button>
            </form>
            <a class="ml-2 btn btn-secondary" href="{{ route('admin.cathegories.index') }}">Back</a>
        </div>
    </div>

@section('scripts')
    <script src="{{ asset('js/confirm-delete.js') }}">
    </script>
@endsection
@endsection

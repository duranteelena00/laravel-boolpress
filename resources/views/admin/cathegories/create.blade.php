@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="pb-0 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <header>
            <h1 class="mb-4">Create a new cathegory</h1>
            <a href="{{ route('admin.cathegories.index')}}"></a>
        </header>
        @include('includes.admin.cathegories.form')
    </div>
@endsection
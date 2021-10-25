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
        <h1 class="mb-4">Edit the cathegory</h1>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        @include('includes.admin.cathegories.form')
    </div>
@endsection
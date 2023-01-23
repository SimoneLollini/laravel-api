@extends('layouts.app')

@section('content')


    <div class="container mb-5 py-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="py-5">Add a new technology</h1>
        <form action="{{ route('technology.store') }}" method="post" class="card p-3" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    aria-describedby="nameHlper" value="{{ old('name') }}">
                <small id=" nameHlper" class="text-muted">Add technology name here</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

@endsection

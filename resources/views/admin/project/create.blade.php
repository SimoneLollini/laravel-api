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

        <h1 class="py-5">Add a new Project</h1>
        <form action="{{ route('project.store') }}" method="post" class="card p-3" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror" aria-describedby="titleHlper"
                    value="{{ old('title') }}">
                <small id=" titleHlper" class="text-muted">Add Project title here</small>
            </div>
            <div class="mb-3">
                <div class="wrapper py-3">
                    <input type="checkbox" name="status" id="status">
                    <label for="status">Set carousel visibility (front-end)</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="linkTo" class="form-label">Add the link to this project</label>
                <input type="text" name="linkTo" id="linkTo"
                    class="form-control @error('linkTo') is-invalid @enderror" aria-describedby="linkToHlper"
                    value="{{ old('linkTo') }}">
                <small id=" linkToHlper" class="text-muted">Add Project link here</small>
            </div>

            <div class="mb-3">
                <label for="technologies" class="form-label">technologies</label>
                <select multiple class="form-select form-select-sm" name="technologies[]" id="technologies">
                    <option value="" disabled>Select a technology</option>
                    @forelse ($technologies as $tech)
                        @if ($errors->any())
                            <option value="{{ $tech->id }}"
                                {{ in_array($tech->id, old('technologies', [])) ? 'selected' : '' }}>
                                {{ $tech->name }}</option>
                        @else
                            <option value="{{ $tech->id }}">{{ $tech->name }}</option>
                        @endif
                    @empty
                        <option value="" disabled>Sorry ???? no technologies in the system</option>
                    @endforelse
                </select>
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select form-select-md @error('type_id') 'is-invalid' @enderror" name="type_id"
                    id="type_id">
                    <option value="" selected>Select one</option>

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach

                </select>
            </div>


            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image"
                    class="form-control  @error('image') is-invalid @enderror" placeholder=""
                    aria-describedby="ImageHelper">
                <small id="ImageHelper" class="text-muted">Add image</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" id="description"
                    class="form-control @error('description') is-invalid @enderror" aria-describedby="descriptionHlper"
                    value="{{ old('description') }}"></textarea>
                <small id=" descriptionHlper" class="text-muted">Add Project description here</small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>

@endsection

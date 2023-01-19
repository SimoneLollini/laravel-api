@extends ('admin.layouts.app_admin')
@section('content')
@section('title')
    Edit
@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('project.update', $project->slug) }}" enctype="multipart/form-data">

    @csrf

    @method('PUT')

    <div class="container mt-5">

        <div class="my-3 ">
            <label class="h4" for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}"
                class="form-control">
        </div>
        <div class="mb-3">
            <label class="h4" for="type_id" class="form-label">Types</label>
            <select class="form-select form-select-md @error('type_id') 'is-invalid' @enderror" name="type_id"
                id="type_id">
                <option value="">Select one</option>

                @foreach ($types as $type)
                    <option value="{{ $type->id }}"
                        {{ $type->id == old('type_id', $project->type ? $project->type->id : '') ? 'selected' : '' }}>
                        {{ $type->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3 d-flex gap-4">
            <img width="140" src="{{ asset('storage/' . $project->image) }}" alt="">
            <div>
                <label class="h4" for="image" class="form-label">Replace Image</label>
                <input type="file" name="image" id="image"
                    class="form-control  @error('image') is-invalid @enderror" aria-describedby="ImageHelper">
                <small id="ImageHelper" class="text-muted">Replace the project image</small>
            </div>
        </div>

        <label class="h4" for="type_id" class="form-label">Types</label>
        <select multiple class="form-select form-select-sm" name="technologies[]" id="technologies">
            <option value="" disabled>Select a tech</option>
            @forelse ($technologies as $tech)
                @if ($errors->any())
                    <option value="{{ $tech->id }}"
                        {{ in_array($tech->id, old('technologies', [])) ? 'selected' : '' }}>{{ $tech->name }}
                    </option>
                @else
                    <option value="{{ $tech->id }}"
                        {{ $project->technologies->contains($tech->id) ? 'selected' : '' }}>{{ $tech->name }}
                    </option>
                @endif
            @empty
                <option value="" disabled>Sorry 😥 no technologies in the system</option>
            @endforelse

        </select>

        <div class=" wrapper py-3">
            <label class="h4" for="description">Description</label>
            <textarea type="text" name="description" id="description"
                class="form-control @error('description') is-invalid @enderror" aria-describedby="descriptionHlper"
                value="{{ old('description', $project->description) }}"></textarea>
        </div>

        <input type="submit" value="Submit" class="btn-primary btn ">

    </div>
    </div>
</form>
@endsection

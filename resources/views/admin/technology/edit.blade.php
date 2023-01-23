@extends ('admin.layouts.app_admin')
@section('content')
@section('name')
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
<form method="POST" action="{{ route('technology.update', $technology->slug) }}" enctype="multipart/form-data">

    @csrf

    @method('PUT')

    <div class="container mt-5">

        <div class="my-3 ">
            <label class="h4" for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $technology->name) }}"
                class="form-control">
        </div>
        <input type="submit" value="Submit" class="btn-primary btn ">

    </div>
    </div>
</form>
@endsection

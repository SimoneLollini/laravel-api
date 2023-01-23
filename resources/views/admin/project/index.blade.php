@extends('admin.layouts.app_admin')

@section('content')
@section('title')
    Projects <div class="btn-containter"><a class="btn btn-primary btn-sm" href="{{ route('project.create') }}">Add</a></div>
@endsection
@include('admin.layouts.message')


<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">image</th>
                <th scope="col">Type</th>
                <th scope="col">Technologies</th>
                <th scope="col">Tools</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr class="">
                    <td scope="row">{{ $project->title }}</td>
                    <td><img width="100" class="img-fluid" src="{{ asset('storage/' . $project->image) }}"
                            alt="no img"></td>
                    <td> {{ $project->type ? $project->type->name : 'Null' }}</td>
                    <td>
                        @forelse ($project->technologies as $tech)
                            <div class="mb-1">
                                #{{ $tech->name }}
                            </div>
                        @empty
                            <div class="mb-1">
                                Unknown
                            </div>
                        @endforelse
                    </td>
                    <td class="">
                        <a class="btn btn-primary btn-sm m-1 w-75"
                            href="{{ route('project.show', $project->slug) }}">Details</a>
                        <a class="btn btn-primary btn-sm m-1 w-75"
                            href="{{ route('project.edit', $project->slug) }}">Edit</a>
                        <form action="{{ route('project.destroy', $project->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-primary btn-sm m-1 w-75" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <p>Ancora nessun progetto!</p>
            @endforelse
        </tbody>
    </table>
    {{ $projects->links('vendor.pagination.bootstrap-5') }}
</div>

@endsection

@extends('admin.layouts.app_admin')

@section('content')
    @include('admin.layouts.message')
@section('title')
    Types <div class="btn-wrapper"><a class="btn btn-primary btn-sm m-3" href="{{ route('type.create') }}">Add</a></div>
@endsection
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Tools</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($types as $type)
                <tr class="">
                    <td scope="row">{{ $type->name }}</td>
                    <td> {{ $type->slug }}</td>

                    <td class="">
                        <a class="btn btn-primary btn-sm m-1 w-75"
                            href="{{ route('type.show', $type->slug) }}">Details</a>
                        <a class="btn btn-primary btn-sm m-1 w-75" href="{{ route('type.edit', $type->slug) }}">Edit</a>
                        <form action="{{ route('type.destroy', $type->slug) }}" method="POST">
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
</div>
{{ $types->links('vendor.pagination.bootstrap-5') }}
@endsection

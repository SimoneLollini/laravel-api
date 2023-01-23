@extends('admin.layouts.app_admin')

@section('content')
    @include('admin.layouts.message')
@section('title')
    Technologies <div class="btn-wrapper"><a class="btn btn-primary btn-sm m-3" href="{{ route('technology.create') }}">Add</a>
    </div>
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
            @forelse ($technologies as $tech)
                <tr class="">
                    <td scope="row">{{ $tech->name }}</td>
                    <td> {{ $tech->slug }}</td>

                    <td class="">
                        <a class="btn btn-primary btn-sm m-1 w-75"
                            href="{{ route('technology.show', $tech->slug) }}">Details</a>
                        <a class="btn btn-primary btn-sm m-1 w-75"
                            href="{{ route('technology.edit', $tech->slug) }}">Edit</a>
                        <form action="{{ route('technology.destroy', $tech->slug) }}" method="POST">
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
{{ $technologies->links('vendor.pagination.bootstrap-5') }}
@endsection

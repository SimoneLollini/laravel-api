@extends('layouts.app')

@section('content')
    <section class="show vh-100 p-3">
        <h2 class="details">{{ $project->title }}</h2>
        <p>{{ $project->description }}</p>
        <span>{{ $project->linkTo }}</span>
    </section>
@endsection

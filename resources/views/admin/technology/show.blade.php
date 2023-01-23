@extends('layouts.app')

@section('content')
    <section class="show vh-100 d-flex justify-content-center p-3">
        <h2 class="details">{{ $technology->name }}</h2>
        <p>{{ $technology->slug }}</p>
    </section>
@endsection

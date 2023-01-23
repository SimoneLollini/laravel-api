@extends('layouts.app')

@section('content')
    <section class="show vh-100 d-flex justify-content-center p-3">
        <h2 class="details">{{ $type->name }}</h2>
        <p>{{ $type->slug }}</p>
    </section>
@endsection

@extends('layouts.fe_main')

@section('content')
    <section id="about" class="container mt-5">
        <div class="card" style="width: 18rem;">
            <img src="{{ $image }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $name }}</h5>
                <p class="card-text">{{ $address }}</p>
                <p class="card-text">{{ $job }}</p>
            </div>
        </div>
    </section>
@endsection

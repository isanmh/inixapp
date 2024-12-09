@extends('layouts.be_main')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Categories Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Categories</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex justify-content-between py-2">
                                Category List
                                <a href="{{ route('categories') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                            </div>

                            {{-- form --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

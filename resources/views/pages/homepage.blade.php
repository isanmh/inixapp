@extends('layouts.fe_main')

@push('styles')
    <style>
        .animasi {
            animation: atasbawah 4s ease-in-out infinite alternate-reverse both;
        }

        @keyframes atasbawah {

            0%,
            100% {
                transform: translateY(10px);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>

    {{-- AOS Style --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush

@section('content')
    <section id="Banner" class="container">
        <div class="row">
            {{-- typographi --}}
            <div data-aos="fade-right" data-aos-duration="2000" data-aos-delay="200"
                class="col-md-6 pt-5 pt-lg-5 d-flex justify-content-center order-lg-1 order-2 flex-column">
                <h1>Continous Learning Keep Up To Date with
                    <strong class="text-primary">Inixindo</strong>
                </h1>
                <p class="my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia ratione, enim, ipsam id
                    quo sequi
                    temporibus voluptate ducimus assumenda ut quaerat perferendis dolor consequatur, esse sed aut incidunt
                    vel veniam?
                </p>
                <div class="mt-4">
                    <a href="" class="btn btn-outline-primary">Get Started</a>
                </div>
            </div>

            {{-- image --}}
            <div data-aos="zoom-in" data-aos-duration="2000" data-aos-delay="200"
                class="col-md-6 pt-5 pt-lg-5 order-lg-2 order-1">
                <img src="{{ asset('assets/images/banner.svg') }}" alt="banner inix" class="img-fluid animasi">
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    {{--  --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endpush

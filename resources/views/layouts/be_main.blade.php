<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    {{-- style --}}
    @include('layouts.be_styles')

    @stack('styles')

</head>

<body>

    <!-- ======= Header ======= -->
    @include('layouts.components.be_navbar')

    <!-- ======= Sidebar ======= -->
    @include('layouts.components.be_sidebar')

    {{-- content main --}}
    @yield('content')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- scripts --}}
    @include('layouts.be_scripts')

    @stack('scripts')

</body>

</html>

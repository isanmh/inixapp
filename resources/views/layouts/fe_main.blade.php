<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- styles main --}}
    @include('layouts.fe_styles')

    {{-- stack jika da styles baru --}}
    @stack('styles')

    <title>Inix App</title>
</head>

<body>
    {{-- fe Navbar --}}
    @include('layouts.components.fe_navbar')

    {{-- content dinamis --}}
    @yield('content')


    {{-- scripts --}}
    @include('layouts.fe_scripts')

    @stack('scripts')
</body>

</html>

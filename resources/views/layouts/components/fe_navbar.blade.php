<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand text-primary" href="/">
            <strong>Inix App</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    {{-- tenary if --}}
                    {{-- (kondisi == true) ? true : false --}}
                    <a class="nav-link {{ Request::is('/') ? 'active text-primary' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active text-primary' : '' }}"
                        href="{{ route('about') }}">About</a>
                </li>

            </ul>
            <a href="#" class="btn btn-outline-primary">Login</a>
        </div>
    </div>
</nav>

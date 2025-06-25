<!-- /views/components/header-layout.blade.php -->
<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo.png') }}" height="45" alt="MDB Logo" loading="lazy" />
        </a>

        <!-- Centered navigation -->
        <div class="d-flex justify-content-center flex-grow-1">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                @foreach($navItems as $item)
                @if (isset($item['children']))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $item['label'] }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($item['children'] as $child)
                        <li><a class="dropdown-item" href="{{ $child['url'] }}">{{ $child['label'] }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        <!-- Right links -->
        <div class="d-flex align-items-center">
            <form method="POST" action="{{ route('logout') }}" class="mb-0">
                @csrf
                <button type="submit" class="btn btn-warning" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light">Gestão Demandas</span>
    </a>

    <div class="sidebar d-flex flex-column">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ $avatar }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ $user->name ?? 'Visitante' }}</a>
            </div>
        </div>

        <nav class="mt-2 flex-grow-1">
            <ul class="nav nav-pills nav-sidebar flex-column h-100" data-widget="treeview" role="menu">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fa-solid fa-chart-line mr-1"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-list-check mr-1"></i>
                        <p>Minhas Demandas</p>
                    </a>
                </li>

                <li class="nav-item mt-auto mb-3">
                    <a href="#" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt text-danger mr-1"></i>
                        <p class="text-danger">Sair</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
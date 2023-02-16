<div class="navbar-fixed">
    <nav id="top-nav" class="black" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="{{ route('home') }}" class="brand-logo">
                <span id="text">UELLO</span>
            </a>
            <ul class="menu right">
                <li><a href="{{ route('clients.index') }}">Clientes</a></li>
                <li>
                    <a href="#">
                        Importações
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                    <ul>
                        <li><a href="{{ route('imports') }}">Ceps</a></li>
                        <li><a href="{{ route('stream') }}">Rodar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div id="services-dropdown" class="dropdown-content row">
    <ul class="vertical-tabs col s4">
        <li><a href="{{ route('imports') }}" style="font-weight: bolder">Ceps</a></li>
    </ul>

    <div class="vertical-tab-content col s8" style="padding: 0">
    </div>
</div>

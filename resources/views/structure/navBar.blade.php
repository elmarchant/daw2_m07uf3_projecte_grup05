<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CCONG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="/inici">Inici</a>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Relació
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="/associacions">Associacions</a></li>
                                <li><a class="dropdown-item" href="/socis">Socis</a></li>
                                <li><a class="dropdown-item" href="/vincles">Vincles</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Treballadors
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="/professionals">Professionals</a></li>
                                <li><a class="dropdown-item" href="/voluntaris">Voluntaris</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                @if ($_SESSION['administrador'] == 'true')
                    <a class="nav-link" href="/usuaris">Administració d'usuaris</a>
                @endif
            </div>
        </div>
        <form action="/session/destroy" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Tancar sessió</button>
        </form>
    </div>
</nav>
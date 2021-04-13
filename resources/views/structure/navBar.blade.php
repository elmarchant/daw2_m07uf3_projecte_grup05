<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CCONG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="/inici">Inici</a>
                <a class="nav-link" href="#">ONGs</a>
                <a class="nav-link" href="#">Socis</a>
                <a class="nav-link" href="#">Treballadors</a>
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
<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Usuaris</title>
    <script src="{{ asset('js/usuari-remove.js') }}"></script>
</head>
<body>
    <main>
        @include('structure.navBar')
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <h1>Usuaris</h1>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Nom usuari</th>
                        <th>Rol</th>
                        <th>Accions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuaris as $usuari)
                        @if ($usuari['id'] != $_SESSION['id'])
                            <tr>
                                <td>{{$usuari['id']}}</td>
                                <td>{{$usuari['nom']}}</td>
                                <td>{{$usuari['nom_usuari']}}</td>
                                <td>
                                    @if ($usuari['administrador'] == '1')
                                        Administrador
                                    @else
                                        Normal                                        
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                            Accions
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li><a class="dropdown-item" href="/usuari/update/{{$usuari['id']}}" type="button">Modificar</a></li>
                                            <li>
                                                <form style="display: inline;" class="remove-form" action="/usuari/remove" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{$usuari['id']}}">
                                                    <input type="hidden" name="nom_usuari" value="{{$usuari['nom_usuari']}}">
                                                    <button type="submit" class="dropdown-item">Eliminar</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr> 
                        @endif
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="d-grid gap-2">
                <a class="btn btn-primary" href="/usuari/create" role="button">Afegir Usuari</a>
            </div>
        </section>
    </main>
</body>
</html>
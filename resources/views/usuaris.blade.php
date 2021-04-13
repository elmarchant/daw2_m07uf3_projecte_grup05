<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Usuaris</title>
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
                                    @if ($usuari['administrador'] == 'true')
                                        Administrador
                                    @else
                                        Normal                                        
                                    @endif
                                </td>
                            </tr> 
                        @endif
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
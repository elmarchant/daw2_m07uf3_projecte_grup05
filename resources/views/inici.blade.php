<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Inici</title>
</head>
<body>
    <main>
        @include('structure.navBar')
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <h1>Benvingut a la pàgina d'inici de la Coordinadora Catalana d'ONGs</h1>
            <hr>
            <p>Nosaltres coordinem totes les ONG de Catalunya.</p>
            <h1>Dades de l'usuari</h1>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tipus de dada</th>
                        <th>Dades</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Nom</th>
                        <td>{{$self['nom']}}</td>
                    </tr>
                    <tr>
                        <th>Nom usuari</th>
                        <td>{{$self['nom_usuari']}}</td>
                    </tr>
                    <tr>
                        <th>Contrasenya</th>
                        <td>********</td>
                    </tr>
                    <tr>
                        <th>Rol</th>
                        <td>
                            @if (intval($self['administrador']) == 1)
                                Administrador
                            @else
                                Usuari
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="d-grid gap-2">
                <a  href="/self/update/{{$self['id']}}" class="btn btn-success" role="button">Personalitzar</a>
            </div>
        </section>
    </main>
</body>
</html>
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
            <p><b>Nom: </b>{{$self['nom']}}</p>
            <p><b>Nom usuari: </b>{{$self['nom_usuari']}}</p>
            <p><b>Contrasenya: </b>*******</p>
            <p><b>Rol: </b>
                @if (intval($self['administrador']) == 1)
                    Administrador
                @else
                    Usuari
                @endif
            </p>
        </section>
    </main>
</body>
</html>
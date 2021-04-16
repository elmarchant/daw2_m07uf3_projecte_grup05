<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Informació completa</title>
    <script src="{{ asset('js/soci-remove.js') }}"></script>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/socis">Socis</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Información completa</li>
                </ol>
            </nav>
            <h1>Informació completa</h1>
            <hr>
            <table class="table">
                <tbody>
                    <tr>
                        <th>NIF</th>
                        <td>{{$soci['NIF']}}</td>
                    </tr>
                    <tr>
                        <th>Nom</th>
                        <td>{{$soci['nom']}}</td>
                    </tr>
                    <tr>
                        <th>Cognom</th>
                        <td>{{$soci['cognom']}}</td>
                    </tr>
                    <tr>
                        <th>Correu</th>
                        <td>{{$soci['correu']}}</td>
                    </tr>
                    <tr>
                        <th>Adreça</th>
                        <td>{{$soci['adreca']}}</td>
                    </tr>
                    <tr>
                        <th>Població</th>
                        <td>{{$soci['poblacio']}}</td>
                    </tr>
                    <tr>
                        <th>Commarca</th>
                        <td>{{$soci['commarca']}}</td>
                    </tr>
                    <tr>
                        <th>Mòbil</th>
                        <td>{{$soci['mobil']}}</td>
                    </tr>
                    <tr>
                        <th>Teléfono Fixa</th>
                        <td>{{$soci['tel_fixa']}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a role="button" href="/socis" class="btn btn-primary">Tornar</a>
                <a role="button" href="/soci/update/{{$soci['NIF']}}" class="btn btn-success">Modificar</a>
                <button type="submit" form="eliminar" class="btn btn-danger">Eliminar</button>
            </div>
            <form style="display: none;" id="eliminar" class="remove-form" action="/soci/remove" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="nif" value="{{$soci['NIF']}}">
            </form>
        </section>
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Informació completa</title>
    <script src="{{ asset('js/treballador-remove.js') }}"></script>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/voluntaris">Voluntaris</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Información completa</li>
                </ol>
            </nav>
            <h1>Informació completa</h1>
            <hr>
            <table class="table">
                <tbody>
                    <tr>
                        <th>NIF</th>
                        <td>{{$voluntari['NIF']}}</td>
                    </tr>
                    <tr>
                        <th>Nom</th>
                        <td>{{$voluntari['nom']}}</td>
                    </tr>
                    <tr>
                        <th>Cognom</th>
                        <td>{{$voluntari['cognom']}}</td>
                    </tr>
                    <tr>
                        <th>Correu</th>
                        <td>{{$voluntari['correu']}}</td>
                    </tr>
                    <tr>
                        <th>Adreça</th>
                        <td>{{$voluntari['adreca']}}</td>
                    </tr>
                    <tr>
                        <th>Població</th>
                        <td>{{$voluntari['poblacio']}}</td>
                    </tr>
                    <tr>
                        <th>Commarca</th>
                        <td>{{$voluntari['commarca']}}</td>
                    </tr>
                    <tr>
                        <th>Mòbil</th>
                        <td>{{$voluntari['mobil']}}</td>
                    </tr>
                    <tr>
                        <th>Teléfono Fixa</th>
                        <td>{{$voluntari['tel_fixa']}}</td>
                    </tr>
                    <tr>
                        <th>Associació</th>
                        <td>{{$associacio['nom']}}</td>
                    </tr>
                    <tr>
                        <th>Professió</th>
                        <td>{{$voluntari['professio']}}</td>
                    </tr>
                    <tr>
                        <th>Data d'ingrés</th>
                        <td>{{$voluntari['data_ingres']}}</td>
                    </tr>
                    <tr>
                        <th>Hores de treball</th>
                        <td>{{$voluntari['hores']}}</td>
                    </tr>
                    <tr>
                        <th>Edat</th>
                        <td>{{$voluntari['edat']}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a role="button" href="/voluntaris" class="btn btn-primary">Tornar</a>
                <a role="button" href="/voluntari/update/{{$voluntari['NIF']}}" class="btn btn-success">Modificar</a>
                <button type="submit" form="eliminar" class="btn btn-danger">Eliminar</button>
            </div>
            <form style="display: none;" id="eliminar" class="remove-form" action="/voluntari/remove" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="nif" value="{{$voluntari['NIF']}}">
            </form>
        </section>
    </main>
</body>
</html>
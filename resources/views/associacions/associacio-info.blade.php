<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Informació completa</title>
    <script src="{{ asset('js/associacio-remove.js') }}"></script>
</head>
<body>
    <main>
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/associacions">Associacions</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Información completa</li>
                </ol>
            </nav>
            <h1>Informació completa</h1>
            <hr>
            <table class="table">
                <tbody>
                    <tr>
                        <th>CIF</th>
                        <td>{{$associacio['CIF']}}</td>
                    </tr>
                    <tr>
                        <th>Nom</th>
                        <td>{{$associacio['nom']}}</td>
                    </tr>
                        <th>Adreça</th>
                        <td>{{$associacio['adreca']}}</td>
                    </tr>
                    <tr>
                        <th>Població</th>
                        <td>{{$associacio['poblacio']}}</td>
                    </tr>
                    <tr>
                        <th>Commarca</th>
                        <td>{{$associacio['commarca']}}</td>
                    </tr>
                    <tr>
                        <th>Declaració</th>
                        <td>{{$associacio['declaracio']}}</td>
                    </tr>
                    <tr>
                        <th>Tipus</th>
                        <td>{{$associacio['tipus']}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a role="button" href="/associacios" class="btn btn-primary">Tornar</a>
                <a role="button" href="/associacio/update/{{$associacio['CIF']}}" class="btn btn-success">Modificar</a>
                <button type="submit" form="eliminar" class="btn btn-danger">Eliminar</button>
            </div>
            <form style="display: none;" id="eliminar" class="remove-form" action="/associacio/remove" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="cif" value="{{$associacio['CIF']}}">
            </form>
        </section>
    </main>
</body>
</html>
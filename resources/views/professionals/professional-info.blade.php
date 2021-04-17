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
                    <li class="breadcrumb-item"><a href="/professionals">Professionals</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Información completa</li>
                </ol>
            </nav>
            <h1>Informació completa</h1>
            <hr>
            <table class="table">
                <tbody>
                    <tr>
                        <th>NIF</th>
                        <td>{{$professional['NIF']}}</td>
                    </tr>
                    <tr>
                        <th>Nom</th>
                        <td>{{$professional['nom']}}</td>
                    </tr>
                    <tr>
                        <th>Cognom</th>
                        <td>{{$professional['cognom']}}</td>
                    </tr>
                    <tr>
                        <th>Correu</th>
                        <td>{{$professional['correu']}}</td>
                    </tr>
                    <tr>
                        <th>Adreça</th>
                        <td>{{$professional['adreca']}}</td>
                    </tr>
                    <tr>
                        <th>Població</th>
                        <td>{{$professional['poblacio']}}</td>
                    </tr>
                    <tr>
                        <th>Commarca</th>
                        <td>{{$professional['commarca']}}</td>
                    </tr>
                    <tr>
                        <th>Mòbil</th>
                        <td>{{$professional['mobil']}}</td>
                    </tr>
                    <tr>
                        <th>Teléfono Fixa</th>
                        <td>{{$professional['tel_fixa']}}</td>
                    </tr>
                    <tr>
                        <th>Associació</th>
                        <td>{{$associacio['nom']}}</td>
                    </tr>
                    <tr>
                        <th>Càrrec</th>
                        <td>{{$professional['carrec']}}</td>
                    </tr>
                    <tr>
                        <th>Data d'ingrés</th>
                        <td>{{$professional['data_ingres']}}</td>
                    </tr>
                    <tr>
                        <th>Descompte de l'IRPF</th>
                        <td>{{$professional['desc_irpf']}}</td>
                    </tr>
                    <tr>
                        <th>Seguretat Social</th>
                        <td>{{$professional['quantitat_seguretat_social']}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a role="button" href="/professionals" class="btn btn-primary">Tornar</a>
                <a role="button" href="/professional/update/{{$professional['NIF']}}" class="btn btn-success">Modificar</a>
                <button type="submit" form="eliminar" class="btn btn-danger">Eliminar</button>
            </div>
            <form style="display: none;" id="eliminar" class="remove-form" action="/professional/remove" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="nif" value="{{$professional['NIF']}}">
            </form>
        </section>
    </main>
</body>
</html>
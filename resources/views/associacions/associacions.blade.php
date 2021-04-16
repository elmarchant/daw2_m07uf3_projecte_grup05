<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Associacions</title>
    <script src="{{ asset('js/associacio-remove.js') }}"></script>
</head>
<body>
    <main>
        @include('structure.navBar')
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <h1>Associacions</h1>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>CIF</th>
                        <th>Nom</th>
                        <th>Adreça</th>
                        <th>Població</th>
                        <th>Commarca</th>
                        <th>Declaració</th>
                        <th>Tipus</th>
                        <th>Accions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($associacions as $associacio)
                    <tr>
                        <th>{{$number}}</th>
                        <td>{{$associacio['CIF']}}</td>
                        <td>{{$associacio['nom']}}</td>
                        <td>{{$associacio['adreca']}}</td>
                        <td>{{$associacio['poblacio']}}</td>
                        <td>{{$associacio['commarca']}}</td>
                        <td>{{$associacio['declaracio']}}</td>
                        <td>{{$associacio['tipus']}}</td>
                        <td>
                            <a class="btn btn-success" href="/associacio/update/{{$associacio['CIF']}}" role="button">Modificar</a>
                            <form style="display: inline;" class="remove-form" action="/associacio/remove" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="cif" value="{{$associacio['CIF']}}">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="d-grid gap-2">
                <a class="btn btn-primary" href="/associacio/create" role="button">Afegir Associació</a>
            </div>
        </section>
    </main>
</body>
</html>
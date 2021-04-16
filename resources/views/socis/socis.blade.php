<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Socis</title>
    <script src="{{ asset('js/soci-remove.js') }}"></script>
</head>
<body>
    <main>
        @include('structure.navBar')
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <h1>Socis</h1>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIF</th>
                        <th>Nom</th>
                        <th>Cognom</th>
                        <th>Accions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($socis as $soci)
                    <tr>
                        <th>{{$number}}</th>
                        <td>{{$soci['NIF']}}</td>
                        <td>{{$soci['nom']}}</td>
                        <td>{{$soci['cognom']}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                    Accions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li><a class="dropdown-item" href="/soci/info/{{$soci['NIF']}}" type="button">Informació completa</a></li>
                                    <li><a class="dropdown-item" href="/soci/update/{{$soci['NIF']}}" type="button">Modificar</a></li>
                                    <li><button type="submit" form="eliminar" class="dropdown-item">Eliminar</button></li>
                                </ul>
                            </div>
                            <form style="display: none;" id="eliminar" class="remove-form" action="/soci/remove" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="nif" value="{{$soci['NIF']}}">
                            </form>
                        </td>
                        @php
                            $number++;
                        @endphp
                    </tr> 
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="d-grid gap-2">
                <a class="btn btn-primary" href="/soci/create" role="button">Afegir Soci</a>
            </div>
        </section>
    </main>
</body>
</html>
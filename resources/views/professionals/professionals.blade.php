<!DOCTYPE html>
<html lang="ca">
<head>
    @include('structure.head_content')
    <title>Professionals</title>
    <script src="{{ asset('js/professional-remove.js') }}"></script>
</head>
<body>
    <main>
        @include('structure.navBar')
        <section class="container rounded p-4 mt-4 mb-4 bg-light">
            <h1>Professionals</h1>
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
                    @foreach ($professionals as $professional)
                    <tr>
                        <th>{{$number}}</th>
                        <td>{{$professional['nif']}}</td>
                        <td>{{$professional['nom']}}</td>
                        <td>{{$professional['cognom']}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                    Accions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <li><a class="dropdown-item" href="/professional/info/{{$professional['nif']}}" type="button">Informació completa</a></li>
                                    <li><a class="dropdown-item" href="/professional/update/{{$professional['nif']}}" type="button">Modificar</a></li>
                                    <li><button type="submit" form="{{$professional['nif']}}" class="dropdown-item">Eliminar</button></li>
                                </ul>
                            </div>
                            <form style="display: none;" id="{{$professional['nif']}}" class="remove-form" action="/professional/remove" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="nif" value="{{$professional['nif']}}">
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
                <a class="btn btn-primary" href="/professional/create" role="button">Afegir professional</a>
            </div>
        </section>
    </main>
</body>
</html>
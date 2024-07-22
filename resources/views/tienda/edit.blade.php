<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <link rel="stylesheet" href="{{ asset('css/stylesEdit.css') }}">
   
</head>
<body>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tienda.update', $persona->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h3>Editar Persona</h3>

        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" value="{{ old('Nombre', $persona->Nombre) }}" required>

        <label for="Apellido">Apellido:</label>
        <input type="text" id="Apellido" name="Apellido" value="{{ old('Apellido', $persona->Apellido) }}" required>

        <label for="Email">Email:</label>
        <input type="email" id="Email" name="Email" value="{{ old('Email', $persona->Email) }}">

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('tienda.index') }}"><i class="fas fa-arrow-left"></i> Volver a la lista</a>
</body>
</html>
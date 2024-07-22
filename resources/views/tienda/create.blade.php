<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registrar persona</h1>
    <form action="{{route('tienda.store')}}" method="POST">
        @csrf
        <label for="">Nombre</label>
        <input type="text" name="Nombre" require>
        <label for="">Apellido</label>
        <input type="text" name="Apellido" >
        <label for="">Email</label>
        <input type="email" name="Email">
        <button type="submit">Enviar</button>

    </form>
</body>
</html> 
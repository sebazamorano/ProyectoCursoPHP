<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
</head>
<body>

<table border>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
    </tr>
    <?php foreach($usuarios as $usuario): ?>
    <tr>
        <td><?= $usuario->id ?></td>
        <td><?= $usuario->nombre ?></td>
        <td><?= $usuario->email ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<hr>
<form action="/usuarios" method="post">
    <input name="nombre" type="text" placeholder="Nombre">
    <input name="email" type="email" placeholder="Email">
    <input name="password" type="password" placeholder="Password">
    <button>Guardar</button>
</form>
</body>
</html>
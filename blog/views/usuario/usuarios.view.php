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
<a href="/crearUsuario">Crear Usuario</a>
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
        <td>
            <a href="/actualizarUsuario?id=<?= $usuario->id ?>">Editar</a>
        </td>
        <td>
            <form action="/eliminarUsuario" method="post">
                <input type="hidden" name="id" value="<?= $usuario->id ?>">
                <button>Eliminar</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<hr>
</body>
</html>
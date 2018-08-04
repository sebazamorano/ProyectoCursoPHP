<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if (isset($errors)): ?>
    <ul>
        <?php foreach($errors as $error): ?>
            <li><?= implode(', ', $error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<form action="/update" method="post">
    <input name="nombre" value="<?= $usuario->nombre ?>" type="text" placeholder="Nombre" >
    <input name="email" value="<?= $usuario->email ?>" type="email" placeholder="Email" >
    <input name="id" value="<?= $usuario->id ?>" type="hidden">
    <button>Actualizar</button>
</form>
</body>
</html>
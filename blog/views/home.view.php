<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Es mi blog</title>
</head>
<body>
    <h1>Estas son tus tareas</h1>

    <p>Hola tu nombre es : <?= $nombre ?></p>

    <?php if (count($tareas) > 0): ?>
        <p>Tus Tareas Son :</p>
        <ul>
            <?php foreach($tareas as $tarea): ?>
                <li><?= $tarea ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No hay Tareas</p>
    <?php endif; ?>
</body>
</html>
<?php
    require_once("../connection/connection.php");
?>

<?php if(isset($_SESSION["user"])): ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<!-- Para cambiar de modo oscuro "dark" a modo normal, simplemente cambiarlo por "light"-->

<head>

    <meta charset="UTF-8">
    <meta name="description" content="Este es mi portfolio personal">
    <meta name="keywords" content="html, css, sass, bootstrap, js, portfolio, proyectos">
    <meta name="language" content="EN">
    <meta name="author" content="tumail@vedruna.es">
    <meta name="robots" content="index,follow">
    <meta name="revised" content="Tuesday, February 28th, 2023, 23:00pm">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-edge, chrome1">

    <!-- Añado la fuente Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"
        defer></script>

    <!-- My css -->
    <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
    <!-- My scripts -->
    <script type="text/javascript" src="js/app.js" defer></script>

    <!-- Icono al lado del titulo -->
    <link rel="shortcut icon" href="media/icon/favicon.png" type="image/xpng">

    <!-- Titulo -->
    <title>Perfil</title>

</head>
<body>
    <?php
        // Comprobar si el usuario logueado ya sigue al usuario seleccionado
        $sigue = false;

        if ($selectedUser['id'] != $_SESSION['user']['id']) { // Si no es el propio perfil
            $idUsuarioLogueado = $_SESSION['user']['id'];
            $idUsuarioSeleccionado = $selectedUser['id'];

            // Comprobar en la tabla follows si el usuario logueado sigue al usuario seleccionado
            $sql_comprobar_seguimiento = "SELECT * FROM follows WHERE users_id = $idUsuarioLogueado AND userToFollowId = $idUsuarioSeleccionado";
            $resultado_comprobar_seguimiento = mysqli_query($connect, $sql_comprobar_seguimiento);

            if ($resultado_comprobar_seguimiento && mysqli_num_rows($resultado_comprobar_seguimiento) > 0) {
                $sigue = true; // El usuario ya sigue a este perfil
            }
        }
    ?>


    <!-- botenes para seguir y dejar de seguir: -->

    <?php if ($selectedUser['id'] != $_SESSION['user']['id']): ?>
        <form action="seguir.php" method="POST">
            <input type="hidden" name="id_seguidor" value="<?= $_SESSION['user']['id'] ?>">
            <input type="hidden" name="id_a_seguir" value="<?= $selectedUser['id'] ?>">                  
            <?php if ($sigue): ?>
                <button type="submit" name="accion" value="dejar_seguir" class="btn btn-danger">Dejar de seguir</button>
            <?php else: ?>
                <button type="submit" name="accion" value="seguir" class="btn btn-primary">Seguir</button>
            <?php endif; ?>
        </form>
    <?php endif; ?>

 

</body>
</html>


<?php else: ?>
    <h1><?= "NO ESTAS LOGUEADO"?></h1>
<?php endif;?>
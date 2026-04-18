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
    <div class="container mt-5">

        <?php
            // Comprobamos si hay un usuario logueado
            if (isset($_SESSION["user"])) {

                // Inicializamos una variable para el perfil del usuario que se va a mostrar
                $selectedUser = null;
        
               // Comprobar si se ha pasado un username por la URL
               if (isset($_GET['username'])) {
                    // Si se pasa un username, buscamos el perfil de ese usuario
                    $username = mysqli_real_escape_string($connect, $_GET['username']);
                    // Consulta para obtener los datos del usuario seleccionado
                    $sql = "SELECT * FROM users WHERE username = '$username'";
                    $result = mysqli_query($connect, $sql);
        
                    // Si el usuario existe, cargamos sus datos en $selectedUser
                    if ($result && mysqli_num_rows($result) == 1) {
                        $selectedUser = mysqli_fetch_assoc($result);
                    } else {
                        // Si no se encuentra el usuario, mostramos un mensaje de error
                        echo "<h1>El usuario que estás buscando no existe.</h1>";
                        exit; // Finaliza el script aquí
                    }
                }
        
                // Si no hay userId en la URL, o si falló la búsqueda, mostramos el perfil del usuario logueado
                if (!$selectedUser) {
                    $selectedUser = $_SESSION['user'];
                }
            }
        ?>


            <!-- Mostrar nombre de usuario -->
            <h1><?= $selectedUser['username'] ?></h1>
            <h6> 
                Fecha de creación: <?= $selectedUser['createDate'] ?><br>
                <?= $selectedUser['description'] ?>  
            </h6>

            <!-- Si estamos viendo el perfil del usuario logueado, mostramos estos botones -->
            <?php if ($selectedUser['id'] == $_SESSION['user']['id']): ?>
                <div>
                    <h6> 
                        Email: <?= $selectedUser['email'] ?><br>
                    </h6> 
                    <a href="tweets.php" class="btn btn-primary mt-2 mb-2" style="border-radius: 50px; font-weight: bold;">Inicio</a>
                    <a href="todos_tweets.php" class="btn btn-primary mt-2 mb-2" style="border-radius: 50px; font-weight: bold;">Todos</a>
                    <a href="tweets.php" class="btn btn-primary mt-2 mb-2" style="border-radius: 50px; font-weight: bold;">Seguidos</a>
                    <a href="todos_tweets.php" class="btn btn-primary mt-2 mb-2" style="border-radius: 50px; font-weight: bold;">Seguidores</a>
                </div>

                <a href="../sesion/logout.php" class="btn btn-danger mt-4" style="border-radius: 50px; font-weight: bold;">Cerrar Sesión</a>
           
            <?php else: ?>
                <!-- Si estamos viendo el perfil de otro usuario, mostramos un botón para volver -->
                <div>
                    <a href="tweets.php" class="btn btn-primary mt-2 mb-2" style="border-radius: 50px; font-weight: bold;">Seguir</a>
                    <a href="tweets.php" class="btn btn-primary mt-2 mb-2" style="border-radius: 50px; font-weight: bold;">Seguidos</a>
                    <a href="todos_tweets.php" class="btn btn-primary mt-2 mb-2" style="border-radius: 50px; font-weight: bold;">Seguidores</a>
                    <a href="tweets.php" class="btn btn-secondary mt-2 mb-2" style="border-radius: 50px; font-weight: bold;">Volver</a>
                </div> 
            <?php endif;?>          
    </div>
</body>
</html>


<?php else: ?>
    <h1><?= "NO ESTAS LOGUEADO"?></h1>
<?php endif;?>
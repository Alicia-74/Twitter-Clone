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
    <title>Tweets</title>

</head>
<body>
    <div class="container mt-5">
        <h1><?=$_SESSION['user']['username']?></h1>
        <h6> 
            Email: <?= $_SESSION['user']['email'] ?><br>
            Fecha de creación: <?= $_SESSION['user']['createDate'] ?><br>
            Descripción: <?= $_SESSION['user']['description'] ?>  
        </h6>

        <!-- Formulario para escribir un nuevo tweet -->
        <form action="post_tweet.php" method="POST" class="mb-4">
            <div class="form-group">
                <textarea id="tweet" name="tweet" class="form-control mt-2" rows="3" placeholder="Escribe tu nuevo tweet" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2" style="border-radius: 50px; font-weight: bold;">Publicar Tweet</button>
        </form>
        <a href="../sesion/logout.php" class="btn btn-danger mt-4" style="border-radius: 50px; font-weight: bold;">Cerrar Sesión</a>
       <?php
            // Obtener tweets de las personas que sigues
           // $sql= "SELECT  u.username, publ.createDate, publ.text 
               // FROM publications AS publ
               // JOIN follows AS f
                //ON (f.userToFollowId = publ.userId) 
                //JOIN users AS u
               // ON (u.id = publ.userId) 
               // WHERE f.users_id = ?
               // ORDER BY publ.createDate DESC;";
                
           // $query=mysqli_query($connect, $sql);
            //$row=mysqli_fetch_array($query);
        ?> 

        <!-- Mostrar tweets de las personas que sigues -->
         <div class="tweets">
            <?php while ($row = mysqli_fetch_array($query)): ?>
                <div class="tweet">
                    <span class="username"><?= $row['username'] ?></span>
                    <p><?= $row['text'] ?></p>
                    <span class="timestamp"><?= $row['createDate'] ?></span>
                </div>
            <?php endwhile; ?>
        </div>

        <a href="../sesion/logout.php" class="btn btn-danger mt-4" style="border-radius: 50px; font-weight: bold;">Cerrar Sesión</a>
    </div>
</body>
</html>


<?php else: ?>
    <h1><?= "NO ESTAS LOGUEADO"?></h1>
<?php endif;?>
<a href="../sesion/logout.php">Logout</a>
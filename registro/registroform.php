<?php
    require_once("../connection/connection.php");

?>

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
    <title>Registro</title>

</head>

<body>
    <div id="contact" class="container vh-100 d-flex justify-content-center align-items-center">
        <?php if(isset($_SESSION["errores"])){
            var_dump($_SESSION["errores"]);
        }
        
        ?>

        <?php if(isset($_SESSION["completado"])){
            echo "Registro completado";
        }
        
        ?>
        <form action="registro.php" method="POST" class="mt-2 mx-auto custom-rounded custom-shadow" style="background-color: rgb(8, 8, 8); font-size:15px; width:45%; height:85%;">
            <fieldset class="form-row reset p-4 align-items-center border border-primary p-4 custom-rounded" style="height:100%;">
                <div class="d-flex justify-content-center">
                    <img src="../img/x-logo-Photoroom.png" style="width: 120px; height: 70px;" alt="Logo">
                </div>
                <legend class="d-flex justify-content-center align-items-center mt-5" style="font-size:30px; font-weight: bold; color:azure;">Únete a nosotros</legend>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <div class="col-sm-10 mx-auto">
                        <input type="text" id="username" class="form-control text-info" style="background-color: rgb(8, 8, 8); font-size:15px;" name="username" placeholder="Nombre" required />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <div class="col-sm-10 mx-auto">
                        <input type="email" id="email" class="form-control text-info"  style="background-color: rgb(8, 8, 8); font-size:15px;" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/>
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <div class="col-sm-10 mx-auto">
                        <input type="password" id="password" class="form-control text-info"  name="password" placeholder="Contraseña" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                            title="Debe contener al menos un número y una mayúscula y una minúscula, y al menos 8 o más carácteres"/>
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <div class="col-sm-10 mx-auto">
                        <input type="text" id="description" class="form-control text-info" style="background-color: rgb(8, 8, 8); font-size:15px;" name="description" placeholder="Descripción"/>
                    </div>
                </div>

                <div class="row g-3 mt-4 w-50 mx-auto">
                    <input id="sendBttn"  class="btn btn-light btn-lg text-dark" style="padding-top:4px; padding-bottom:4px; border-radius: 50px; font-size:15px; font-weight: bold;" type="submit" value="Siguiente" name="submit"/>
                    <div class="d-flex align-items-center mt-5" style="white-space: nowrap;">
                        <p style="color: rgb(100, 100, 100); margin-right: 5px; margin-bottom: 0; font-size:15px;">¿Ya tienes una cuenta?</p>
                        <a class="text-primary" style="font-size:15px;" href="../index.php">Inicio sesión</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <?php 
        if(isset($_SESSION["errores"])){
            $_SESSION["errores"] = null;
            session_unset($_SESSION["errores"]);
        }
    ?>

</body>

</html>
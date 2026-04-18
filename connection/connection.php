<?php
    $host = "localhost:3306";
    $user = "root";
    $pass = "root";

    $bd = "social_network";

    $connect=mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    #Una sesion es el periodo de tiempo durante el cual el usuario ve un numero de paginas determinado
    #del mismo dominio sin necesidad de identificarse cada vez que se recarga la pagina (almacenar y persistir)
    session_start();

?>
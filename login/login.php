<?php 
    require_once "../connection/connection.php";

    if (isset($_POST)) {
        $email = trim($_POST["email"]);
        $pass = $_POST["password"];
    }

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($connect, $sql);

    if ($res && mysqli_num_rows($res) == 1) {
        $usuario = mysqli_fetch_assoc($res);

        if (password_verify($pass, $usuario["password"])) {
            $_SESSION["user"] = $usuario;
            header("Location: welcome.php");
        } else {
            $_SESSION["error_login"] = "Login incorrect";
            header("Location: ../index.php");
            var_dump("fallo");
        }
    } else {
        $_SESSION["error_login"] = "Login incorrecto";
        header("Location: ../index.php");
        var_dump("fallo");
    }


?>
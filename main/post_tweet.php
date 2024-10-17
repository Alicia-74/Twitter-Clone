<?php 

if (isset($_POST["submit"])) {
    require_once("../connection/connection.php");
    #session_start();


    //Recoger los datos
    $userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : false; // Obtener el userId del usuario logueado
    $mensaje = isset($_POST["text"]) ? mysqli_real_escape_string($connect, $_POST["text"]) : false; 
    $createDate = isset($_POST["createDate"]) ? mysqli_real_escape_string($con, $_POST["createDate"]) : date('Y-m-d'); 
    //var_dump($_POST);

    $arrayErrores = array();

    // Validación del mensaje
    // if (empty($mensaje)) {
    //     $arrayErrores[] = "El mensaje no puede estar vacío."; // Añadir error si el mensaje está vacío
    // }

    // if (!$userId) {
    //     $arrayErrores[] = "Usuario no logueado."; // Añadir error si el usuario no está logueado
    // }

    $guardarUsuario = false;
    if(count($arrayErrores) == 0) {
        $guardarUsuario = true;

        $sql = "INSERT INTO publications (userId, text, createDate) VALUES('$userId', '$mensaje', CURDATE())";
        $guardar = mysqli_query($connect, $sql);

        if ($guardar) {
            header("Location: tweets.php");
        } else {
            $_SESSION["errores"]["general"] = "Fallo en el registro";
        }
    } else {
        $_SESSION["errores"] = $arrayErrores;
    }
    
}
?>
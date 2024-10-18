<?php
require_once("../connection/connection.php");
session_start();

if (isset($_POST['id_seguidor']) && isset($_POST['id_a_seguir']) && isset($_POST['accion'])) {
    $id_seguidor = mysqli_real_escape_string($connect, $_POST['id_seguidor']);
    $id_a_seguir = mysqli_real_escape_string($connect, $_POST['id_a_seguir']);
    $accion = $_POST['accion'];

    if ($accion == 'seguir') {
        // Insertar una nueva relación de seguimiento en la tabla follows
        $sql_seguir = "INSERT INTO follows (users_id, userToFollowId) VALUES ($id_seguidor, $id_a_seguir)";
        if (mysqli_query($connect, $sql_seguir)) {
            // Redirigir de vuelta al perfil del usuario
            header("Location: perfil.php?username=" . $_GET['username']);
        } else {
            echo "Error al seguir al usuario.";
        }
    } elseif ($accion == 'dejar_seguir') {
        // Eliminar la relación de seguimiento
        $sql_dejar_seguir = "DELETE FROM follows WHERE users_id = $id_seguidor AND userToFollowId = $id_a_seguir";
        if (mysqli_query($connect, $sql_dejar_seguir)) {
            // Redirigir de vuelta al perfil del usuario
            header("Location: perfil.php?username=" . $_GET['username']);
        } else {
            echo "Error al dejar de seguir al usuario.";
        }
    }
} else {
    echo "Datos incorrectos.";
}
?>

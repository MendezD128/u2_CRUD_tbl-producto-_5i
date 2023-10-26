<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // tomar la identificación de la cadena de consulta
    $id = $_POST['delete_id'];

    // query eliminar
    $sql = "DELETE FROM productos WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    // apa query berhasil dieliminar?
    if ($query) {
        header('Location: ./index.php?eliminar=exito');
    } else
        die('Location: ./index.php?eliminar=gagal');
} else
    die("el acceso está prohibido...");

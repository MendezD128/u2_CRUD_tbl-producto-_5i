<?php
include("./config.php");
?>
<script>alert("hola     ");</script>
<?php
// Compruebe si se ha hecho clic en el botón de registro o no
if (isset($_POST['edit_data'])) {
    // Recuperar datos del formulario
    $id = $_POST['edit_id'];
    $edit_nombre = $_POST['edit_nombre'];
    $edit_Precio = $_POST['edit_Precio'];
    $edit_stock = $_POST['edit_stock'];
    $edit_cantidad = $_POST['edit_cantidad'];
    $edit_categoria = $_POST['edit_categoria'];
    $edit_descripcion = $_POST['edit_descripcion'];
    $edit_idprov = $_POST['edit_idprov'];

    // query
    $sql = "UPDATE productos SET nombre='$edit_nombre', precio='$edit_Precio', stock='$edit_stock', descripcion='$edit_descripcion', categoria='$edit_categoria', cantidad='$edit_cantidad', idprov='$edit_idprov' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    // Comprueba si la consulta se guardó correctamente
    if ($query)
        header('Location: ./index.php?actualizar=exito');
    else
        header('Location: ./index.php?actualizar=gagal');
} else
    die("Acceso prohibido...");
?>

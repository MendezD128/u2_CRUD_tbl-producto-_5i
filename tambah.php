<?php
include("./config.php");
?>
<script>alert("hola     ");</script>
<?php
// tomar la identificación de la cadena de consulta
if (isset($_POST['tambah'])) {
    // ambil data dari form
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $Precio = $_POST['Precio'];
    $Stock = $_POST['Stock'];
    $cantidad = $_POST['cantidad'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $idprov = $_POST['idprov'];

    // query
    $sql = "INSERT INTO productos(nombre, precio, stock, descripcion, categoria, cantidad, idprov)
    VALUES('$nombre', '$Precio', '$Stock', '$cantidad', '$categoria', '$descripcion', '$idprov')";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?status=exito');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("Acceso prohibido...");

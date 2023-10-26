<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "productos";

$db = mysqli_connect($server, $user, $password, $nama_database);

if (!$db)
    die("No se ha podido establecer conexion con la base de datos: " . mysqli_connect_error());

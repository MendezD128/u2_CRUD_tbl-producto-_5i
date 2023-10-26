<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Tabla Productos</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Tabla Productos</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form tambah productos -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
            <!-- tambah data -->
            <div class="card-body">
                <h3 class="card-title">Envio de Productos</h3>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque facere, delectus perferendis quos vel deleniti velit laborum eligendi esse quasi, nesciunt accusantium. Obcaecati impedit, deleniti totam cum recusandae rem placeat? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate deserunt magnam libero veritatis quisquam nobis! Odit cupiditate, mistocka consequatur expedita nulla dolor eos fuga. Blanditiis, repudiandae. Nemo harum cupiditate eum?</p>

                <!-- tampilkan pesan exito ditambah -->
                <?php if (isset($_GET['status'])) : ?>
                    <?php
                    if ($_GET['status'] == 'exito')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>exito!</strong> ¡Datos agregados exitosamente!
                        <button type='button' class='btn-cerrar' onclick='clicking()' data-bs-dismiss='alert' aria-label='cerrar'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> ¡Error al agregar datos!
                        <button type='button' class='btn-cerrar' onclick='clicking()' data-bs-dismiss='alert' aria-label='cerrar'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="tambah.php" method="POST">

                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Escribe aqui..." required>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" name="Precio" class="form-control" placeholder="000" required>
                    </div>

                    <div class="col-md-4">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" name="Stock" class="form-control" placeholder="000" required>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" placeholder="00" required>
                    </div>


                    <div class="col-md-4">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select class="form-select" name="categoria" aria-label="Default select example">
                            <option value="Electronica">Electronica</option>
                            <option value="Belleza">Belleza</option>
                            <option value="Videojuegos">Videojuegos</option>
                            <option value="Mobiliario">Mobiliario</option>
                            <option value="Oficina">Oficina</option>
                            <option value="Salud">Salud</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" placeholder="Escribe aqui..." required>
                    </div>

                    <div class="col-md-6">
                        <label for="idprov" class="form-label">Id del proveedor</label>
                        <input type="number" name="idprov" class=" form-control" placeholder="000" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i class="fa fa-plus"></i><span class="ms-2">Enviar Datos</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- judul tabel -->
        <h5 class="mb-3">Listado de entradas</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Entrada normal</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- tampilkan pesan exito dieliminar -->
        <?php if (isset($_GET['eliminar'])) : ?>
            <?php
            if ($_GET['eliminar'] == 'exito')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Eureka!</strong> ¡Datos eliminados exitosamente!
                        <button type='button' class='btn-cerrar' onclick='clicking()' data-bs-dismiss='alert' aria-label='cerrar'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> ¡Los datos eliminados fallaron!
                        <button type='button' class='btn-cerrar' onclick='clicking()' data-bs-dismiss='alert' aria-label='cerrar'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tampilkan pesan exito di edit -->
        <?php if (isset($_GET['actualizar'])) : ?>
            <?php
            if ($_GET['actualizar'] == 'exito')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Eureka!</strong> ¡Datos actualizados exitosamente!
                        <button type='button' class='btn-cerrar' onclick='clicking()' data-bs-dismiss='alert' aria-label='cerrar'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> ¡Los datos no se pudieron actualizar!
                        <button type='button' class='btn-cerrar' onclick='clicking()' data-bs-dismiss='alert' aria-label='cerrar'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabel -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>Id</th>";
            echo "<th scope='col'>Nombre</th>";
            echo "<th scope='col'>Precio</th>";
            echo "<th scope='col'>Stock</th>";
            echo "<th scope='col'>Cantidad</th>";
            echo "<th scope='col'>Descripcion</th>";
            echo "<th scope='col'>Categoria</th>";
            echo "<th scope='col'>Id proveedor</th>";
            echo "<th scope='col' class='text-center'>Acción</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $pagina_awal = ($pagina > 1) ? ($pagina * $batas) - $batas : 0;

            $previous = $pagina - 1;
            $next = $pagina + 1;

            $data = mysqli_query($db, "SELECT * FROM productos");
            $jumlah_data = mysqli_num_rows($data);
            $total_pagina = ceil($jumlah_data / $batas);

            $data_mhs = mysqli_query($db, "SELECT * FROM productos LIMIT $pagina_awal, $batas");
            $no = $pagina_awal + 1;

            // $sql = "SELECT * FROM productos";
            // $query = mysqli_query($db, $sql);

            while ($productos = mysqli_fetch_array($data_mhs)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $productos['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $productos['nombre'] . "</td>";
                echo "<td>" . $productos['precio'] . "</td>";
                echo "<td>" . $productos['stock'] . "</td>";
                echo "<td>" . $productos['cantidad'] . "</td>";
                echo "<td>" . $productos['descripcion'] . "</td>";
                echo "<td>" . $productos['categoria'] . "</td>";
                echo "<td>" . $productos['idprov'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // tombol eliminar
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>No hay datos disponibles en esta tabla</p>";
            } else {
                echo "<p>Total $jumlah_data entri</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_pagina; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $total_pagina) ? "href='?pagina=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Modal Edit-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar datos del Producto</h5>
                        <button type='button' class='btn-cerrar' data-bs-dismiss='modal' aria-label='cerrar'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM productos";
                    $query = mysqli_query($db, $sql);
                    $productos = mysqli_fetch_array($query);
                    ?>

                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_nombre" class="form-label">Nombre</label>
                                <input type="text" name="edit_nombre" id="edit_nombre" class="form-control" placeholder="Escribe aqui..." required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_Precio" class="form-label">Precio</label>
                                <input type="text" name="edit_Precio" id="edit_Precio" class="form-control" placeholder="000" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_stock" class="form-label">Stock</label>
                                <input type="text" name="edit_stock" id="edit_stock" class="form-control" placeholder="000" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_cantidad" class="form-label">Cantidad</label>
                                <input type="text" name="edit_cantidad" id="edit_cantidad" class="form-control" placeholder="00" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_categoria" class="form-label">Categoria</label>
                                <select class="form-select" name="edit_categoria" id="edit_categoria" aria-label="Default select example">
                                    <option value="Electronica">Electrónica</option>
                                    <option value="Belleza">Belleza</option>
                                    <option value="Videojuegos">Videojuegos</option>
                                    <option value="Mobiliario">Mobiliario</option>
                                    <option value="Oficina">Oficina</option>
                                    <option value="Salud">Salud</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_descripcion" class="form-label">Descripción</label>
                                <input type="text" name="edit_descripcion" class="form-control" id="edit_descripcion" placeholder="Escribe aqui..." required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_idprov" class="form-label">Id del Proveedor</label>
                                <input type="number"  name="edit_idprov" id="edit_idprov" class=" form-control" placeholder="000" required>
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>Editar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmar</h5>
                        <button type='button' class='btn-cerrar' data-bs-dismiss='modal' aria-label='cerrar'></button>
                    </div>


                    <form action='eliminar.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>¿Estás seguro de que quieres eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).cerrarst('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id').val(data[0]);
                // gak dipake, karena cuma increment number
                // $('#no').val(data[1]);
                $('#edit_nombre').val(data[2]);
                $('#edit_Precio').val(data[3]);
                $('#edit_stock').val(data[4]);
                $('#edit_cantidad').val(data[5]);
                $('#edit_descripcion').val(data[6]);
                $('#edit_categoria').val(data[7]);
                $('#edit_idprov').val(data[8]);
            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).cerrarst('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>
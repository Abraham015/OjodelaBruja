<?php
    $servername = "localhost";
    $username = "root";
    $password = "admin";
    $dbname = "ojodelabruja";
    $var="Datos ingresados correctamente";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $conn->set_charset('utf8');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "<script>alert('No se conecto a la base');'</script>"; 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../Images/icono.ico">
    <link rel="stylesheet" href="../css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</head>
<body style="background-image: url('../images/fondo.jpeg');">
    <nav class="navbar navbar-dark fixed-top nav_index">
        <div class="container-fluid">
            <img src="../Images/logo.png" style="height: 100px; width: 100px;">
            <button type="button" class="btn btn-danger">Cerrar Sesion</button>
        </div>
    </nav>
    <div class="container" style="padding-top: 140px;">
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong>Sesión Iniciada con Éxito</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="mb-3"></div>
            <div class="card">
                <div class="card-header text-center text-primary">
                    <h1 class="card-title">Listado de Citas</h1>
                </div>
                <div class="card-body text-primary">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Fecha de la Cita</th>
                                <th>Hora de la Cita</th>
                                <th>Contactar</th>
                                <th>Cambiar Cita</th>
                                <th>Cancelar Cita</th>
                            </tr>
                        </thead>
                    <?php
                        $sql="SELECT * FROM usuarios";
                        $resultAll = mysqli_query($conn, "SELECT * FROM usuarios");
                        if(mysqli_num_rows($resultAll) < 1){  
                    ?>
                        <tbody>
                            <tr>
                                <td colspan="6">
                                    <div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading text-center">No hay citas</h4>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        
                    <?php
                        }else{
                            while($mostrar=mysqli_fetch_array($resultAll)) {
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $mostrar['Nombre'] ?></td>
                            <td><?php echo $mostrar['numero'] ?></td>
                            <td><?php echo $mostrar['correo'] ?></td>
                            <td><?php echo $mostrar['fechaCita'] ?></td>
                            <td><?php echo $mostrar['hora'] ?></td>
                            <td><a href="https://wa.me/<?php echo $mostrar['numero'] ?>"><button type="button" class="btn btn-success">Whatsapp</button></a></td>
                            <td><button type="button" class="btn btn-warning">Modificar</button></td>
                            <td><button type="button" class="btn btn-danger">Cancelar</button></td>
                        </tr>
                        </tbody>
                        
                    <?php 
                            }
                        } 
                    ?>
                    </table>
                </div>
            </div>
    </div>
</body>
</html>
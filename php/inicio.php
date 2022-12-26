<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
	session_start();

    $correo=$_REQUEST["Usuario"];
    $pass=$_REQUEST["Password"];

    $servername = "localhost";
    $username = "root";
    $password = "admin";
    $dbname = "ojodelabruja";
    $var="Datos ingresados correctamente";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "<script>alert('No se conecto a la base');'</script>"; 
    }else{
        $resultado = $conn->query( "SELECT * FROM Administrador WHERE usuario = '$correo'");
        $row = $resultado->fetch_assoc();
        $mail=$row['usuario'];
        $cont=$row['contrasena'];
        if($correo==$mail){
            if(md5($pass)==md5($cont))
                header("Location: Dashbord.php");
            else
                echo "<script>alert('Contraseña incorrecta. Intentelo de nuevo'); window.location='../Login.html'</script>";
        }else{
            echo "<script>alert('Usuario no correcto. Intentelo de nuevo'); window.location='../Login.html'</script>";
        }
    }
?>
</body>
</html>
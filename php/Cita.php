<?php
    $nombre=$_REQUEST["Nombre"];
    $correo=$_REQUEST["Mail"];
    $numero=$_REQUEST["Numero"];
    $fecha=$_REQUEST["fecha"];
    $horario=$_REQUEST["horario"];

    switch($horario){
        case 1:
            $cita="9:30";
        break;
        case 2:
            $cita="10:30";
            break;
        case 3:
            $cita="11:30";
        break;
        case 4:
            $cita="12:30";
            break;
        case 5:
            $cita="16:00";
        break;
        case 6:
            $cita="18:00";
            break;
        case 7:
            $cita="20:00";
        break;
    }

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
        $sql = "INSERT INTO usuarios (Nombre, correo, numero, fechaCita, hora) 
        VALUES ('$nombre', '$correo', '$numero', '$fecha', '$cita')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Cita creada con éxito, en breve nos comunicaremos con usted');'</script>"; 
            header("Location: ../Cita.html");
        } else {
            echo "<script>alert('Error al crear la cita, intente de nuevo');'</script>"; 
        }
          
        $conn->close();
    }
?>
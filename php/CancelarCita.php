<?php
    session_start();
    $id=$_GET["id"];
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
        $sql="DELETE FROM usuarios WHERE idUsuario='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Cita eliminada con éxito');'</script>"; 
            header("Location: ./Dashbord.php");
        } else {
            echo "<script>alert('Error al eliminar la cita, intente de nuevo');'</script>"; 
        }
    }
?>
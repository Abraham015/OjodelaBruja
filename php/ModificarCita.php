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
    $conn->set_charset('utf8');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "<script>alert('No se conecto a la base');'</script>"; 
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/cita.css">
    <link rel="icon" type="image/x-icon" href="../Images/icono.ico">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="../js/cita.js"></script>
    <script>
        $(document).ready(function () {
            var boton_rut;
            boton_rut = $('#Iniciar');
        });
        /*Nos ayuda a colocar que solo se escoja una fecha actual*/
        window.onload = function () {
            var fecha = new Date(); //Fecha actual
            var mes = fecha.getMonth() + 1; //obteniendo mes
            var dia = fecha.getDate(); //obteniendo dia
            var ano = fecha.getFullYear(); //obteniendo año
            if (dia < 10)
                dia = '0' + dia; //agrega cero si el menor de 10
            if (mes < 10)
                mes = '0' + mes //agrega cero si el menor de 10
            document.getElementById('fecha').min = ano + "-" + mes + "-" + dia;
        }
    </script>
    <title>Agendar Cita</title>
</head>

<body style="background-image: url('../images/fondo.jpeg');">
    <nav class="navbar navbar-dark fixed-top nav_index">
    <div class="container-fluid">
            <img src="../Images/logo.png" style="height: 100px; width: 100px;">
            <a href="./CloseSession.php"><button type="button" class="btn btn-danger">Cerrar Sesion</button></a>
        </div>
    </nav>
    <div class="container">
        <?php
            $sql="SELECT * FROM usuarios";
            $resultAll = mysqli_query($conn, "SELECT * FROM usuarios WHERE idUsuario='$id'");
            $mostrar=mysqli_fetch_array($resultAll)
        ?>
        <form action="./UpdateCita.php?id=<?php echo $mostrar['idUsuario'] ?>" method="post" name="formulario" id="formulario" class="formCita">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="Nombre" id="Nombre" value="<?php echo $mostrar['Nombre'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Correo:</label>
                <input type="text" class="form-control" name="Mail" id="Mail" value="<?php echo $mostrar['correo'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Número:</label>
                <input type="text" class="form-control" name="Numero" id="Numero" value="<?php echo $mostrar['numero'] ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha:</label>
                <input type="date" min="" class="form-control" name="fecha" id="fecha" value="<?php echo $mostrar['fechaCita'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Hora:</label>
                <select class="form-select" aria-label="Default select example" id="horario" name="horario">
                    <option selected>Selecciona una hora</option>
                    <option value="1">9:30 am</option>
                    <option value="2">10:30 am</option>
                    <option value="3">11:30 am</option>
                    <option value="4">12:30 pm</option>
                    <option value="5">4:00 pm</option>
                    <option value="6">6:00 pm</option>
                    <option value="7">8:00 pm</option>
                </select>
            </div>
            <button class="btn btn-primary btn-block" id="Iniciar" name="Iniciar" onClick="return confirmar()"
                type="submit">Agendar</button>
        </form>
    </div>
    <footer class="footer_mid">
        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <div>
                        <h3>Logo</h3>
                        <p class="mb-30 footer-desc">Firma del creador</p>
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <h4>Redes Sociales</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a href="https://instagram.com/elojodelabrujatarot?igshid=ZDdkNTZiNTM="
                                    class="text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                    </svg> Instagram</a>
                            </li>
                            <li>
                                <a href="https://m.youtube.com/channel/UCh3v2jxyT3GwbrbHOhXiB9Q"
                                    class="text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                        <path
                                            d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                    </svg> Youtube</a>
                            </li>
                            <li>
                                <a href="http://tiktok.com/@elojodezuh" class="text-decoration-none"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-tiktok" viewBox="0 0 16 16">
                                        <path
                                            d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z" />
                                    </svg> TikTok</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <h4>¿Quieres apoyar mi trabajo?</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a href="https://www.paypal.com/paypalme/ZulayJh" class="text-decoration-none"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-paypal" viewBox="0 0 16 16">
                                        <path
                                            d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z" />
                                    </svg> Paypal</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                </div>
            </div>
    </footer>
</body>

</html>
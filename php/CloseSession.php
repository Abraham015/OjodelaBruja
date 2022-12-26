<?php
session_start();
unset($_SESSION["login"]);
// destroy the session
session_destroy();

header("Location: ../index.html");

?>
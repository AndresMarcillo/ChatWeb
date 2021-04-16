<?php
$conn = mysqli_connect("localhost", "root", "", "chat");
if (!$conn) {
    echo "Error en la Base de Datos!!" . mysqli_connect_error();
}
?>
<?php
    session_start();

    include_once "config.php";
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $contra = mysqli_real_escape_string($conn, $_POST['contra']);

    if(!empty($correo) && !empty($contra)){
        $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '{$correo}' AND password = '{$contra}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $status = "En línea";
            $sql2 = mysqli_query($conn, "UPDATE usuarios SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($sql2){
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "Registro Completado con Éxito!";
            }
        }else{
            echo "Correo o Contraseña incorrectos";
        }
    }else{
        echo "Ingrese sus datos!";
    }
?>
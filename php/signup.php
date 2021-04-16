<?php
    session_start();

    include_once "config.php";
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $contra = mysqli_real_escape_string($conn, $_POST['contra']);

    if (!empty($nombre) && !empty($apellido) && !empty($correo) && !empty($contra)) {
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $sql = mysqli_query($conn, "SELECT email FROM usuarios WHERE email = '{$correo}'");
            if (mysqli_num_rows($sql) > 0) {
                echo "$correo - Este correo ya existe!";
            }else{
                if(isset($_FILES['imagen'])){
                    $img_name = $_FILES['imagen']['name'];
                    $img_type = $_FILES['imagen']['type'];
                    $tmp_name = $_FILES['imagen']['tmp_name'];
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);
                    $extensions = ['png', 'jpeg', 'jpg'];
                    if(in_array($img_ext, $extensions) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "imagenes/".$new_img_name)){
                            $status = "En línea";
                            $random_id = rand(time(), 10000000);
                            $sql2 = mysqli_query($conn, "INSERT INTO usuarios (unique_id, fname, lname, email, password, img, status) VALUES ({$random_id}, '{$nombre}', '{$apellido}', '{$correo}', '{$contra}', '{$new_img_name}', '{$status}')");
                            if($sql2){
                                $sql3 = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '{$correo}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "Registro Completado con Éxito!";
                                }else{
                                    echo "wtf, que pasó aqui compañero :'v";
                                }
                            }else{
                                echo "Algo salió mal! :'v";
                            }
                        }
                        
                    }else{
                        echo "Por favor seleccione una imagen con formato .jpeg, .jpg, .png!";
                    }
                }else{
                    echo "Por favor seleccione una imagen!";
                }
            }
        } else {
            echo "$correo - No es un correo electrónico válido";
        }
    } else {
        echo "Todos los campos son requeridos";
    }
?>
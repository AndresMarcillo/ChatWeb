<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>

<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>
                Aplicación de Chat Web
            </header>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>Nombre</label>
                        <input type="text" name="nombre" placeholder="Ingrese su Nombre" required>
                    </div>
                    <div class="field input">
                        <label>Apellido</label>
                        <input type="text" name="apellido" placeholder="Ingrese su Apellido" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Correo</label>
                    <input type="text" name="correo" placeholder="Ingrese su Correo" required>
                </div>
                <div class="field input">
                    <label>Contraseña</label>
                    <input type="password" name="contra" placeholder="Ingrese una nueva Contraseña" required>
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Seleccione una imagen</label>
                    <input type="file" name="imagen" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Ingresar al chat">
                </div>
            </form>
            <div class="link">¿Ya tienes una cuenta? <a href="login.php">Ingresa ahora</a></div>
        </section>
    </div>

    <script src="javascript/pass-show.hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>

</html>
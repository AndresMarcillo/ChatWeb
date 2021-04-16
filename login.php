<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }
?>

<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>
                Aplicación de Chat Web
            </header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Correo</label>
                    <input type="text" name = "correo" placeholder="Ingrese su Correo">
                </div>
                <div class="field input">
                    <label>Contraseña</label>
                    <input type="password" name = "contra" placeholder="Ingrese su Contraseña">
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Ingresar al chat">
                </div>
            </form>
            <div class="link">¿No tienes una cuenta? <a href="index.php">Registrate ahora</a></div>
        </section>
    </div>
    <script src="javascript/pass-show.hide.js"></script>
    <script src="javascript/login.js"></script>
</body>

</html>
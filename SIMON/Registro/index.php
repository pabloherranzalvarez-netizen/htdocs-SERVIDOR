<?php
session_start();

if (isset($_POST['entrar'])) {
    $_SESSION['usuario'] = $_POST['usuario'];
}
?>

<h2>VAMOS A JUGAR AL SIMÓN!!!</h2>

<form method="POST">
    <label>USUARIO:</label><br>
    <input type="text" name="usuario"><br><br>

    <label>CLAVE:</label><br>
    <input type="password" name="clave"><br><br>

    <button type="submit" name="entrar">Entrar</button>
    <a href="registro.php"><button type="button">Registrarse</button></a>
</form>
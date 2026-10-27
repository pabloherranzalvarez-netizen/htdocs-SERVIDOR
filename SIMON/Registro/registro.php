<?php
session_start();

if (isset($_POST['registro'])) {
    $_SESSION['usuario'] = $_POST['usuario'];
}
?>

<h2>REGISTRO DE NUEVO JUGADOR</h2>

<form method="POST">
    <label>ELIGE TU USUARIO:</label><br>
    <input type="text" name="usuario"><br><br>

    <label>ELIGE TU CLAVE:</label><br>
    <input type="password" name="clave"><br><br>

    <button type="submit" name="registro">Crear cuenta y jugar</button>
    <a href="index.php">Volver al login</a>
</form>
<?php
//Si se envía el formulario, capturamos el color y guardamos la cookie
if (isset($_POST['color'])) {
    $color = $_POST['color'];
    setcookie('color', $color, time() + (86400 * 30), "/");
} else {
    //Si no se ha enviado el formulario, leemos la cookie (o blanco por defecto)
    $color = isset($_COOKIE['color']) ? $_COOKIE['color'] : 'white';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            background-color: <?php echo $color; ?>;
        }
    </style>
</head>
<body>

    <form action="" method="POST">
        <label>Color aplicación</label>
        <select name="color">
            <option value="white"  <?php if ($color == 'white')  echo 'selected'; ?>>Blanco</option>
            <option value="blue"   <?php if ($color == 'blue')   echo 'selected'; ?>>Azul</option>
            <option value="red"    <?php if ($color == 'red')    echo 'selected'; ?>>Rojo</option>
            <option value="green"  <?php if ($color == 'green')  echo 'selected'; ?>>Verde</option>
            <option value="yellow" <?php if ($color == 'yellow') echo 'selected'; ?>>Amarillo</option>
            <option value="orange" <?php if ($color == 'orange') echo 'selected'; ?>>Naranja</option>
            <option value="pink"   <?php if ($color == 'pink')   echo 'selected'; ?>>Rosa</option>
            <option value="purple" <?php if ($color == 'purple') echo 'selected'; ?>>Morado</option>
            <option value="gray"   <?php if ($color == 'gray')   echo 'selected'; ?>>Gris</option>
        </select>
        <br><br>
        <button type="submit">Guardar cookie</button>
    </form>

</body>
</html>
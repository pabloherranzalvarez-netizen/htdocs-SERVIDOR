<?php
if (isset($_POST['num1'])) {
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$resultado = match($_POST['operacion']) {
    '+' => $num1 + $num2,
    '-' => $num1 - $num2,
    'x' => $num1 * $num2,
    '/' => $num1 / $num2,
    default => "Operación no válida"
};
echo "El resultado de la operación es: $resultado";
echo '<br><br><a href="">Volver a la calculadora</a>'; 
echo '<style>form { display: none; }</style>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora</title>
</head>
<body>
<form method="POST" action="">

    <label for="num1">Numero 1:</label>
    <input type="number" name="num1" id="num1" required><br><br>

    <label for="num2">Numero 2:</label>
    <input type="number" name="num2" id="num2" required><br><br>

    <label for="operacion">Operacion:</label>
    <select name="operacion" id="operacion">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="x">x</option>
        <option value="/">/</option>
    </select><br><br>

    <input type="submit" value="Calcular">
</form>
</body>
</html>
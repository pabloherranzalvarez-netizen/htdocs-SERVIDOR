<?php
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
?>
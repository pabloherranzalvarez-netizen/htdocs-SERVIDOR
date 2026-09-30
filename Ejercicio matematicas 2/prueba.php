<?php
//3. Define una función `modificarNotas(array &$notas, float $puntos): void` que modifique POR REFERENCIA el array de notas sumando el bonus indicado a cada elemento.
//4. Comprueba el funcionamiento invocando ambas funciones desde un script de prueba y verifica que el modo estricto lanza un TypeError si se pasa un string.
require 'matematicas.php';

$notas = [6.0, 8.0, 10.0];
modificarNotas($notas, 1.0);
echo "Promedio: " . calcularPromedio($notas) . "\n";
// Esto lanzará un Fatal Error: Uncaught TypeError intencionalmente
modificarNotas($notas, "un punto");
?>
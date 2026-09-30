<?php
// Biblioteca de Funciones Matemáticas con Tipado Estricto (2 Horas). Instrucciones paso a paso: 1. Crea un archivo llamado `matematicas.php` e inicia la primera línea con `declare(strict_types=1);`.
//2. Define una función `calcularPromedio(array $numeros): float` que reciba un array de números float y devuelva la media aritmética.
declare(strict_types=1);
function calcularPromedio(array $numeros): float {
    return array_sum($numeros) / count($numeros);
}
function modificarNotas(array &$notas, float $puntos): void {
    foreach ($notas as &$n) $n += $puntos;
}
?>
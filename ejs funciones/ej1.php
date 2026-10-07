<?php
//Crea una función para resolver la ecuación de segundo grado.
// Esta función recibe los coeficientes de la ecuación y devuelve un array con las soluciones. 
// Si no hay soluciones reales, devuelve FALSE. No puede estar en blanco la salida.
function resolver_ecuacion_segundo_grado($a, $b, $c) {
    $discriminante = $b * $b - 4 * $a * $c;
    if ($discriminante < 0) {
        return FALSE;
    } elseif ($discriminante == 0) {
        $solucion = -$b / (2 * $a);
        return array($solucion);
    } else {
        $solucion1 = (-$b + sqrt($discriminante)) / (2 * $a);
        $solucion2 = (-$b - sqrt($discriminante)) / (2 * $a);
        return array($solucion1, $solucion2);
    }
}

// Definino los coeficientes
$a = 1;
$b = -5;
$c = 6;

$resultado = resolver_ecuacion_segundo_grado($a, $b, $c);

// Compruebo si devolvió FALSE o un array con soluciones
if ($resultado === FALSE) {
    echo "La ecuación no tiene soluciones reales.";
} else {
    echo "Las soluciones de la ecuación son: " . implode(", ", $resultado);
}
?>
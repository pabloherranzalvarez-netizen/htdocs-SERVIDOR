<?php
function filtrar_menores($numeros, $limite) {
    $resultado = array();
    foreach ($numeros as $num) {
        if ($num < $limite) {
            $resultado[] = $num; // Añade el número al nuevo array
        }
    }
    return $resultado;
}

// Prueba
$array_original = array(2, 8, 3, 10, 5, 1);
$filtrados = filtrar_menores($array_original, 5);

echo "Menores que 5: " . implode(", ", $filtrados); // Muestra: 2, 3, 1
?>
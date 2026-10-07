<?php
// Acepta el array $colores que le envíen
function pintarCirculos($colores) {
    foreach ($colores as $color) {
        return $colores;
    }
}

// Envía 4 colores
function jugarFacil() {
    $colores = array("azul", "rojo", "verde", "amarillo");
    pintarCirculos($colores);
}

// Envía 8 colores
function jugarDificil() {
    $colores = array("azul", "rojo", "verde", "amarillo", "naranja", "rosa", "morado", "gris");
    pintarCirculos($colores);
}

// --- PRUEBA ---
jugarFacil(); // Imprimirá 4 círculos
jugarDificil(); // Imprimirá 8 círculos
?>
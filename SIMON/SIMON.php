<style>
  .circulo {
    display: inline-block;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin: 5px;
  }
</style>

<?php
// Acepta el array $colores que le envíen
function pintarCirculos($colores) {
    foreach ($colores as $color) {
        echo "<div class='circulo' style='background-color: $color;'></div>";
    }
    echo "<br>";
}

// Envía 4 colores
function jugarFacil() {
    $colores = array("blue", "red", "green", "yellow");
    pintarCirculos($colores);
}

// Envía 8 colores
function jugarDificil() {
    $colores = array("blue", "red", "green", "yellow", "orange", "pink", "purple", "gray");
    pintarCirculos($colores);
}

// --- PRUEBA ---
jugarFacil(); // Imprimirá 4 círculos
jugarDificil(); // Imprimirá 8 círculos
?>
<style>
  .circulo {
    display: inline-block;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin: 5px;
  }
</style>

<h1>Simón Dice</h1>

<!-- Formulario para elegir dificultad -->
<form method="POST">
  <button type="submit" name="modo" value="facil">Jugar Fácil</button>
  <button type="submit" name="modo" value="dificil">Jugar Difícil</button>
</form>

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

// --- EJECUCIÓN SEGÚN EL BOTÓN PULSADO ---
if (isset($_POST['modo'])) {
    if ($_POST['modo'] == 'facil') {
        jugarFacil();
    } else {
        jugarDificil();
    }
}
?>
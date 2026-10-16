<?php
session_start();

$colores_facil = array("blue", "red", "green", "yellow");
$colores_dificil = array("blue", "red", "green", "yellow", "orange", "pink", "purple", "gray");

// 1. DIFICULTAD Y GENERACIÓN DE COMBINACIÓN
if (isset($_POST['modo'])) {
    $_SESSION['dificultad'] = $_POST['modo'];
    $colores_base = ($_SESSION['dificultad'] == 'facil') ? $colores_facil : $colores_dificil;
    
    $_SESSION['combinacion'] = array();
    $total = count($colores_base);
    for ($i = 0; $i < $total; $i++) {
        $_SESSION['combinacion'][] = $colores_base[array_rand($colores_base)];
    }
    $_SESSION['jugada'] = array();
    $_SESSION['fase'] = 'memorizar';
}

if (isset($_POST['ir_a_pintar'])) {
    $_SESSION['fase'] = 'pintar';
}

if (isset($_POST['color_pulsado'])) {
    if (count($_SESSION['jugada']) < count($_SESSION['combinacion'])) {
        $_SESSION['jugada'][] = $_POST['color_pulsado'];
    }
}

if (isset($_POST['reiniciar'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<style>
  .circulo {
    display: inline-block;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin: 5px;
  }
  .btn-color {
    width: 45px;
    height: 45px;
    border-radius: 5px;
    border: 1px solid #333;
    margin: 3px;
    cursor: pointer;
  }
</style>

<h1>Simón Dice</h1>

<?php
if (!isset($_SESSION['dificultad'])) {
    // SELECCIÓN DE DIFICULTAD
    echo '<form method="POST">
            <button type="submit" name="modo" value="facil">Jugar Fácil</button>
            <button type="submit" name="modo" value="dificil">Jugar Difícil</button>
          </form>';
} 
elseif ($_SESSION['fase'] == 'memorizar') {
    // MOSTRAR COMBINACIÓN PRIMERO
    echo '<h2>Memoriza la combinación:</h2>';
    foreach ($_SESSION['combinacion'] as $color) {
        echo "<div class='circulo' style='background-color: $color;'></div>";
    }
    echo '<br><br>
          <form method="POST">
            <button type="submit" name="ir_a_pintar" value="1">Ahora pintar</button>
          </form>';
} 
elseif ($_SESSION['fase'] == 'pintar') {
    // BOTONES
    $colores_disponibles = ($_SESSION['dificultad'] == 'facil') ? $colores_facil : $colores_dificil;

    echo '<h3>Botones para pintar:</h3><form method="POST">';
    foreach ($colores_disponibles as $color) {
        echo "<button type='submit' name='color_pulsado' value='$color' class='btn-color' style='background-color: $color;'></button>";
    }
    echo '</form>';

    echo '<h3>Círculos:</h3>';
    $total_slots = count($_SESSION['combinacion']);
    $pulsados = count($_SESSION['jugada']);

    for ($i = 0; $i < $total_slots; $i++) {
        if ($i < $pulsados) {
            $col = $_SESSION['jugada'][$i];
        } else {
            $col = "black";
        }
        echo "<div class='circulo' style='background-color: $col;'></div>";
    }
}
?>

<br><hr>
<form method="POST"><button type="submit" name="reiniciar" value="1">Reiniciar</button></form>
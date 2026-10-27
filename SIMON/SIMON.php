<?php
session_start();

$colores_facil = array("blue", "red", "green", "yellow");
$colores_dificil = array("blue", "red", "green", "yellow", "orange", "pink", "purple", "gray");

// 1. LEER COOKIES (o asignamos valores por defecto si no existen)
$num_circulos = isset($_COOKIE['num_circulos']) ? (int)$_COOKIE['num_circulos'] : 4;
$color_fondo  = isset($_COOKIE['color']) ? $_COOKIE['color'] : 'white';

// 2. BOTÓN "GUARDAR COOKIES" (Solo guarda las preferencias sin iniciar juego)
if (isset($_POST['guardar_cookies'])) {
    $num_circulos = (int)$_POST['num_circulos_elegido'];
    $color_fondo  = $_POST['color_fondo_elegido'];

    setcookie('num_circulos', $num_circulos, time() + (86400 * 30), "/");
    setcookie('color', $color_fondo, time() + (86400 * 30), "/");
    
    // Recargamos la página para aplicar los cambios de fondo inmediatamente
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// 3. ELECCIÓN DE MODO Y EMPEZAR JUEGO
if (isset($_POST['modo'])) {
    $_SESSION['dificultad'] = $_POST['modo'];
    
    // Leemos lo que el usuario ha elegido en el formulario
    $num_circulos = (int)$_POST['num_circulos_elegido'];
    $color_fondo  = $_POST['color_fondo_elegido'];
    
    // Guardamos las cookies también al empezar a jugar
    setcookie('num_circulos', $num_circulos, time() + (86400 * 30), "/");
    setcookie('color', $color_fondo, time() + (86400 * 30), "/");

    $_SESSION['num_circulos'] = $num_circulos;
    $colores_base = ($_SESSION['dificultad'] == 'facil') ? $colores_facil : $colores_dificil;
    
    // Generar combinación secreta
    $_SESSION['secreta'] = array();
    for ($i = 0; $i < $num_circulos; $i++) {
        $_SESSION['secreta'][] = $colores_base[array_rand($colores_base)];
    }
    $_SESSION['fase'] = 'memorizar';
}

// 4. IR A PINTAR
if (isset($_POST['ir_a_pintar'])) {
    $_SESSION['fase'] = 'pintar';
    $_SESSION['combinacion'] = array_fill(0, $_SESSION['num_circulos'], "black");
    $_SESSION['pulsaciones'] = 0;
}

// 5. PINTAR (Lógica de la pizarra)
if (isset($_POST['color']) && $_SESSION['pulsaciones'] < $_SESSION['num_circulos']) {
    $_SESSION['combinacion'][$_SESSION['pulsaciones']] = $_POST['color'];
    $_SESSION['pulsaciones']++;
}

// 6. COMPROBAR
if (isset($_POST['comprobar'])) {
    $_SESSION['fase'] = 'resultado';
}

// 7. REINICIAR
if (isset($_POST['reiniciar'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<style>
  body {
    background-color: <?php echo $color_fondo; ?>;
  }
  .circulo {
    display: inline-block;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin: 5px;
    border: 1px solid #333;
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
// FASE 0: Menú principal con el botón de Guardar Cookies
if (!isset($_SESSION['dificultad'])) {
    echo '<form method="POST">
            <label>Nº Círculos: </label>
            <input type="number" name="num_circulos_elegido" value="' . $num_circulos . '" min="2" max="10">
            <br><br>
            
            <label>Color de fondo: </label>
            <select name="color_fondo_elegido">
                <option value="white"' . ($color_fondo == 'white' ? ' selected' : '') . '>Blanco</option>
                <option value="blue"' . ($color_fondo == 'blue' ? ' selected' : '') . '>Azul</option>
                <option value="red"' . ($color_fondo == 'red' ? ' selected' : '') . '>Rojo</option>
                <option value="green"' . ($color_fondo == 'green' ? ' selected' : '') . '>Verde</option>
                <option value="yellow"' . ($color_fondo == 'yellow' ? ' selected' : '') . '>Amarillo</option>
                <option value="orange"' . ($color_fondo == 'orange' ? ' selected' : '') . '>Naranja</option>
                <option value="pink"' . ($color_fondo == 'pink' ? ' selected' : '') . '>Rosa</option>
                <option value="purple"' . ($color_fondo == 'purple' ? ' selected' : '') . '>Morado</option>
                <option value="gray"' . ($color_fondo == 'gray' ? ' selected' : '') . '>Gris</option>
            </select>
            <br><br>
            
            <button type="submit" name="guardar_cookies" value="1">Guardar Cookies</button>
            <br><br>
            <button type="submit" name="modo" value="facil">Jugar Fácil</button>
            <button type="submit" name="modo" value="dificil">Jugar Difícil</button>
          </form>';
} 
// FASE 1: Mostrar combinación para memorizar
elseif ($_SESSION['fase'] == 'memorizar') {
    echo '<h2>Memoriza la combinación:</h2>';
    foreach ($_SESSION['secreta'] as $color) {
        echo "<div class='circulo' style='background-color: $color;'></div>";
    }
    echo '<br><br>
          <form method="POST">
            <button type="submit" name="ir_a_pintar" value="1">Ya la he memorizado</button>
          </form>';
} 
// FASE 2: Pintar círculos
elseif ($_SESSION['fase'] == 'pintar') {
    $colores_disponibles = ($_SESSION['dificultad'] == 'facil') ? $colores_facil : $colores_dificil;
    $juego_lleno = ($_SESSION['pulsaciones'] >= $_SESSION['num_circulos']);

    echo '<h3>Botones para pintar:</h3><form method="POST">';
    foreach ($colores_disponibles as $color) {
        $disabled = $juego_lleno ? 'disabled' : '';
        echo "<button type='submit' name='color' value='$color' class='btn-color' style='background-color: $color;' $disabled></button>";
    }
    echo '</form>';

    echo '<h3>Tus círculos:</h3>';
    foreach ($_SESSION['combinacion'] as $color) {
        echo "<div class='circulo' style='background-color: $color;'></div>";
    }

    echo '<br><br>
          <form method="POST">
            <button type="submit" name="comprobar" value="1">Comprobar</button>
          </form>';
}
// FASE 3: Mostrar resultado
elseif ($_SESSION['fase'] == 'resultado') {
    echo '<h3>Tus círculos:</h3>';
    foreach ($_SESSION['combinacion'] as $color) {
        echo "<div class='circulo' style='background-color: $color;'></div>";
    }

    if ($_SESSION['combinacion'] === $_SESSION['secreta']) {
        echo '<h2 style="color: green;">¡BIEN! Has acertado la combinación.</h2>';
    } else {
        echo '<h2 style="color: red;">¡MAL! La combinación correcta era:</h2>';
        foreach ($_SESSION['secreta'] as $color) {
            echo "<div class='circulo' style='background-color: $color;'></div>";
        }
    }
}

// Botón de reiniciar
if (isset($_SESSION['dificultad'])) {
    echo '<br><hr>
          <form method="POST">
              <button type="submit" name="reiniciar" value="1">Reiniciar Juego</button>
          </form>';
}
?>
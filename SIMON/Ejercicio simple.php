<?php
session_start();

if (!isset($_POST['color'])) {
    $_SESSION['combinacion'] = array("negro", "negro", "negro", "negro");
    $_SESSION['pulsaciones'] = 0;
} else {
    $_SESSION['combinacion'][$_SESSION['pulsaciones']] = $_POST['color'];
    $_SESSION['pulsaciones']++;
}

var_dump($_SESSION['combinacion']);
?>

<form method="POST" action="">
    <button type="submit" name="color" value="rojo" style="background-color: red; color: white; padding: 10px 20px; border: none; cursor: pointer;">
        Rojo
    </button>
    
    <button type="submit" name="color" value="verde" style="background-color: green; color: white; padding: 10px 20px; border: none; cursor: pointer;">
        Verde
    </button>
</form>
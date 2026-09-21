<?php
$dia = 3;

$resultado = match($dia) {
    1 => "Lunes",
    2 => "Martes",
    3 => "Miércoles",
    4 => "Jueves",
    5 => "Viernes",
    6 => "Sábado",
    7 => "Domingo",
    default => "Día no válido"
};

echo "El día de la semana es: $resultado";
?>
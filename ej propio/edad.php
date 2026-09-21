//El programa debe mostrar:

"Eres mayor de edad" si la edad es 18 o más.
"Eres menor de edad" si la edad es menor de 18.

Ejemplo:

$edad = 20;

El resultado debería ser:

Eres mayor de edad
<?php
$edad = 20;
if ($edad >= 18) {
    echo "Eres mayor de edad";
} else {
    echo "Eres menor de edad";
}
?>
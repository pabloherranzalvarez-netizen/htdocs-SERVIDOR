//quiero generar un array multidimensional que se llame animal que tenga 3 posiciones: en la 0, tiene un perro(0) y un gato(1), en el 1 tiene una lombriz(0) y un burroi(1), en el 2 hay un murcielago(0) y un cocodrilo(1). Hay que declarar el array y acto seguido un var.jump para que lo muestre.
<?php
$animal = array(
    array("perro", "gato"),
    array("lombriz", "burro"),
    array("murcielago", "cocodrilo")
);
var_dump($animal);
?>
<!--quiero generar un array multidimensional que se llame animal que tenga 3 posiciones: en la 0, tiene un perro(0) 
y un gato(1), en el 1 tiene una lombriz(0) y un burroi(1), en el 2 hay un murcielago(0) y un cocodrilo(1). 
Hay que declarar el array y acto seguido un var.jump para que lo muestre.-->
<?php
$animal = array(
    array("perro", "gato"),
    array("lombriz", "burro"),
    array("murcielago", "cocodrilo")
);
var_dump($animal);

//ahora tengo que hacer un bucle for para recorrer el array y mostrar los animales que hay en cada posición.
for ($i = 0; $i < count($animal); $i++) {
    for ($j = 0; $j < count($animal[$i]); $j++) {
       echo $animal[$i][$j] . "<br>";
   }
}

//tengo que hacer ese bucle con foreach para recorrer el array y mostrar los animales que hay en cada posición.
foreach ($animal as $posicion => $animales) {
    foreach ($animales as $animal) {
        echo $animal . "<br>";
    }
}

//ahora un array mixto, mismo código que al principio, mostrat un array que tenga 3 posiciones, en la 0, que se llama casa, un perro(0) y un gato(1), en la 1, que se llama granja, una lombriz(0) y un burro(1), en la 2, salvaje un murcielago(0) y un cocodrilo(1).
$animal = array(
    "casa" => array("perro", "gato"),
    "granja" => array("lombriz", "burro"),
    "salvaje" => array("murcielago", "cocodrilo")
);
var_dump($animal);

//ahora tengo que hacer un bucle for simple, no foreach para recorrer el array y mostrar los animales que hay en cada posición.
for ($i = 0; $i < count($animal); $i++) { //solo usar for
    for ($j = 0; $j < count($animales); $j++) {
        echo $animales[$j] . "<br>";
    }
}

//tengo que hacer ese bucle con foreach para recorrer el array y mostrar los animales que hay en cada posición.
foreach ($animal as $ubicacion => $animales) {
    foreach ($animales as $animal) {
        echo $animal . "<br>";
    }
}

//ahora tengo que hacer un array, metiendo a la familia de los Simpsons. En familia, esta los simpsons, en Padre esta Homer, 
// en Madre esta Marge y en Hijos esta otro array con Bart, Lisa y Maggie. Luego hacer un var_dump para mostrar el array.
//Tambien otro array ahí que sea de la familia de los Griffin, en familia esta los Griffin, en Padre esta Peter, en Madre esta Lois y en Hijos esta otro array con Chris, Meg y Stewie. Luego hacer un var_dump para mostrar el array.
$gente = array(
    "Simpsons" => array(
        "Familia" => "Simpsons",
        "Padre" => "Homer",
        "Madre" => "Marge",
        "Hijos" => array("Bart", "Lisa", "Maggie")
    ),
    "Griffin" => array(
        "Familia" => "Griffin",
        "Padre" => "Peter",
        "Madre" => "Lois",
        "Hijos" => array("Chris", "Meg", "Stewie")
    )
);
var_dump($gente);

//ahora recorrer el array con un bucle for y mostrar los nombres de los padres y los hijos de cada familia.
for ($i = 0; $i < count($gente); $i++) {
    $familia = array_keys($gente)[$i];
    echo "Familia: " . $familia . "<br>";
    echo "Padre: " . $gente[$familia]["Padre"] . "<br>";
    echo "Madre: " . $gente[$familia]["Madre"] . "<br>";
    echo "Hijos: <br>";
    for ($j = 0; $j < count($gente[$familia]["Hijos"]); $j++) {
        echo "- " . $gente[$familia]["Hijos"][$j] . "<br>";
    }
    echo "<br>";
}

//ahora hacer un bucle con foreach para recorrer el array y mostrar los nombres de los padres y los hijos de cada familia.
foreach ($gente as $familia => $miembros) {
    echo "Familia: " . $familia . "<br>";
    echo "Padre: " . $miembros["Padre"] . "<br>";
    echo "Madre: " . $miembros["Madre"] . "<br>";
    echo "Hijos: <br>";
    foreach ($miembros["Hijos"] as $hijo) {
        echo "- " . $hijo . "<br>";
    }
    echo "<br>";
}
?>
<?php
//Crea un array multidimensional para poder guardar los componentes de dosfamilias: 
// “Los Simpson” y “Los Griffin” dentro de cada familia ha de constar el padre, la madres y los hijos,
// donde padre, madre e hijos serán los índices y los índices y los nombres serán los valores. 
// Esta estructura se ha de crear en un solo array asociativo de tres dimensiones. 
// Muestra los valores de las dos familias en una lista no numerada.
$familias = array(
    "Los Simpson" => array(
        "padre" => "Homer",
        "madre" => "Marge",
        "hijos" => array("Bart", "Lisa", "Maggie")
    ),
    "Los Griffin" => array(
        "padre" => "Peter",
        "madre" => "Lois",
        "hijos" => array("Chris", "Meg", "Stewie")
    )
);

echo "<ul>";
foreach ($familias as $familia => $miembros) {
    $hijos = $miembros['hijos'];
    $ultimo_hijo = array_pop($hijos);
    $texto_hijos = count($hijos) > 0 ? implode(", ", $hijos) . " y " . $ultimo_hijo : $ultimo_hijo;

    echo "<li>Familia \"$familia\": padre {$miembros['padre']}, madre {$miembros['madre']}, hijos $texto_hijos.</li>";
}
echo "</ul>";
?>
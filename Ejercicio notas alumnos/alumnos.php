<?php
// 1. Array de datos inicial
$alumnos = [
    ['nombre' => 'Ana', 'nota' => 8.5],
    ['nombre' => 'Pedro', 'nota' => 4.0],
    ['nombre' => 'Lucía', 'nota' => 9.2],
    ['nombre' => 'Carlos', 'nota' => 3.5],
    ['nombre' => 'María', 'nota' => 6.8]
];

// 2. Filtrar aprobados (nota >= 5.0)
$aprobados = array_filter($alumnos, fn($alumno) => $alumno['nota'] >= 5.0);

// 3. Ordenar de mayor a menor nota
usort($aprobados, fn($a, $b) => $b['nota'] <=> $a['nota']);

// 4. Sumar notas y calcular promedio
$sumaTotal = array_reduce($alumnos, fn($acc, $alumno) => $acc + $alumno['nota'], 0);
$promedio = $sumaTotal / count($alumnos);
?>

<h2>Ranking de Aprobados</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>Nombre</th>
        <th>Nota</th>
    </tr>
    <?php foreach ($aprobados as $alumno): ?>
        <tr>
            <td><?= $alumno['nombre'] ?></td>
            <td><?= $alumno['nota'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<br>

<h2>Estadísticas Globales</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>Total Alumnos</th>
        <th>Promedio del Grupo</th>
    </tr>
    <tr>
        <td><?= count($alumnos) ?></td>
        <td><?= number_format($promedio, 2) ?></td>
    </tr>
</table>
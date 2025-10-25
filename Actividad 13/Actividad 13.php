<?php

$estudiantes = [
    "Ana"   => rand(50, 100),
    "Luis"  => rand(50, 100),
    "Sofía" => rand(50, 100),
    "Pablo" => rand(50, 100),
    "Diana" => rand(50, 100)
];

$suma_total = array_sum($estudiantes);
$total_alumnos = count($estudiantes);

if ($total_alumnos > 0) {
    $promedioGeneral = $suma_total / $total_alumnos;
} else {
    $promedioGeneral = 0;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }
    </style>
</head>
<body>

    <h1>Resultados de los estudiantes</h1>

    <?php
    foreach ($estudiantes as $nombre => $calificacion) {
      
        echo "<p>Estudiante: $nombre - Calificación: $calificacion - " . ($calificacion >= 70 ? "Aprobado" : "Reprobado") . "</p>";
    }
    

    echo "<br>";
    
    echo "Promedio general del grupo: " . number_format($promedioGeneral, 2);
    
    ?>

</body>
</html>
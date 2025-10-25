<?php

define("NUM_ALUMNOS", 5);

$estudiantes = [
    "Ana"   => rand(50, 100),
    "Luis"  => rand(50, 100),
    "Sofía" => rand(50, 100),
    "Pablo" => rand(50, 100),
    "Diana" => rand(50, 100)
];


echo "Resultados de los estudiantes <br>";

foreach ($estudiantes as $nombre => $calificacion) {
    
    if ($calificacion >= 70) {
        $estado = "Aprobado";
    } else {
        $estado = "Reprobado";
    }
    
    echo "Estudiante: $nombre - Calificación: $calificacion - $estado <br>";
}

echo "<br>";

$suma_total = 0;


foreach ($estudiantes as $nota) {
    $suma_total += $nota; 
}

$total_alumnos = count($estudiantes);

$promedioGeneral = $suma_total / $total_alumnos;

echo "Promedio general del grupo: " . number_format($promedioGeneral, 2);

?>
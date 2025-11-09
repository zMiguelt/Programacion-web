<?php

$resultado_calculo = "";
$mensaje_alerta = "";
$valor_num1 = "";
$valor_num2 = "";
$operacion_seleccionada = "";


if (isset($_POST['calcular'])) {
    
    $valor_num1 = trim($_POST['valor1'] ?? '');
    $valor_num2 = trim($_POST['valor2'] ?? '');
    $operacion_seleccionada = $_POST['operacion'] ?? ''; 

    if (empty($valor_num1) || empty($valor_num2) || empty($operacion_seleccionada)) {
        $mensaje_alerta = "error_vacio"; 
    } else {
        
        if (!is_numeric($valor_num1) || !is_numeric($valor_num2)) {
            $mensaje_alerta = "error_numerico"; 
        } else {
            
            $numero1 = (float)$valor_num1;
            $numero2 = (float)$valor_num2;
            
            switch ($operacion_seleccionada) {
                case 'suma':
                    $resultado = $numero1 + $numero2;
                    break;
                case 'resta':
                    $resultado = $numero1 - $numero2;
                    break;
                case 'multiplicacion':
                    $resultado = $numero1 * $numero2;
                    break;
                case 'division':
                    if ($numero2 == 0) {
                        $mensaje_alerta = "error_cero"; 
                        $resultado = null; 
                    } else {
                        $resultado = $numero1 / $numero2;
                    }
                    break;
                default:
                    $mensaje_alerta = "error_operacion";
                    $resultado = null;
            }

            if (empty($mensaje_alerta) && $resultado !== null) {
                $resultado_calculo = number_format($resultado, 2, '.', ',');
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Web PHP</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h1 class="h4 mb-0">Calculadora Básica en PHP</h1>
                    </div>
                    
                    <div class="card-body">
                        
                        <?php if (!empty($mensaje_alerta_final)): ?>
                            <div class="alert alert-danger" role="alert">
                                ¡Atención! <?= $mensaje_alerta_final ?>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST" action="Actividad_14.php">
                            
                            <div class="mb-3">
                                <label for="valor1" class="form-label">Primer Valor:</label>
                                <input type="text" class="form-control" id="valor1" name="valor1" 
                                       value="<?= htmlspecialchars($valor_num1) ?>" placeholder="Ingrese el primer número" required>
                            </div>

                            <div class="mb-3">
                                <label for="valor2" class="form-label">Segundo Valor:</label>
                                <input type="text" class="form-control" id="valor2" name="valor2" 
                                       value="<?= htmlspecialchars($valor_num2) ?>" placeholder="Ingrese el segundo número" required>
                            </div>

                            <hr>

                            <label class="form-label">Seleccione la Operación:</label>
                            <div class="mb-3 d-flex justify-content-between flex-wrap">
                                <?php
                                $operaciones = [
                                    'suma' => 'Suma (+)',
                                    'resta' => 'Resta (-)',
                                    'multiplicacion' => 'Multiplicación (*)',
                                    'division' => 'División (/)',
                                ];
                                
                                foreach ($operaciones as $valor => $etiqueta) {
                                    $checked = ($operacion_seleccionada == $valor) ? 'checked' : '';
                                    echo "
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='operacion' id='op_{$valor}' value='{$valor}' {$checked} required>
                                        <label class='form-check-label' for='op_{$valor}'>{$etiqueta}</label>
                                    </div>";
                                }
                                ?>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" name="calcular" class="btn btn-success btn-lg">Realizar Cálculo</button>
                            </div>
                        </form>
                        
                    </div>

                    <?php if (!empty($resultado_calculo)): ?>
                        <div class="card-footer bg-success text-white text-center">
                            <p class="h5 mb-1">El resultado es:</p>
                            <p class="h2 mb-0"><?= $resultado_calculo ?></p>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
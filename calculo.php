<?php

// Recoger datos de forma segura
$num1 = htmlspecialchars($_POST['num1'] ?? '');
$num2 = htmlspecialchars($_POST['num2'] ?? '');
$operacion = $_POST['operacion'] ?? '';

// Validar campos vacíos
if ($num1 === '' || ($num2 === '' && $operacion !== 'factorial')) {
    echo "<h3>Error: Debes rellenar los campos necesarios.</h3>";
    echo "<a href='formulario.html'>Volver</a>";
    exit;
}

// Validar que sean numéricos (excepto factorial solo usa num1)
if (!is_numeric($num1) || ($operacion !== 'factorial' && !is_numeric($num2))) {
    echo "<h3>Error: Los valores deben ser numéricos.</h3>";
    echo "<a href='formulario.html'>Volver</a>";
    exit;
}

// Convertir a número
$num1 = (float)$num1;
$num2 = (float)$num2;

// Función factorial
function factorial($n) {
    if ($n < 0) return null;
    if ($n == 0) return 1;
    $resultado = 1;
    for ($i = 1; $i <= $n; $i++) {
        $resultado *= $i;
    }
    return $resultado;
}

// Operaciones
switch ($operacion) {

    case "suma":
        $resultado = $num1 + $num2;
        echo "<h3>Resultado: $resultado</h3>";
        break;

    case "resta":
        $resultado = $num1 - $num2;
        echo "<h3>Resultado: $resultado</h3>";
        break;

    case "multiplicacion":
        $resultado = $num1 * $num2;
        echo "<h3>Resultado: $resultado</h3>";
        break;

    case "division":
        if ($num2 == 0) {
            echo "<h3>Error: No se puede dividir entre 0.</h3>";
        } else {
            $resultado = $num1 / $num2;
            echo "<h3>Resultado: $resultado</h3>";
        }
        break;

    case "potencia":
        $resultado = pow($num1, $num2);
        echo "<h3>Resultado: $resultado</h3>";
        break;

    case "factorial":
        if ($num1 < 0 || floor($num1) != $num1) {
            echo "<h3>Error: El factorial solo se aplica a números enteros positivos.</h3>";
        } else {
            $resultado = factorial($num1);
            echo "<h3>Resultado: $resultado</h3>";
        }
        break;

    case "mayor":
        $resultado = ($num1 > $num2) ? $num1 : $num2;
        echo "<h3>El número mayor es: $resultado</h3>";
        break;

    default:
        echo "<h3>Error: Operación no válida.</h3>";
}

// Volver
echo "<br><a href='formulario.html'>Volver</a>";

?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['operation']) && isset($_POST['num1']) && isset($_POST['num2'])) {
  
  // Obtener los datos del formulario
  $operation = $_POST['operation'];
  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];

  // Verificar que se enviaron todos los parámetros necesarios
  if (isset($operation) && isset($num1) && isset($num2)) {
      include_once('../Models/CalculatorModel.php');
      $resultado = CalculatorModel::calcular($operation, $num1, $num2);

      // Verificar si el resultado es un array
      if (is_array($resultado)) {
          header('Content-Type: application/json');
          // Convertir el array a JSON para imprimirlo
          echo json_encode($resultado);
      } else {
          // Imprimir el resultado directamente
          echo $resultado;
      }
  } else {
      http_response_code(400); // Solicitud incorrecta
      echo json_encode(array("error" => "Parámetros incompletos"));
  }
} else {
  http_response_code(405); // Método no permitido
  echo json_encode(array("error" => "Método no permitido"));
}

?>
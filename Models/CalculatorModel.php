<?php

class CalculatorModel {
    public static function calcular($operation, $num1, $num2) {
        $apiUrl = "http://localhost/calculadora-api/";

        $postData = json_encode(array(
            'operation' => $operation,
            'num1' => $num1,
            'num2' => $num2
        ));

        // Inicializar la sesión cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, true); // Configurar como solicitud POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($postData)
        ));

        // Ejecutar la solicitud cURL
        $response = curl_exec($ch);

        // Verificar si hubo algún error en la solicitud cURL
        if (curl_errno($ch)) {
            return array("error" => "Error al conectar con la API externa");
        }

        // Obtener el código de respuesta HTTP de la API externa
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Cerrar la sesión cURL
        curl_close($ch);

        // Verificar el código de respuesta HTTP de la API externa
        if ($httpCode !== 200) {
            return array("error" => "Error en la Operación");
        }

        // Decodificar la respuesta JSON de la API y devolverla
        return json_decode($response, true);
    }
}
?>

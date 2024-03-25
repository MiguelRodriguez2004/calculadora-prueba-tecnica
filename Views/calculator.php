<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="./Public/css/styles.css">
    <link rel="stylesheet" href="./Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Public/css/sweetalert2.min.css">
    <script src="./Public/js/jquery.js"></script>
    <script src="./Public/js/ajax.js"></script>
    <script src="./Public/js/sweetalert2.min.js"></script>
</head>
<body>

<div id="container-logo">
    <img id="logo" src="./Public/img/logo.png">
    <h1>Calculadora - StrategicoTech</h1>
</div>

    <form method="POST" id="formulario">
        <label for="num1">Número 1:</label>
        <input type="number" id="num1" placeholder="Ingrese el Primer Número" required>
        <br>
        <label for="num2">Número 2:</label>
        <input type="number" id="num2" placeholder="Ingrese el Segundo Número" required>
        <br>
        <label for="operation">Operación:</label>
        <select id="operation" required>
            <option value="" selected disabled>Seleccione su Operación</option>
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
        </select>
        <br>
        <input class="mt-4" type="submit" id="btnEnviar" value="Calcular">
    </form>
    <div id="resultado"></div>
</body>
</html>

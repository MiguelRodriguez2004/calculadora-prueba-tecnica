$(document).ready(function() {
    $('#btnEnviar').click(function(e) {
        e.preventDefault();

        var operation = $('#operation').val();
        var num1 = parseInt($('#num1').val());
        var num2 = parseInt($('#num2').val());

        // Verificar si los campos requeridos están completos y son números
        if (!operation || isNaN(num1) || isNaN(num2)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, complete todos los campos correctamente.'
            }).then(() => {
                location.reload(); // Recargar la página
            });
            return; // Detener el flujo y no enviar la solicitud AJAX
        }

        // Solicitud AJAX si los campos son válidos
        $.ajax({
            type: 'POST',
            url: 'Controllers/CalculatorController.php',
            data: {
                operation: operation,
                num1: num1,
                num2: num2
            },
            success: function(response) {
                if (response.hasOwnProperty('error')) {
                    // Manejar error
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.error
                    }).then(() => {
                        location.reload(); // Recargar la página
                    });
                } else {
                    // Mostrar resultado y recargar la página al aceptar
                    Swal.fire({
                        icon: 'success',
                        title: 'Resultado',
                        text: 'El resultado de la operación es: ' + response.result
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error en la solicitud AJAX.'
                }).then(() => {
                    location.reload(); // Recargar la página
                });
            }
        });
    });
});
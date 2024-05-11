<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Scripts SQL</title>
</head>
<body>

<!-- Botones -->
<button id="btnInsert1">Insertar Alumnos</button>
<button id="btnInsert2">Insertar Academicos</button>
<button id="btnInsert3">Insertar Administrativos</button>

<!-- Contenedor para el script SQL -->
<div id="sqlScriptContainer"></div>

<script>
    // Función para generar scripts de inserción
    function generarScriptInsercion(tabla, valores) {
        return `INSERT INTO ${tabla} (expediente, nombre, apellido1, apellido2, fecha_nacimiento, correo_institucional, contraseña)
            VALUES (${valores});`;
    }

    // Listas de nombres y apellidos
    var nombres = ['José', 'María', 'Juan', 'Guadalupe', 'Francisco', 'Ana', 'Miguel', 'María Guadalupe', 'Jesús', 'Margarita', 'Antonio', 'Rosa', 'Eduardo', 'Laura', 'Carlos', 'Carmen', 'Luis', 'Patricia', 'Roberto', 'Alejandra'];
    var apellidos = ['García', 'Hernández', 'Martínez', 'López', 'González', 'Rodríguez', 'Pérez', 'Sánchez', 'Ramírez', 'Torres', 'Flores', 'Gómez', 'Díaz', 'Vázquez', 'Jiménez', 'Ruiz', 'Morales', 'Silva', 'Ortiz', 'Reyes'];

    // Función para generar expediente
    function generarExpedientealumno(fechaNacimiento) {
        var year = fechaNacimiento.getFullYear() + 18;
        var lastTwoDigitsSum = parseInt(year.toString().substr(-2, 2)[0]) + parseInt(year.toString().substr(-1));
        var randomNumber = Math.floor(Math.random() * 1000000).toString().padStart(6, '0');
        return '2' + year.toString().substr(-2) + lastTwoDigitsSum.toString().padStart(2, '0') + randomNumber;
    }

    function generarFechaAleatoria() {
        var start = new Date('1997-01-01');
        var end = new Date('2003-12-31');
        var randomTime = start.getTime() + Math.random() * (end.getTime() - start.getTime());
        return new Date(randomTime);
    }

    // Event listener para el primer botón
    document.getElementById('btnInsert1').addEventListener('click', function() {
        var nombreAleatorio = nombres[Math.floor(Math.random() * nombres.length)];
        var apellidoAleatorio1 = apellidos[Math.floor(Math.random() * apellidos.length)];
        var apellidoAleatorio2 = apellidos[Math.floor(Math.random() * apellidos.length)]; // Nuevo
        var fechaAleatoria = generarFechaAleatoria();
        var correo = nombreAleatorio.toLowerCase() + '.' + apellidoAleatorio1.toLowerCase() + '@unison.mx';
        var contraseña = nombreAleatorio.toLowerCase() + apellidoAleatorio1.toLowerCase() + '19970101'; // Cambiar esto según tus necesidades
        var expediente = generarExpedientealumno(fechaAleatoria);
        var script = generarScriptInsercion('alumno', "'" + expediente + "', '" + nombreAleatorio + "', '" + apellidoAleatorio1 + "', '" + apellidoAleatorio2 + "', '" + fechaAleatoria.toISOString().slice(0, 10) + "', '" + correo + "', '" + contraseña + "'");
        document.getElementById('sqlScriptContainer').innerText = script;
    });


    // Event listener para el segundo botón
    document.getElementById('btnInsert2').addEventListener('click', function() {
        var nombreAleatorio = nombres[Math.floor(Math.random() * nombres.length)];
        var apellidoAleatorio1 = apellidos[Math.floor(Math.random() * apellidos.length)];
        var apellidoAleatorio2 = apellidos[Math.floor(Math.random() * apellidos.length)];
        var expediente = Math.floor(Math.random() * (35000 - 29000 + 1) + 29000);
        var fechaNacimiento = generarFechaAleatoria();
        var correo = nombreAleatorio.toLowerCase() + '.' + apellidoAleatorio1.toLowerCase() + '@unison.mx';
        var contraseña = nombreAleatorio.toLowerCase() + apellidoAleatorio1.toLowerCase() + '19970101';
        var script = generarScriptInsercion('academicos', `'${expediente}', '${nombreAleatorio}', '${apellidoAleatorio1}', '${apellidoAleatorio2}', '${fechaNacimiento.toISOString().slice(0, 10)}', '${correo}', '${contraseña}'`);
        document.getElementById('sqlScriptContainer').innerText = script;
    });

    // Event listener para el tercer botón
    document.getElementById('btnInsert3').addEventListener('click', function() {
        var nombreAleatorio = nombres[Math.floor(Math.random() * nombres.length)];
        var apellidoAleatorio1 = apellidos[Math.floor(Math.random() * apellidos.length)];
        var apellidoAleatorio2 = apellidos[Math.floor(Math.random() * apellidos.length)];
        var expediente = Math.floor(Math.random() * (35000 - 29000 + 1) + 29000);
        var fechaNacimiento = generarFechaAleatoria();
        var correo = nombreAleatorio.toLowerCase() + '.' + apellidoAleatorio1.toLowerCase() + '@unison.mx';
        var contraseña = nombreAleatorio.toLowerCase() + apellidoAleatorio1.toLowerCase() + '19970101';
        var script = generarScriptInsercion('academicos', `'${expediente}', '${nombreAleatorio}', '${apellidoAleatorio1}', '${apellidoAleatorio2}', '${fechaNacimiento.toISOString().slice(0, 10)}', '${correo}', '${contraseña}'`);
        document.getElementById('sqlScriptContainer').innerText = script;
    });
</script>

</body>
</html>

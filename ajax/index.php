<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>CRUD AJAX</h1>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Genero</th>
        </thead>

        <tbody id="data-empleado">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        </tbody>
        <script>
            let tabla = document.getElementById('data-empleado')
            $.ajax({
                type: "POST",
                url: 'empleados.php',
                data: {
                    tabla: 'employees',
                    operacion: 'get'
                },
            }).done(function(data) {
                console.log(data);
                data = JSON.parse(data);

                data.forEach((item) => {
                    item.gender =
                        item.gender == 'M' ?
                        'MASCULINO' :
                        'FEMENINO';
                    tabla.innerHTML += `
                <tr>
                    <td>${item.first_name}</td>
                    <td>${item.last_name}</td>
                    <td>${item.gender}</td>
                    </tr>`

                })

            })
        </script>
</body>

</html>
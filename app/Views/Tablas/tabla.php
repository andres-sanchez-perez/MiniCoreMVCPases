<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand " href="#">MiniCoreMVC Parqueaderos</a>
            </div>
        </nav>
    </header>
    <div class="container mt-5 justify-content-center ml-3">
        <table class="table table-lg table-light">
            <thead class="thead-light">
                <tr>
                    <th hidden="true">idUsuario</th>
                    <th>idPase</th>
                    <th>idLogicaPase</th>
                    <th>TipoDePase</th>
                    <th>FechaCompra</th>
                    <th>FechaVencimiento</th>
                    <th>SaldoTotal</th>
                    <th>SaldoRestante</th>
                    <th>PasesTotales</th>
                    <th>PasesRestantes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Tablas as $tabla) : ?>
                    <tr id="datosTabla">
                        <td hidden="true"><?= $tabla['idUsuario'] ?></td>
                        <td><?= $tabla['idPase'] ?></td>
                        <td><?= $tabla['idLogicaPase'] ?></td>
                        <td><?= $tabla['TipoDePase'] ?></td>
                        <td><?= $tabla['FechaCompra'] ?></td>
                        <td><?= $tabla['FechaVencimiento'] ?></td>
                        <td><?= $tabla['SaldoTotal'] ?></td>
                        <td><?= $tabla['SaldoRestante'] ?></td>
                        <td><?= $tabla['PasesTotales'] ?></td>
                        <td><?= $tabla['PasesRestantes'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatórios</title>
</head>

<body>
    <div style="width: 20%; float:left">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/car.png'))) }}" width="96" height="96">
    </div>
    <hr>
    <div style="text-align: center;">
        <h2>Relatório de Veículos</h2>
    </div>
    <hr>
    <br>
    <table border="1" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="text-align: center;">
                <th>Placa</th>
                <th>Modelo</th>
                <th>Cor</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr style="text-align: center;">
                    <td>{{ $item['placa'] }}</td>
                    <td>{{ $item['modelo_id'] }}</td>
                    <td>{{ $item['cor_id'] }}</td>
                    <td>{{ $item['estado_id'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Saídas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2 class="mb-4">📦 Relatório de Saídas</h2>

    <table class="table table-striped table-bordered shadow-sm bg-white">
        <thead class="table-dark">
            <tr>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Setor solicitante</th>
                <th>Solicitado por</th>
                <th>Quantidade</th>
                <th>Data</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($saidas as $saida)
                <tr>
                    <td>{{ $saida->nome }}</td>
                    <td>{{ $saida->categoria }}</td>
                    <td>{{ $saida->setor }}</td>
                    <td>{{ $saida->responsavel ?? 'Não informado' }}</td>
                    <td>{{ $saida->quantidade }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($saida->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>
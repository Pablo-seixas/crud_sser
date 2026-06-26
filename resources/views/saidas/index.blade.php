<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Saídas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h1>Relatório de Saídas</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('saidas.create') }}" class="btn btn-success mb-3">Nova Saída</a>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Voltar</a>

    <!-- RESUMO -->
    <div class="alert alert-info">
        Total de saídas: {{ $saidas->count() }}
    </div>

    <!-- TABELA -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Produto</th>
                <th>Setor</th>
                <th>Quantidade</th>
                <th>Data</th>
            </tr>
        </thead>

        <tbody>
        @foreach($saidas as $saida)
            <tr>
                <td>{{ $saida->produto->nome ?? 'N/A' }}</td>
                <td>{{ $saida->setor }}</td>
                <td>{{ $saida->quantidade }}</td>
                <td>{{ $saida->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

</body>
</html>
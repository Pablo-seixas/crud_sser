<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-4">

    <h1>Dashboard de Estoque</h1>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card card-body">
                <h5>Total de produtos</h5>
                <h2>{{ $totalProdutos }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-body">
                <h5>Total em estoque</h5>
                <h2>{{ $totalQuantidade }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-body">
                <h5>Estoque baixo</h5>
                <h2 class="{{ $estoqueBaixo > 0 ? 'text-danger' : 'text-success' }}">
                    {{ $estoqueBaixo }}
                </h2>
            </div>
        </div>
    </div>

    <div class="mt-4 d-flex gap-2">

        <a href="{{ route('produtos.index') }}" class="btn btn-primary">
            📦 Ver produtos
        </a>

        <a href="{{ url('/relatorio') }}" class="btn btn-dark">
            📊 Relatórios
        </a>

        <a href="{{ url('/relatorio/saidas') }}" class="btn btn-danger">
            📤 Saídas
        </a>

        <a href="{{ url('/relatorio/entradas') }}" class="btn btn-success">
            📥 Entradas
        </a>

    </div>

</div>
</body>
</html>
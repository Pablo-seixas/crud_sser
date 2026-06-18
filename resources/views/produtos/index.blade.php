<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos - Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-4">

    <h1>Produtos</h1>

	<div class="alert alert-info">
    Total encontrado: {{ $produtos->count() }}
</div>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Dashboard</a>
    <a href="{{ route('produtos.create') }}" class="btn btn-success mb-3">Novo produto</a>

    <form method="GET" class="d-flex mb-3">
        <input name="busca"
               class="form-control me-2"
               placeholder="Buscar por nome ou c digo"
               value="{{ $busca }}">
        <button class="btn btn-primary">Buscar</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Quantidade</th>
                <th>Minimo</th>
                <th>Status</th>
                <th>Acaoes</th>
            </tr>
        </thead>

        <tbody>
        @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->codigo }}</td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->categoria->nome }}</td>
                <td>{{ $produto->quantidade }}</td>
                <td>{{ $produto->estoque_minimo }}</td>

                <td>
                    <span class="{{ $produto->quantidade <= $produto->estoque_minimo ? 'text-danger' : 'text-success' }}">
                        {{ $produto->status() }}
                    </span>
                </td>

                <td>
                    <a href="{{ route('produtos.edit', $produto) }}"
                       class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <form action="{{ route('produtos.destroy', $produto) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Excluir produto?')">
                            Excluir
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>

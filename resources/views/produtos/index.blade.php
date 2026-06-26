<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos - Estoque</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
```

</head>

<body class="bg-light">

<div class="container mt-4">

```
<h1>Produtos</h1>

<div class="alert alert-info">
    Total encontrado: {{ $produtos->count() }}
</div>

<a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">
    Dashboard
</a>

<a href="{{ route('produtos.create') }}" class="btn btn-success mb-3">
    Novo Produto
</a>

<button id="btnEditarTabela" class="btn btn-primary mb-3">
    Ativar Edição
</button>

<form method="GET" class="d-flex mb-3">
    <input
        name="busca"
        class="form-control me-2"
        placeholder="Buscar por nome ou código"
        value="{{ $busca }}"
    >

    <button class="btn btn-primary">
        Buscar
    </button>
</form>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-striped">

    <thead class="table-dark">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Quantidade</th>
            <th>Mínimo</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>

    @foreach($produtos as $produto)

        <tr>

            <td>
                <input
                    type="text"
                    value="{{ $produto->codigo }}"
                    class="form-control editavel"
                    disabled
                >
            </td>

            <td>
                <input
                    type="text"
                    value="{{ $produto->nome }}"
                    class="form-control editavel"
                    disabled
                >
            </td>

            <td>
                {{ $produto->categoria->nome }}
            </td>

            <td>
                <input
                    type="number"
                    value="{{ $produto->quantidade }}"
                    class="form-control editavel"
                    disabled
                >
            </td>

            <td>
                <input
                    type="number"
                    value="{{ $produto->estoque_minimo }}"
                    class="form-control editavel"
                    disabled
                >
            </td>

            <td>
                <span class="{{ $produto->quantidade <= $produto->estoque_minimo ? 'text-danger' : 'text-success' }}">
                    {{ $produto->status() }}
                </span>
            </td>

            <td>

                <a
                    href="{{ route('produtos.edit', $produto) }}"
                    class="btn btn-warning btn-sm">
                    Editar
                </a>

                <form
                    action="{{ route('produtos.destroy', $produto) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Excluir produto?')">

                        Excluir

                    </button>

                </form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>
```

</div>

<script>

let modoEdicao = false;

document.getElementById('btnEditarTabela').addEventListener('click', function () {

    modoEdicao = !modoEdicao;

    document.querySelectorAll('.editavel').forEach(function (campo) {
        campo.disabled = !modoEdicao;
    });

    this.textContent = modoEdicao
        ? 'Bloquear Edição'
        : 'Ativar Edição';

});

</script>

</body>
</html>

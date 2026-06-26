<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Saída</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h1>Registrar Saída</h1>

    <form method="POST" action="{{ route('saidas.store') }}">
        @csrf

        <div class="mb-3">
            <label>Produto</label>
            <select name="produto_id" class="form-control">
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Setor</label>
            <input type="text" name="setor" class="form-control">
        </div>

        <div class="mb-3">
            <label>Quantidade</label>
            <input type="number" name="quantidade" class="form-control">
        </div>

        <button class="btn btn-primary">Salvar Saída</button>
    </form>

</div>

</body>
</html>
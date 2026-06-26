<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Acesso</title>

<style>
body{
    background:#ff66aa;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    font-family:Arial;
}

.box{
    background:white;
    padding:30px;
    border-radius:10px;
    text-align:center;
    width:300px;
}

input{
    width:100%;
    padding:10px;
    margin-top:10px;
}

button{
    width:100%;
    padding:10px;
    margin-top:10px;
}
</style>

</head>
<body>

<div class="box">

<h2>Sistema de Estoque</h2>

@if(session('erro'))
<div style="color:red">
{{ session('erro') }}
</div>
@endif

<form method="POST" action="/acesso">
@csrf

<input
type="password"
name="codigo"
placeholder="Digite o código">

<button type="submit">
Entrar
</button>

</form>

</div>

</body>
</html>
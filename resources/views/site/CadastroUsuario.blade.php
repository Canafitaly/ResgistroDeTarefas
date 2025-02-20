<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <header>
        <h1>Cadastro de Usuário</h1>
    </header>
    <main>
        <form action={{route('salva')}} method="post">
            @csrf
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
            <button type="submit">Cadastrar</button>
        </form>

        <a href={{route('log')}}>Já tenho cadastro</a>
    </main>
</body>
</html>
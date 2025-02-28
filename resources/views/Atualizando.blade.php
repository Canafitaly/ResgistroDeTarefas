<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nova Tarefa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
      {{-- laço superior --}}
      <nav>
        <div class="nav-wrapper">
          <a href="#" class="brand-logo"></a>
          {{-- botão nova  tarefa --}}
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{route('padaria.index')}}">Voltar</a></li>
          </ul>
        </div>
    </nav>

    {{-- Formulario --}}
    <div class="container">
        <h3 class="center-align">Atualizar</h3>
        <form action="{{ route('padaria.update', $tarefa->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{--coluna --}}
            <div class="input-field">
                <input type="text" name="titulo" id="titulo" value="{{$tarefa->titulo}}" required>
                <label for="titulo">Título</label>
            </div>
            <div class="input-field">
                <input type="text" name="descricao" id="descricao" value="{{$tarefa->descricao}}" required>
                <label for="descricao">Descrição</label>
            </div>
            <div class="input-field">
                <input type="text" name="status" id="status" value="{{$tarefa->status}}" required>
                <label for="data_limite">Status</label>
            </div>
            <div class="input-field">
                <input type="date" name="data_limite" id="data_limite" value="{{$tarefa->data_limite}}" required>
                <label for="data_limite">Data_limite</label>
            </div>
            <div class="input-field">
                <input type="text" name="categoria_nome" id="categoria_nome" value="{{$tarefa->categoria->categoria}}" required>
                <label for="categoria_nome">Cateogria</label>
            </div>
            <div class="input-field">
                <input type="text" name="prioridade_nome" id="prioridade_nome" value="{{$tarefa->prioridade->prioridade}}" required>
                <label for="prioridade_nome">Prioridade</label>
            </div>
            <button type="submit" class="btn">Salvar</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>
</html>
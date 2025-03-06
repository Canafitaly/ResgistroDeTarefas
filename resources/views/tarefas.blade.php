<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarefa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
    {{-- laço superior --}}
    <nav>
        <div class="nav-wrapper">
          <a href="#" class="brand-logo"></a>
          {{-- botão nova  tarefa --}}
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{route('padaria.create')}}">Nova-Tarefa?</a></li>
          </ul>
        </div>
    </nav>
    {{-- barra de pesquisa --}}
    <div class="container">
        <form action="{{route('padaria.show','search')}}" method="get">
            <div class="input-field">
                <input type="text" name="search" id="search" value="{{ request()->query('search')}}">
                <label for="search">Pesquisar Tarefas</label>
            </div>
            <button type="submit" class="btn">Pesquisar</button>
        </form>
    </div>

    {{-- tabela --}}
    <div class="container">
        <h3 class="center-align">Lista de Tarefas({{$tarefas->count()}})</h3>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Status</th>
                    <th>Categoria</th>
                    <th>Prioridade</th>
                    <th>Data Limite</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarefas as $tarefa)
                    <tr>
                        <td>{{ $tarefa->titulo }}</td>
                        <td>{{ $tarefa->status }}</td>
                        <td>{{ $tarefa->categoria->categoria }}</td>
                        <td>{{ $tarefa->prioridade->prioridade }}</td>
                        <td>{{ $tarefa->data_limite }}</td>
                        <td>{{ $tarefa->descricao }}</td>
                        <td>
                            {{-- botão delete --}}
                            <form action="{{ route('padaria.destroy', $tarefa->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn red">Delete</button>
                              </form>
                        </td>
                        {{-- botão atualizar --}}
                        <td>
                            <form action="{{ route('padaria.edit', $tarefa->id) }}" method="post">
                            @csrf
                            @method('GET')
                            <button type="submit" class=" btn btn-danger btn-sm">Atualizar</button>
                           </form> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    {{-- Ação --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    if('{{Session::has('success')}}'){
    Swal.fire({
        title: ' {{Session::get('success.msg')}} ',
        icon: "success",
        draggable: true,     
        timer: 1750,
    })
}
</script>

</body>
</html>
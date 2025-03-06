<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <form class="center" action="{{ route('padaria.index') }}" method="post">
        @csrf
        @method('GET')
        <button type="submit" class=" btn btn-danger btn-sm">Ir para Pagina principal</button>
    </form> 
</x-app-layout>
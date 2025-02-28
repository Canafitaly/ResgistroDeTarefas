<x-app-layout>
    <form action="{{ route('padaria.index') }}" method="post">
        @csrf
        @method('GET')
        <button type="submit" class=" btn btn-danger btn-sm">Ir para Pagina principal</button>
    </form> 
</x-app-layout>
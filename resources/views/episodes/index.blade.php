<x-layout title="Episódios - Temporada {{ $season->number }}" :success-message="$successMessage">
    <form method="post">
        @csrf
        @method('PUT')
        <ul class="list-group">

            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episode->number }}
                    <input type="checkbox" 
                    name="episodes[]" 
                    value="{{ $episode->id }}" 
                    {{ $episode->watched ? 'checked' : '' }}>
                </li>
            @endforeach

        </ul>
        
        <button class="btn-primary mt-2 mb-2">Salvar</button>

    </form>
</x-layout>

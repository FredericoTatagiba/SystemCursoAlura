<x-layout title="Séries" :success-message="$successMessage">
    @auth
        <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth
    <ul class="list-group">
        @foreach ($series as $series)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('storage/' . $series->cover) }}" width="75px" class="img-thumbnail me-3"
                        alt="">
                    @auth <a href="{{ route('seasons.index', $series->id) }}"> @endauth
                        {{ $series->name }}
                        @auth </a> @endauth
                </div>
                @auth
                    <span class="d-flex">
                        <a href="{{ route('series.edit', $series->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('series.destroy', $series->id) }}" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </span>
                @endauth

            </li>
        @endforeach
    </ul>
</x-layout>

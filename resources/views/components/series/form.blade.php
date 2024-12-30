<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    @csrf
    @if ($update)
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $name ?? '') }}">
        </div>
    @endif
    @if (!$update)
        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" autofocus id="name" name="name" class="form-control"
                    value="{{ old('name', $name ?? '') }}">
            </div>

            <div class="col-2">
                <label for="seasonsQuantity" class="form-label">Nº de Temporadas:</label>
                <input type="text" id="seasonsQuantity" name="seasonsQuantity" class="form-control"
                    value="{{ old('name', $name ?? '') }}">
            </div>

            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Episódios por temporada:</label>
                <input type="text" id="episodesPerSeason" name="episodesPerSeason" class="form-control"
                    value="{{ old('name', $name ?? '') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="cover" class="form-label">Capa</label>
                <input type="file" id="cover" name="cover" class="form-control"
                    accept="image/png, image/gif, image/jpeg">
            </div>
        </div>
    @endif



    <button type="submit" class="btn btn-primary">
        {{ $update ? 'Alterar' : 'Adicionar' }}
    </button>
</form>

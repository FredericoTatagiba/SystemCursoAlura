@component('mail::message')
# {{ $nameSeries }} foi criada

- {{ $seasonsQty }} Temporadas
- {{ $episodesPerSeason }} episódios por temporada

@component('mail::button', ['url' => route('seasons.index', $seriesId)])

Ver série
    
@endcomponent
@endcomponent
<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepositoryInterface
{
    public function add(SeriesFormRequest $request): Series{
        
        return DB::transaction(function () use ($request){
            $series = Series::create($request->all());
        
            $seasons = [];
            $episodes = [];

            for($i=1; $i <= $request->seasonsQuantity; $i++){
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i
                ];
            }
            Season::insert($seasons);

            foreach($series->seasons as $season){
                for($j=1; $j <= $request->episodesPerSeason; $j++){
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number'=> $j,
                    ];
                }
            }
            Episode::insert($episodes);

            return $series;
        });
    }
}
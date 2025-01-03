<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Series;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepositoryInterface $seriesRepository){

    }
    
    public function index(Request $request){
        if ($request->has("name")){
            return Series::whereName($request->name)->get();
        }

        return Series::paginate(5);
        
    }

    public function store(SeriesFormRequest $request){
        return response()
            ->json($this->seriesRepository->add($request), 201);
    }
    
    public function show(Series $series){
        return $series;
    }

    public function update(SeriesFormRequest $request, Series $series){
        $series->update($request->all());
        return $series;
    }

    public function destroy(int $series){
        Series::destroy($series);
        return response()->noContent();
    }
}

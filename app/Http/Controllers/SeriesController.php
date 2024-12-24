<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepositoryInterface as SeriesRepository;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository){

    }

    public function index(Request $request)
    {
        $series = Series::all();
        $successMessage = $request->session()->get('message.success');
        $failedMessage = $request->session()->get('message.failed');

        return view('series.index')
            ->with('series', $series)
            ->with('successMessage', $successMessage)
            ->with('failedMessage', $failedMessage);
    }

    public function create(Request $request){
        return view('series.create');
    }

    public function edit(Series $series, Request $request){
        

        return view('series.edit', [
            'series' => $series,
        ]);
    }

    public function store(SeriesFormRequest $request){

        $series = $this->repository->add($request);
        return to_route('series.index')
            ->with('message.success',"Série '{$series->name}' adicionada com sucesso");
    }

    public function destroy(Series $series, Request $request){
        
        // Series::find($request->series)->delete();
        $series->delete();

        return to_route('series.index')
        ->with('message.success', "Série '{$series->name}' removida com sucesso");
    }

    public function update(SeriesFormRequest $request){
        $series = Series::find($request->series);
        if($series->update($request->all()) ){

            return to_route('series.index')
            ->with('message.success', "Série '{$series->name}' alterado com sucesso");
        
        } else{
            return to_route('series.edit', $series)
                ->with('message.failed', "Erro ao atualizar nome da série '{$series->name}'");

        }

    }
}

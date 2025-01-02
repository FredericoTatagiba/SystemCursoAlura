<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season){
        return view('episodes.index', [
            'episodes' => $season->episodes, 
            'season' => $season,
            'successMessage' => session('message.success'),
        ]);
    }

    public function watched(Request $request, Season $season){
        $watched = $request->episodes;
        $season->episodes->each(function (Episode $episode) use ($watched) {
            $episode->watched = in_array($episode->id, $watched);
        });

        $season->push();
        return to_route(
            'episodes.index',['season' => $season->id])
            ->with('message.success','Episódios marcados como assistidos');
    }
}

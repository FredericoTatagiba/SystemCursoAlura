<?php

namespace App\Http\Controllers\Web;

use App\Models\Series;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index(Series $series){
        $seasons = $series->seasons()->with('episodes')->get();
        return view('seasons.index')
            ->with('seasons', $seasons)
            ->with('series', $series);
    }
}

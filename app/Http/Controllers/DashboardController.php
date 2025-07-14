<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\Building;
use App\Models\Landmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

    $buildingsCount = Building::count();
    $landsCount = Land::count();
    $landmarksCount = Landmark::count();

        return view('dashboard',
        compact('buildingsCount','landsCount','landmarksCount'));
    }
}

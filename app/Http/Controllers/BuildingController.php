<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Models\BuildingDetail;
use Illuminate\Support\Facades\DB;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::with(['details', 'land'])->get();

        // حساب الإحصائيات المطلوبة
        $highBuildingsCount = Building::whereHas('details', function($query) {
            $query->where('floors', '>', 5);
        })->count();

        $totalArea = BuildingDetail::sum('area');

        return view('buildings.index', compact('buildings', 'highBuildingsCount', 'totalArea'));
    }

    public function create()
    {
        $lands = Land::all();
        return view('buildings.create', compact('lands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'land_id' => 'required|exists:lands,id',
            'floors' => 'required|integer|min:1',
            'area' => 'required|numeric|min:0',
            'purpose' => 'nullable',
            'description' => 'nullable',
        ]);

        DB::transaction(function () use ($validated) {
            $building = Building::create([
                'name' => $validated['name'],
                'latitude' => $validated['latitude'],
                'longitude' => $validated['longitude'],
                'land_id' => $validated['land_id'],
            ]);

            BuildingDetail::create([
                'building_id' => $building->id,
                'floors' => $validated['floors'],
                'area' => $validated['area'],
                'purpose' => $validated['purpose'] ?? null,
                'description' => $validated['description'] ?? null,
            ]);
        });

        return redirect()->route('buildings.index')->with('success', 'تم إضافة المبنى بنجاح');
    }

    public function destroy(Building $building)
    {
        DB::transaction(function () use ($building) {
            $building->details()->delete();
            $building->delete();
        });

        return redirect()->route('buildings.index')->with('success', 'تم حذف المبنى بنجاح');
    }
}

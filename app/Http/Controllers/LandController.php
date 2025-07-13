<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandController extends Controller
{
    public function index()
    {
        $lands = Land::withCount('buildings')->get();
        return view('lands.index', compact('lands'));
    }

    public function create()
    {
        return view('lands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:lands',
            'area' => 'required|numeric|min:0',
            'type' => 'required',
        ]);

        Land::create($request->all());

        return redirect()->route('lands.index')->with('success', 'تم إضافة الأرض بنجاح');
    }

    public function edit(Land $land)
    {
        return view('lands.edit', compact('land'));
    }

    public function update(Request $request, Land $land)
    {
        $request->validate([
            'code' => 'required|unique:lands,code,'.$land->id,
            'area' => 'required|numeric|min:0',
            'type' => 'required',
        ]);

        $land->update($request->all());

        return redirect()->route('lands.index')->with('success', 'تم تحديث الأرض بنجاح');
    }

    public function destroy(Land $land)
    {
        $land->delete();
        return redirect()->route('lands.index')->with('success', 'تم حذف الأرض بنجاح');
    }

    public function showBuildings(Land $land)
    {
        $buildings = $land->buildings()->with('details')->get();
        return view('lands.buildings', compact('land', 'buildings'));
    }
}

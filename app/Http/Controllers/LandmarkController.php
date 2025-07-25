<?php

namespace App\Http\Controllers;

use App\Models\Landmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandmarkController extends Controller
{
    public function index()
    {
        $landmarks = Landmark::all();
        return view('landmarks.index', compact('landmarks'));
    }

    public function create()
    {
        return view('landmarks.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'type' => 'required|string',
        'description' => 'nullable|string',
    ]);

    Landmark::create([
        'name' => $request->name,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'type' => $request->type,
        'description' => $request->description,
    ]);

    return redirect()->route('landmarks.index')->with('success', 'تمت إضافة المعلم بنجاح');
}


    

    public function edit(Landmark $landmark)
    {
        return view('landmarks.edit', compact('landmark'));
    }

    public function update(Request $request, Landmark $landmark)
    {
        $request->validate([
            'name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'type' => 'required',
        ]);

        $landmark->update([
            'name' => $request->name,
            'location' => $request->latitude . ', ' . $request->longitude,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return redirect()->route('landmarks.index')->with('success', 'تم تحديث المعلم بنجاح');
    }

    public function destroy(Landmark $landmark)
    {
        $landmark->delete();
        return redirect()->route('landmarks.index')->with('success', 'تم حذف المعلم بنجاح');
    }
}

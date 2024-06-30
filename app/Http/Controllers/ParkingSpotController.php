<?php
namespace App\Http\Controllers;

use App\Models\ParkingSpot;
use Illuminate\Http\Request;

class ParkingSpotController extends Controller
{
    public function index()
    {
        $parkingSpots = ParkingSpot::all();
        return view('parking_spots.index', compact('parkingSpots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'spot_number' => 'required|unique:parking_spots',
        ]);

        ParkingSpot::create($request->all());

        return redirect()->route('parking-spots.index')->with('success', 'Vaga criada com sucesso.');
    }

    public function availableSpots()
    {
        $availableSpots = ParkingSpot::where('is_occupied', false)->get();
        return view('parking_usages.entry', compact('availableSpots'));
    }
}

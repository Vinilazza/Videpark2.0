<?php
namespace App\Http\Controllers;

use App\Models\ParkingUsage;
use App\Models\ParkingSpot;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParkingUsageController extends Controller
{
    public function showEntryForm()
    {
        $availableSpots = ParkingSpot::where('is_occupied', false)->get();
        $plans = Plan::all(); // Buscar todos os planos disponíveis
        return view('parking_usages.entry', compact('availableSpots', 'plans'));
    }

    public function registerEntry(Request $request)
{
    $request->validate([
        'parking_spot_id' => 'required|exists:parking_spots,id',
        'plan_id' => 'required|exists:plans,id',
    ]);

    // Obter o ID do usuário autenticado
    $userId = Auth::id();

    $parkingUsage = ParkingUsage::create([
        'user_id' => $userId,
        'parking_spot_id' => $request->parking_spot_id,
        'plan_id' => $request->plan_id,
        'entry_time' => now(),
    ]);

    // Marcar a vaga como ocupada
    $parkingSpot = ParkingSpot::find($request->parking_spot_id);
    $parkingSpot->is_occupied = true;
    $parkingSpot->save();

    return redirect()->route('parking-usage.entry')->with('success', 'Entrada registrada com sucesso.');
}

public function registerExit($id)
{
    $parkingUsage = ParkingUsage::find($id);

    if (!$parkingUsage || $parkingUsage->exit_time !== null) {
        return redirect()->back()->with('error', 'Uso inválido ou saída já registrada.');
    }

    $parkingUsage->exit_time = now();
    $parkingUsage->save();

    $parkingSpot = ParkingSpot::find($parkingUsage->parking_spot_id);
    $parkingSpot->is_occupied = false; // Marcar a vaga como não ocupada
    $parkingSpot->save();

    return redirect()->route('parking-usage.entry')->with('success', 'Saída registrada com sucesso.');
}



}

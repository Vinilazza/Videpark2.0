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
        $plans = Plan::all();
        $parkingSpots = ParkingSpot::all(); // Adicione essa linha para buscar todas as vagas
    
        return view('parking_usages.entry', compact('availableSpots', 'plans', 'parkingSpots'));
    }
    
    public function registerEntry(Request $request)
    {
        $request->validate([
            'parking_spot_id' => 'required|exists:parking_spots,id',
            'plan_id' => 'required|exists:plans,id',
        ]);

        $parkingSpot = ParkingSpot::find($request->parking_spot_id);
        if ($parkingSpot->is_occupied) {
            return redirect()->back()->with('error', 'Vaga já ocupada');
        }

        ParkingUsage::create([
            'user_id' => Auth::id(),
            'parking_spot_id' => $request->parking_spot_id,
            'plan_id' => $request->plan_id,
            'entry_time' => now(),
        ]);

        $parkingSpot->is_occupied = true;
        $parkingSpot->save();

        return redirect()->route('parking-usage.entry')->with('success', 'Entrada registrada com sucesso.');
    }
    public function registerExit($id)
    {
        $parkingUsage = ParkingUsage::findOrFail($id);

        // Verificar se o $parkingUsage existe
        if ($parkingUsage) {
            // Obter os dados necessários antes de remover
            $entryTime = $parkingUsage->entry_time;
            $exitTime = now(); // Registrar o horário de saída como o momento atual

            // Calcular receita se necessário
            if ($entryTime && $exitTime) {
                // Calcular a receita com base no plano associado ao $parkingUsage
                $plan = $parkingUsage->plan;
                if ($plan) {
                    $entry = new \DateTime($entryTime);
                    $exit = new \DateTime($exitTime);
                    $durationInMinutes = $entry->diff($exit)->i;
                    $hours = $durationInMinutes / 60;
                    $revenue = $plan->price * $hours;

                    // Exemplo de uso:
                    // Log::info("Receita gerada ao registrar saída: R$ " . number_format($revenue, 2));

                    // Passar os dados para o relatório
                    // Redirecionar para o relatório com os dados necessários
                    return redirect()->route('reports.financial', compact('revenue'))->with('success', 'Saída registrada com sucesso.');
                }
            }

            // Atualizar is_occupied para false
            $parkingSpot = $parkingUsage->parkingSpot;
            if ($parkingSpot) {
                $parkingSpot->is_occupied = false;
                $parkingSpot->save();
            }

            // Prosseguir com a remoção
            $parkingUsage->exit_time = $exitTime;
            $parkingUsage->save();

            // Retornar uma resposta de sucesso ou redirecionar para outra página
            return redirect()->route('parking-usage.entry')->with('success', 'Saída registrada com sucesso.');
        } else {
            // Se $parkingUsage não existir
            return redirect()->route('parking-usage.entry')->with('error', 'Registro de uso não encontrado.');
        }
    }


}


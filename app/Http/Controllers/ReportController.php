<?php
namespace App\Http\Controllers;

use App\Models\ParkingUsage;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function financialReport(Request $request)
    {
        if ($request->has('from') && $request->has('to')) {
            $from = $request->query('from');
            $to = $request->query('to');

            $usages = ParkingUsage::whereBetween('entry_time', [$from, $to])->get();

            // Calcula a receita total somando o preço do plano multiplicado pela duração de cada uso
            $totalRevenue = $usages->sum(function ($usage) {
                $entryTime = $usage->entry_time;
                $exitTime = $usage->exit_time ?? now(); // Se não houver hora de saída, assume agora

                // Calcula a diferença em horas entre a entrada e a saída
                $durationHours = $exitTime->diffInHours($entryTime);

                // Calcula a receita baseada no preço do plano e na duração em horas
                return $usage->plan->price * $durationHours;
            });

            return view('reports.financial', compact('totalRevenue'));
        }

        return view('reports.financial');
    }
}

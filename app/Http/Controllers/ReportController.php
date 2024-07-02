<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingUsage;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function financialReport()
    {
        // Buscar todas as utilizações de estacionamento com seus planos
        $usages = ParkingUsage::with('plan')->get();

        // Calcular o tempo e o valor para cada utilização
        $report = $usages->map(function ($usage) {
            $entryTime = Carbon::parse($usage->entry_time);
            $exitTime = Carbon::parse($usage->exit_time);
            $durationMinutes = $entryTime->diffInMinutes($exitTime);
            
            $plan = $usage->plan;
            $ratePerHour = $plan->rate_per_hour;
            $ratePerMinute = $ratePerHour / 60;

            if ($durationMinutes > 60) {
                $cost = $ratePerHour;
            } else {
                $cost = $durationMinutes * $ratePerMinute;
            }

            return [
                'user_id' => $usage->user_id,
                'plan' => $plan->name,
                'entry_time' => $usage->entry_time,
                'exit_time' => $usage->exit_time,
                'duration_minutes' => $durationMinutes,
                'cost' => number_format($cost, 2)
            ];
        });

        return view('report', ['report' => $report]);
    }
}

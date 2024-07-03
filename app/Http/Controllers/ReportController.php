<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyRevenue;

class ReportController extends Controller
{
    public function financialReport(Request $request)
    {
        $revenue = $request->query('revenue'); // Captura o parâmetro revenue da URL

        // Armazenar o valor de revenue no banco de dados
        if ($revenue) {
            DailyRevenue::create([
                'date' => now()->toDateString(), // Data atual
                'revenue' => $revenue,
            ]);
        }

        return view('reports.financial', compact('revenue'));
    }

    public function dailyReport($date)
    {
        // Lógica para o relatório diário aqui
        $totalRevenue = DailyRevenue::whereDate('date', $date)->sum('revenue');

        return view('reports.daily', compact('totalRevenue', 'date'));
    }
    public function dailyReportFromQuery($date)
    {

        $totalRevenue = DailyRevenue::whereDate('date', $date)->sum('revenue');

        return view('reports.daily', compact('date', 'totalRevenue'));
    }
}

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
    public function dailyReportFromQuery(Request $request)
    {
        $date = $request->query('date');

        if ($date) {
            // Redireciona para a rota com a data no formato /daily-report/{date}
            return redirect()->route('daily-report', ['date' => $date]);
        } else {
            // Lógica para tratar caso não haja data na query string
            // Por exemplo, redirecionar de volta para a escolha de data
            return redirect()->route('choose-date')->with('error', 'Data não especificada.');
        }
    }
}

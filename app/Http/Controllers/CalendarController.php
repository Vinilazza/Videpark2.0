<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return view('choose-date');
    }

    public function redirectToReport(Request $request)
    {
        $selectedDate = $request->input('selectedDate');

        // Redireciona para o ReportController com a data selecionada
        return redirect()->route('daily-report.query', ['date' => $selectedDate]);
    }
}

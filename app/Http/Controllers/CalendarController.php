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

        // Armazena a data selecionada na sessão
        $request->session()->put('selectedDate', $selectedDate);

        // Redireciona para o ReportController
        return redirect()->route('');
    }
}

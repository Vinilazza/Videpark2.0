<?php

    namespace App\Http\Controllers;

    use App\Models\Plan;
    use Illuminate\Http\Request;

    class PlanController extends Controller
    {
        public function index()
        {
            $plans = Plan::all();
            return view('plans.index', compact('plans'));
        }

        public function create()
        {
            return view('plans.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
            ]);

            Plan::create([
                'name' => $request->name,
                'price' => $request->price,
            ]);

            return redirect()->route('plans.index')->with('success', 'Plano criado com sucesso.');
        }

        public function edit(Plan $plan)
        {
            return view('plans.edit', compact('plan'));
        }

        public function update(Request $request, Plan $plan)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
            ]);

            $plan->update([
                'name' => $request->name,
                'price' => $request->price,
            ]);

            return redirect()->route('plans.index')->with('success', 'Plano atualizado com sucesso.');
        }

        public function destroy(Plan $plan)
        {
            $plan->delete();
            return redirect()->route('plans.index')->with('success', 'Plano excluído com sucesso.');
        }
    }

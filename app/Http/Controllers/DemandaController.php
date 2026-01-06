<?php

namespace App\Http\Controllers;

use App\Models\Demanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandaController extends Controller
{
    public function index()
    {
        $demandas = Demanda::where('user_id', Auth::id())
                            ->latest()
                            ->paginate(10);

        return view('demandas.index', compact('demandas'));
    }

    public function create()
    {
        return view('demandas.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|min:5|max:255',
            'descricao' => 'required|min:10',
            'data_entrega' => 'required|date|after:+48 hours',
        ], [
            'titulo.required' => 'O título é obrigatório.',
            'data_entrega.after' => 'A data deve ser pelo menos 48h a partir de agora.',
        ]);

        Demanda::create([
            'user_id' => Auth::id(),
            'titulo' => $dados['titulo'],
            'descricao' => $dados['descricao'],
            'data_entrega' => $dados['data_entrega'],
            'status' => 1, // 1 = Aberto
        ]);

        return redirect()->route('demandas.index')->with('success', 'Demanda criada com sucesso!');
    }
}
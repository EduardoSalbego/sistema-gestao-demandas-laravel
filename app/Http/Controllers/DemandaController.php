<?php

namespace App\Http\Controllers;

use App\Models\Demanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandaController extends Controller
{
    // no index usei paginate(10) pensando em escalabilidade. se o sistema tiver muitas demandas, o método all(), por ex, provavelmente
    // travar, enquanto o paginate não.
    public function index()
    {
        $demandas = Demanda::where('user_id', Auth::id())
                            ->latest()
                            ->paginate(10);

        return view('demandas.index', compact('demandas'));
    }

    //sem comentários, método padrão para criar recursos no Laravel. o controller apenas entrega a view, toda a lógica fica no blade
    public function create()
    {
        return view('demandas.create');
    }

    //fiz request->validate() direto no controller por simplicidade, pq o form tem poucos campos
    //tbm validei a regra de +48h no backend, pq validação só no frontend é facilmente burlável
    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|min:5|max:255',
            'descricao' => 'required|min:10',
            'data_entrega' => 'required|date|after:+48 hours',
        ], [
            'titulo.required' => 'O campo Título é obrigatório.',
            'titulo.min' => 'O título deve ter pelo menos 5 caracteres.',
            
            'descricao.required' => 'O campo Descrição é obrigatório.',
            'descricao.min' => 'A descrição deve ter pelo menos 10 caracteres.',
            
            'data_entrega.required' => 'A Data de Entrega é obrigatória.',
            'data_entrega.date' => 'Formato de data inválido.',
            'data_entrega.after' => 'A data deve ser para daqui a pelo menos 48 horas.',
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

    //troquei os ifs manuais pela policy como exigido e por centralização, caso necessário alteração mexemos apenas nas policies
    public function edit(Demanda $demanda)
    {
        $this->authorize('update', $demanda);

        return view('demandas.edit', compact('demanda'));
    }

    //mesma coisa aqui, usei a policy e o request->validate() direto no controller
    public function update(Request $request, Demanda $demanda)
    {
        $this->authorize('update', $demanda);

        $dados = $request->validate([
            'titulo' => 'required|min:5|max:255',
            'descricao' => 'required|min:10',
            'data_entrega' => 'required|date|after:+48 hours',
        ]);

        $demanda->update($dados);

        return redirect()->route('demandas.index')->with('success', 'Demanda atualizada com sucesso!');
    }

    //mesma coisa aqui, usei a policy para autorização
    //usei o soft delete como exigido. aqui uso delete() e o soft delete é implementado no model
    public function destroy(Demanda $demanda)
    {
        $this->authorize('delete', $demanda);

        $demanda->delete();

        return redirect()->route('demandas.index')->with('success', 'Demanda removida com sucesso!');
    }
}
@extends('layouts.admin')

@section('title', 'Minhas Demandas')

@section('content')
<div class="card">
    <div class="card-body p-3"> <form action="{{ route('demandas.index') }}" method="GET">
            <label class="mr-3">Exibir:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="statusTodas" value="" 
                       {{ request('status') === null ? 'checked' : '' }}
                       onchange="this.form.submit()">
                <label class="form-check-label" for="statusTodas" style="cursor: pointer;">Todas</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="statusPendentes" value="1" 
                       {{ request('status') == '1' ? 'checked' : '' }}
                       onchange="this.form.submit()">
                <label class="form-check-label" for="statusPendentes" style="cursor: pointer;">
                    <span class="badge badge-warning">Pendentes</span>
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="statusConcluidas" value="0" 
                       {{ request('status') == '0' ? 'checked' : '' }}
                       onchange="this.form.submit()">
                <label class="form-check-label" for="statusConcluidas" style="cursor: pointer;">
                    <span class="badge badge-success">Concluídas</span>
                </label>
            </div>
        </form>
    </div>
</div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Tarefas</h3>
            <div class="card-tools">
                <a href="{{ route('demandas.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Nova Demanda
                </a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Entrega</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($demandas as $demanda)
                        <tr>
                            <td>{{ $demanda->id }}</td>
                            <td>{{ $demanda->titulo }}</td>
                            <td>{{ \Carbon\Carbon::parse($demanda->data_entrega)->format('d/m/Y H:i') }}</td>
                            <td>
                                @if($demanda->status === 1)
                                    <span class="badge badge-warning">Pendente</span>
                                @else
                                    <span class="badge badge-success">Concluída</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('demandas.edit', $demanda->id) }}" class="" title="Editar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('demandas.destroy', $demanda->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm text-danger" title="Excluir" 
                                            style="border:none; background:none;" 
                                            onclick="return confirm('Tem certeza que deseja excluir?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Nenhuma demanda encontrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $demandas->links() }}
        </div>
    </div>
@endsection
@extends('layouts.admin')

@section('title', 'Minhas Demandas')

@section('content')
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
                                    <span class="badge badge-warning">Aberto</span>
                                @else
                                    <span class="badge badge-info">{{ $demanda->status }}</span>
                                @endif
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
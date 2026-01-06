@extends('layouts.admin')

@section('title', 'Nova Demanda')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Preencher Detalhes</h3>
        </div>

        <form action="{{ route('demandas.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror"
                        value="{{ old('titulo') }}">
                    @error('titulo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3">{{ old('descricao') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Data de Entrega (+48h)</label>
                    <input type="datetime-local" name="data_entrega"
                        class="form-control @error('data_entrega') is-invalid @enderror">
                    @error('data_entrega') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('demandas.index') }}" class="btn btn-default">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
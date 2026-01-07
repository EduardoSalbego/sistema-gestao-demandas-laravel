<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Demanda;
use App\Models\User;
use Carbon\Carbon;

class DemandaSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        if (!$user) {
            $this->command->info('Crie um usuário primeiro!');
            return;
        }

        $demandas = [
            ['titulo' => 'Reunião de Alinhamento', 'prazo' => 24, 'status' => 1],
            ['titulo' => 'Correção de Bug Crítico', 'prazo' => 4, 'status' => 1],
            ['titulo' => 'Relatório Mensal', 'prazo' => 120, 'status' => 1],
            ['titulo' => 'Atualizar Servidor', 'prazo' => 72, 'status' => 0],
            ['titulo' => 'Treinamento Equipe', 'prazo' => 300, 'status' => 1],
        ];

        foreach ($demandas as $d) {
            Demanda::create([
                'user_id' => $user->id,
                'titulo' => $d['titulo'],
                'descricao' => 'Descrição automática gerada pelo Seeder para teste de interface.',
                'data_entrega' => Carbon::now()->addHours($d['prazo']),
                'status' => $d['status'],
            ]);
        }
    }
}
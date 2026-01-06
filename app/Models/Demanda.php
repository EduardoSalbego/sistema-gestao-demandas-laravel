<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demanda extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'titulo',
        'descricao',
        'data_entrega',
        'status'
    ];

    protected $casts = [
        'data_entrega' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
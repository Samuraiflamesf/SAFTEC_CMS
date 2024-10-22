<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ouvidoria extends Model
{
    /** @use HasFactory<\Database\Factories\OuvidoriaFactory> */
    use HasFactory;

    protected $fillable = [
        'demanda',
        'demandante',
        'setor',
        'unidade',
        'medicamento',
        'resp_aquisicao',
        'obs',
        'date_dispensacao',
        'date_resposta',
        'user_create_id',
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_create_id');
    }
    protected static function booted()
    {
        static::creating(function ($ouvidoria) {
            if ($ouvidoria->user_create_id) {
                $user = User::find($ouvidoria->user_create_id);
                $ouvidoria->user_name = $user->name; // Armazena o nome do usuário ao criar o ouvidoria
            }
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_create_id');
    }
}

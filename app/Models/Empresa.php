<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    /** @use HasFactory<\Database\Factories\EmpresaFactory> */
    use HasFactory;
    public function users()
    {
        return $this->hasMany(User::class, 'id_empresa');
    }
    protected $fillable = [
        'id',
        'name',
        'sub_contrato',
        'type-vinc'
    ];
}

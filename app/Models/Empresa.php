<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    /** @use HasFactory<\Database\Factories\EmpresaFactory> */
    use HasFactory;
    protected $fillable = ['name', 'sub_contrato', 'type_vinc'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_empresa');
    }
}
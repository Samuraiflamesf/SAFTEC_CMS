<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    /** @use HasFactory<\Database\Factories\ProfessionFactory> */
    use HasFactory;
    protected $fillable = [
        "id",
        "name",
        "perfil",
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'id_profession');
    }
}
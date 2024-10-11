<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Painel extends Model
{
    /** @use HasFactory<\Database\Factories\PainelFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'url',
        'img'
    ];
}
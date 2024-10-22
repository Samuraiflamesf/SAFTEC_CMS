<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
    /** @use HasFactory<\Database\Factories\FeriaFactory> */
    use HasFactory;
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected $fillable = [
        'id',
        'user_id',
        'days_ferias',
        'date_start',
        'date_end',
        'detail'
    ];
}
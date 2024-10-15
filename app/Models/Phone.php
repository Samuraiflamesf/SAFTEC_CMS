<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /** @use HasFactory<\Database\Factories\PhoneFactory> */
    use HasFactory;
    protected $fillable = [
        "id",
        'name',
        'phone',
        'user_create_id'
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_create_id');
    }
}

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
    protected static function booted()
    {
        static::creating(function ($phone) {
            if ($phone->user_create_id) {
                $user = User::find($phone->user_create_id);
                $phone->user_name = $user->name; // Armazena o nome do usuário ao criar o phone
            }
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_create_id');
    }
}
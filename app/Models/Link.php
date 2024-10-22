<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'url',
        'user_create_id',
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_create_id');
    }
    protected static function booted()
    {
        static::creating(function ($link) {
            if ($link->user_create_id) {
                $user = User::find($link->user_create_id);
                $link->user_name = $user->name; // Armazena o nome do usuário ao criar o link
            }
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_create_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */

    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'document',
        'folder_id',
        'user_create_id'
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_create_id');
    }
    protected static function booted()
    {
        static::creating(function ($document) {
            if ($document->user_create_id) {
                $user = User::find($document->user_create_id);
                $document->user_name = $user->name; // Armazena o nome do usuário ao criar o document
            }
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_create_id');
    }
    public function folder()
    {
        return $this->belongsTo(NameFolder::class, 'folder_id'); // Substitua 'NameFolder::class' pelo seu modelo de pastas
    }
}
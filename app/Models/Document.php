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
}

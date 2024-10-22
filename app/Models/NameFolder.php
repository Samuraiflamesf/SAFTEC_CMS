<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameFolder extends Model
{
    /** @use HasFactory<\Database\Factories\NameFolderFactory> */
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];
    public function documents()
    {
        return $this->hasMany(Document::class, 'folder_id'); // Relacionamento inverso
    }
}

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
        'user_create_id'
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_create_id');
    }
}

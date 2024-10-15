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
}

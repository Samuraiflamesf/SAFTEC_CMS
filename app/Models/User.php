<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'cpf',
        'date_birthday',
        'password',
        'id_empresa',
        'id_profession'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships

    public function createdPhones()
    {
        return $this->hasMany(Phone::class, 'user_create_id');
    }

    public function createdLinks()
    {
        return $this->hasMany(Link::class, 'user_create_id');
    }

    public function createdNameFolders()
    {
        return $this->hasMany(NameFolder::class, 'user_create_id');
    }

    public function createdDocuments()
    {
        return $this->hasMany(Document::class, 'user_create_id');
    }

    public function createdFerias()
    {
        return $this->hasMany(Feria::class, 'user_id');
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class, 'id_profession');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
}

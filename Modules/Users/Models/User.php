<?php

namespace Modules\Users\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Modules\Users\Database\Factories\UserFactory;
use Illuminate\Notifications\Notifiable;
use Modules\Departments\Models\Department;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin()
    {
        return $this->role === 0;
    }

    public function department(){
        return $this->hasOne(Department::class);
    }

    public function courses(){
        return $this->hasMany(Department::class);
    }

    // protected static function newFactory(): UserFactory
    // {
    //     // return UserFactory::new();
    // }
}

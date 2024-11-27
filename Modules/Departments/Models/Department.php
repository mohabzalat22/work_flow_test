<?php

namespace Modules\Departments\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Departments\Database\Factories\DepartmentFactory;
use Modules\Users\Models\User;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'name'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    // protected static function newFactory(): DepartmentFactory
    // {
    //     // return DepartmentFactory::new();
    // }
}

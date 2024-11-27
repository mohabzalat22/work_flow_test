<?php

namespace Modules\Courses\Models;

 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Courses\Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Workflows\Models\Workflow;
use Modules\Users\Models\User;


class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'name'
    ];

    public function workflows()
    {
        return $this->hasMany(Workflow::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // protected static function newFactory(): CourseFactory
    // {
    //     // return CourseFactory::new();
    // }
}

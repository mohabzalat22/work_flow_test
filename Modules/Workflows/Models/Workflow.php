<?php

namespace Modules\Workflows\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Courses\Models\Course;

// use Modules\Workflows\Database\Factories\WorkflowFactory;

class Workflow extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'course_id',
        'department_id',
        'order'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    // protected static function newFactory(): WorkflowFactory
    // {
    //     // return WorkflowFactory::new();
    // }
}

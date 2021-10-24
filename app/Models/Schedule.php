<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['day', 'time_start', 'time_end', 'course_id', 'subject_id'];

    public function course(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(course::class, 'id', 'course_id');
    }

    public function subject(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(subject::class, 'id', 'subject_id');
        /*return $this->belongsTo(subject::class, 'id', 'subject_id');*/
    }

    public function students()
    {
        return $this->morphedByMany(Student::class, 'scheduleable');
    }

    public function instructors()
    {
        return $this->morphedByMany(Instructor::class, 'scheduleable');
    }
}

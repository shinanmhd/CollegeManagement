<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'school_year'];

    /*public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Student::class, 'course_id', 'id');
    }*/

    public function subjects()
    {
        return $this->hasMany(subject::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function instructor()
    {
        return $this->belongsToMany(Instructor::class);
    }

    public function schedule(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'id', 'course_id');
    }

    public function delete()
    {
        $this->subjects()->delete(); // delete course subjects

        return parent::delete();
    }
}

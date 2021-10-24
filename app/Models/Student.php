<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'gender', 'age', 'contact_address', 'user_id'];

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function schedules(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Schedule::class, 'scheduleable');
    }

    public function delete()
    {
        $this->user()->delete(); // delete related user
        $this->transactions()->delete(); // delete student transactions

        return parent::delete();
    }
}

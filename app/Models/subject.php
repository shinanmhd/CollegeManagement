<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'course_id'];

    public function course()
    {
        return $this->belongsTo(course::class, 'course_id', 'id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'id', 'subject_id');
    }

    public static function fullDay($d)
    {
        switch ($d) {
            case 'su':
                $day = 'Sunday';
                break;
            case 'mo':
                $day = 'Monday';
                break;
            case 'tu':
                $day = 'Tuesday';
                break;
            case 'we':
                $day = 'Wednesday';
                break;
            case 'th':
                $day = 'Thursday';
                break;
            case 'fr':
                $day = 'Friday';
                break;
            case 'sa':
                $day = 'Saturday';
                break;

            default:
                $day = $d;
                break;
        }

        return $day;
    }

    public function delete()
    {
        $this->schedule()->delete(); // delete subject schedules

        return parent::delete();
    }
}

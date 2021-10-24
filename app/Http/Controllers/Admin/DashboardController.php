<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\Instructor;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\subject;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $classesToday = Schedule::where('day', '=', strtolower(substr(date('D'), 0, 2)))->orderBy('time_start','asc')->get();
        $courses      = course::all();
        $subjects     = Subject::all();
        $students     = Student::all();
        $instructors  = Instructor::all();
        $transactions = Transaction::all();

        return response()->view('admin.dashboard', compact('classesToday', 'courses', 'subjects', 'students', 'instructors', 'transactions'));
    }
}

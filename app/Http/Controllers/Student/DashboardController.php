<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', \Auth::user()->id)->with('schedules', 'user', 'transactions', 'courses')->first();

        return response()->view('student.dashboard', compact('student'));
    }
}

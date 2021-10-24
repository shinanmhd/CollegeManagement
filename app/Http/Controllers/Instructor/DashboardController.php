<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Instructor::where('user_id', \Auth::user()->id)->with('schedules', 'user', 'courses')->first();

        return response()->view('instructor.dashboard', compact('student'));
    }
}

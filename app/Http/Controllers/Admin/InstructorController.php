<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Session;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::with('user')->get();

        return response()->view('admin.instructor.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'      => 'required|min:2',
            'last_name'       => 'required|min:2',
            'email'           => 'required|email',
            'age'             => 'required',
            'gender'          => 'required',
            'contact_address' => 'required|min:2',
            'password'        => 'required|confirmed|min:6',
        ]);

        // create the user
        $user = new User([
            'password' => Hash::make($request->input('password')),
            'email'    => $request->input('email'),
            'role'     => 'instructor'
        ]);

        $user->save();

        // create the student profile for the user
        $user->instructor()->create([
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'gender'            => $request->input('gender'),
            'age'               => $request->input('age'),
            'contact_address'   => $request->input('contact_address'),
            'user_id'           => $user->id,
        ]);

        Session::flash('flash_success', 'Student successfully created!');

        return redirect()->route('admin.instructor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instructor = Instructor::with('user')->find($id);
        return response()->view('admin.instructor.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $instructor = Instructor::find($id);

        $this->validate($request, [
            'first_name'      => 'required|min:2',
            'last_name'       => 'required|min:2',
            'age'             => 'required',
            'gender'          => 'required',
            'contact_address' => 'required|min:2',
            'password'        => 'confirmed',
        ]);

        //if email was provided validate email
        if ($request->input('email') != $instructor->user->email && $request->input('email') !== null) {
            $this->validate($request, [
                'email'           => 'required|email|unique:users',
            ]);
        }


        if ($request->input('password') !== null) {
            $instructor->user()->update([
                'email' => $request->input('email'),
                'password'=> Hash::make($request->input('password'))
            ]);
        } else {
            $instructor->user()->update([
                'email' => $request->input('email'),
            ]);
        }

        $instructor->update([
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'gender'            => $request->input('gender'),
            'age'               => $request->input('age'),
            'contact_address'   => $request->input('contact_address'),
        ]);

        Session::flash('flash_success', 'Instructor successfully updated!');

        return redirect()->route('admin.instructor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $user = Instructor::find($id);
        $user->courses()->detach();
        $user->delete();

        Session::flash('flash_success', 'Instructor successfully deleted!');

        return redirect()->route('admin.instructor.index');
    }
}

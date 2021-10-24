<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\subject;
use Illuminate\Http\Request;
use Session;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = subject::with('schedule')->orderBy('name', 'asc')->get();

        return response()->view('admin.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        isset($request->cid) ? $toCourse = $request->cid : $toCourse = null;
        $courses = course::orderBy('name', 'asc')->get();

        return response()->view('admin.subject.create', compact('courses', 'toCourse'));
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
            'name' => 'required',
            'course_id' => 'required'
        ]);

        subject::create($request->all());

        Session::flash('flash_success', 'Subject successfully added!');

        return redirect()->route('admin.subject.index', ['cid' => $request->input('course_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = course::with('subjects')->findOrFail($id);

        return response()->view('admin.subject.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = subject::find($id);
        $courses = course::all();

        return response()->view('admin.subject.edit', compact('subject', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'course_id' => 'required'
        ]);

        $subject = subject::find($id);
        $subject->update($request->all());

        Session::flash('flash_success', 'Subject successfully updated!');

        return redirect()->route('admin.subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $subject = subject::find($id);
        $subject->delete();

        Session::flash('flash_success', 'Subject successfully deleted!');

        return redirect()->route('admin.subject.index');
    }
}

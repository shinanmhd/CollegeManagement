<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Session;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();

        return response()->view('admin.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::orderBy('first_name', 'asc')->get();

        return response()->view('admin.transaction.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'transaction_name' => 'required',
            'student_id'       => 'required',
            'transaction_date' => 'required',
        ]);

        $input = $request->all();

        Transaction::create($input);

        Session::flash('flash_success', 'Transaction successfully created!');

        return redirect()->route('admin.transaction.index');
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
        $students = Student::orderBy('first_name', 'asc')->get();
        $transaction = Transaction::find($id);

        return response()->view('admin.transaction.edit', compact('transaction', 'students'));
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
        $transaction = Transaction::find($id);

        $request->validate([
            'transaction_name' => 'required',
            'student_id'       => 'required',
            'transaction_date' => 'required',
        ]);

        $input = $request->all();

        $transaction->update($input);

        Session::flash('flash_success', 'Transaction successfully updated!');

        return redirect()->route('admin.transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        Session::flash('flash_success', 'Transaction successfully deleted!');

        return redirect()->route('admin.transaction.index');
    }
}

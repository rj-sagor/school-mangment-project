<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StudentFee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees=StudentFee::all();
      return view('Student.StudentFee.Student_fee_list',compact('fees')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Student.StudentFee.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fee_name'=>'required|unique:student_fees,fee_name',
        ]);
        StudentFee::insert([
            'fee_name'=>$request->fee_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Student_fee Add Successfully');
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
        $fee=StudentFee::find($id);
        return view('Student.StudentFee.Student_fee_Edit',compact('fee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fee_name'=>'required|unique:student_fees,fee_name',
        ]);
        StudentFee::find($id)->update([
            'fee_name'=>$request->fee_name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Student_fee update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

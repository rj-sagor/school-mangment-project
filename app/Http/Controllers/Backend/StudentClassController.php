<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $all_student=StudentClass::with('classTouser')->latest()->simplePaginate(6);
        return view('Student.classList',compact('all_student'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Student.Class');
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
            'class_name'=> 'required|unique:student_classes,class_name',

        ]);
        StudentClass::insert([
            'class_name'=>$request->class_name,
            'added_by'=>Auth::user()->id,
            'created_at'=>Carbon::now(),

        ]);
        return back()->with('success','Class Add Successfully');
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
        $classes=StudentClass::find($id);
        return view('Student.edit',compact('classes'));
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
        StudentClass::find($id)->update([
            'class_name'=>$request->class_name,
            'added_by'=>Auth::user()->id,
            'updated_at'=>Carbon::now(),

        ]);
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

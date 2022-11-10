<?php

namespace App\Http\Controllers;

use App\Models\AssignSubject;
use App\Models\StudentClass;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Assign;

class AssignSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assign_sub=AssignSubject::with('assignreliationclass')->select('class_id')->groupBy('class_id')->get(); 
        return view('Student.AssignSubject.assign_subject_list',compact('assign_sub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_class=StudentClass::all();
        $all_subject=Subject::all();
        return view('Student.AssignSubject.add',compact('all_class','all_subject'));
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
            'class_id'=>'required',
            'subject_id'=>'required',
            'full_mark'=>'required',
            'pass_mark'=>'required',
            'subjective_mark'=>'required',

        ]);

        if(AssignSubject::where('class_id',$request->class_id)->where('subject_id',$request->subject_id)->exists())
        {
            return back()->with('err','this subject allerdy taken');
        }
        else{
             AssignSubject::insert($request->except('_token') + [
          
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success','Assign_subject Add Successfully');
        }
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        $all_data=AssignSubject::with('assign_riletion_subject')->where('class_id',$class_id)->get();
        return view('Student.AssignSubject.show',compact('all_data'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_class=StudentClass::all();
        $all_subject=Subject::all();
        $assign_sub=AssignSubject::find($id);
        return view('Student.AssignSubject.edit',compact('all_class','all_subject','assign_sub'));
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
            
            'subject_id'=>'unique:assign_subjects,subject_id',
           

        ]);

       
             AssignSubject::find($id)->update($request->except('_token') + [
          
            'updated_at'=>Carbon::now()
        ]);
        return back()->with('success','Assign_subject updated Successfully');
        
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

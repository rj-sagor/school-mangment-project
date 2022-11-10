<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentFee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeeCategoryAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $fee_amount=FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
      return view('Student.FeeAmount.amountList',compact('fee_amount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fee_Category=StudentFee::all();
        $all_class=StudentClass::all();
        return view('Student.FeeAmount.Add',compact('all_class','fee_Category'));
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
            'fee_category_id'=>'required',
            'class_id'=>'required',
            'amount'=>'required'
        ]);
        FeeCategoryAmount::insert($request->except('_token')  + [
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Amount successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fee_category_id)
    {
        $fee_data=FeeCategoryAmount::with('amountRletionClass')->where('fee_category_id',$fee_category_id)->get();
        return view('Student.FeeAmount.show',compact('fee_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fee_Category=StudentFee::all();
        $all_class=StudentClass::all();
        $fee_amount=FeeCategoryAmount::find($id);
        return view('Student.FeeAmount.edit',compact('fee_Category','all_class','fee_amount'));
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
            'amount'=>'required',
            'class_id'=>'required|unique:fee_category_amounts,class_id',
        ]);
        FeeCategoryAmount::find($id)->update($request->except('_token') +[
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Update Successfully');
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


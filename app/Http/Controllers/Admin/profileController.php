<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_admin=User::all();
        return view('Admin.adminList',compact('all_admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:user,email',
            'role'=>'required',
        ]);

        if($request->hasFile('image')){
            
            $old_photo=$request->file('image');
            $new_profile_photo=Auth::id().'.'. $old_photo->getClientOriginalExtension();
            $new_profile_photo_location='public/storage/uploads/profile/'.$new_profile_photo;
           Image::make( $old_photo)->resize(200,200)->save(base_path($new_profile_photo_location));
        
   
         
        }
       User::insert([
        'name'=>$request->name,
        'email'=>$request->email,
        'role'=>$request->role,
        'image'=>$request->image,
        'password'=>'123',
       ]);
         



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
        //
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
        //
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

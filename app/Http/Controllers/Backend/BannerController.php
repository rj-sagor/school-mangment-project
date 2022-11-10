<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $all_banner=Banner::all();
        $Onlytrash=Banner::onlyTrashed()->get();
        return view('banner.index',compact('all_banner','Onlytrash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'discription'=>"max:300",
            'image'=>'required|mimes:png,jpg,jpeg,webp,gif|max:1024',
    ]);
     $banner=  $request->file('image');
     $banner_name=Str::slug($request->title).'_'.time().'.'.$banner->getClientOriginalExtension();
     $banner_upload=$banner->move(public_path('storage/uploads/banner/'),$banner_name);

     if($banner_upload){
         $banner= new Banner();
         $banner->title=$request->title;
         $banner->discription=$request->discription;
         $banner->image=$banner_name;
         $banner->save();
     }
     return redirect()->route('Backend.banner.index')->with('success','All banner data add successfully');

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        
        $this->validate($request,[
           
            'discription'=>"max:300",
            'image'=>'mimes:png,jpg,jpeg,webp,gif|max:1024',
    ]);

     $banner_img=  $request->file('image');
     if(!empty($banner_img)){
         $banner_name=Str::slug($request->title).'_'.time().'.'.$banner_img->getClientOriginalExtension();
     $banner_upload=$banner_img->move(public_path('storage/uploads/banner/'),$banner_name);
     $ex_file=public_path('storage/uploads/banner/').$banner->image;

     if(file_exists($ex_file)){
         unlink($ex_file);
     }
     }
     else{
        $banner_name=$banner->image;
     }
     

    
         $banner->title=$request->title;
         $banner->discription=$request->discription;
         $banner->image=$banner_name;
         $banner->save();
     
     return back()->with('success','Banner Update Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        if($banner->status==1){
            $banner->status=2;
            $banner->save();
           
        }else{
            $banner->status=1;
            $banner->save();
           

        }
        return back()->with('success','Banner content Deleted!');
    }
    public function statusUpdate(Banner $banner){
        if($banner->status==1){
            $banner->status=2;
            $banner->save();
            return back()->with('success','Banner status Updated!');
        }else{
            $banner->status=1;
            $banner->save();
            return back()->with('success','Banner status Updated!');

        }


    }
    public function bannerRestore($id){
        $data=Banner::onlyTrashed()->find($id);
        $data->restore();
        if($data->status==1){
            $data->status=2;
            $data->save();
           
        }else{
            $data->status=1;
            $data->save();
         

        }
        return back()->with('success','Banner Restore Successfully !');

    }
    public function bannerDelete($id){
        $data=Banner::onlyTrashed()->find($id);
        $data->forceDelete();
        $ex_file=public_path('storage/uploads/banner/').$data->image;

        if(file_exists($ex_file)){
         unlink($ex_file);
     }
        return back()->with('success','Parmanent Delete Successfully !');
    }
}

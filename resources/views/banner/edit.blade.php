@extends('layouts.backendApp')
@section('title','Edit banner |')
@section('content')
<section>
    <div class="container">

        <div class="page-title">
            <div class="title_left">
                <h3>Edit banner</h3>
            </div>

            
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit banner <a href="{{ route('Backend.banner.index') }}" class="btn btn-sm btn-success">all Banner</a></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form action="{{ route('Backend.banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Banner Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text"  name="title"  class="form-control " value="{{ $banner->title }}">
                                    @error('title')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Banner Discription<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                   <textarea name="discription" id="" cols="30" rows="5" class="form-control ">{{ $banner->discription }}
                                   </textarea>
                                   @error('discription')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Image<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="Upload_image" name="image"  class="form-control ">
                                    @error('image')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                    <img width="150" class="mt-3" id="insert_image" src="{{ asset('storage/uploads/banner/'.$banner->image) }}" alt="{{ $banner->title }}">
                                </div>
                            </div>
                            
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if(Session('success'))
    <div class="toast" style="position: absolute; top: 0; right: 0; " data-delay="8000">
        <div class="toast-header">
         
          <strong class="mr-auto">{{ config('app.name') }}</strong>
          
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body">
         {{ Session('success') }}
        </div>
      </div>

@endif
@endsection
@section('backend_js')
<script>
    $('.toast').toast('show')

    let upload_image= document.getElementById('Upload_image');
    let insert_image= document.getElementById('insert_image');
    upload_image.addEventListener("change", function(){
        
        insert_image.src=window.URL.createObjectURL(upload_image.files[0]);
});
    
</script>
@endsection
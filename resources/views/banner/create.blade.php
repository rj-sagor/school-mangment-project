@extends('layouts.backendApp')
@section('title','add banner |')
@section('content')
<section>
    <div class="container">

        <div class="page-title">
            <div class="title_left">
                <h3>Add banner</h3>
            </div>

            
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add banner <a href="{{ route('Backend.banner.index') }}" class="btn btn-sm btn-success">all Banner</a></h2>
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
                        <form action="{{ route('Backend.banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Banner Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text"  name="title"  class="form-control ">
                                    @error('title')
                                    <p class="text text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Banner Discription<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                   <textarea name="discription" id="" cols="30" rows="5" class="form-control "></textarea>
                                   @error('discription')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Image<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file"  name="image"  class="form-control ">
                                    @error('image')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
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
@endsection
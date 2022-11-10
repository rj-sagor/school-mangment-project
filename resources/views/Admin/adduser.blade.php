@extends('layouts.backendApp')
@section('title','add Assign subject |')
@section('content')
<section>
    <div class="container">

        <div class="page-title">
            <div class="title_left">
                <h3>Add admin or oparetor</h3>
            </div>

            
        </div>

        <div class="clearfix"></div>
        <div class="add_item">
           
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Admin or Oparetor <a href="{{ route('Profile.admin.index') }}" class="btn btn-sm btn-success">all admin list</a></h2>
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
                            <form action="{{ route('Profile.admin.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
    
    
                                <div class="form-group row">
                                    <label class="control-label col-md-1 col-sm-1 "> Admin type</label>
                                    <div class="col-md-5 col-sm-9 ">
                                        <select class="select2_single form-control" tabindex="-1" name="role">
                                            <option value="">Select roll</option>
                                            <option value="Admin"> Admin</option>
                                            <option value="Oparetor"> User</option>
                                      
                                        </select>
                                        @error('user_type')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <label class="control-label col-md-1 col-sm-6 ">Name</label>
                                    </label>
                                    <div class="col-md-5 col-sm-6 ">
                                        <input type="name"  name="name"  class="form-control ">
                                        @error('name')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <label class="control-label col-md-1 col-sm-6 ">Email</label>
                                    </label>
                                    <div class="col-md-4 col-sm-6 ">
                                        <input type="email"  name="email"  class="form-control ">
                                        @error('email')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>

                                 
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Image<span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 ">
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
        
    </div>
</section>

<
</div>





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

    
</script>
    
@endsection
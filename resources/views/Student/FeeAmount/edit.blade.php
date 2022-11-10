@extends('layouts.backendApp')
@section('title','add Studen_Shift |')
@section('content')
<section>
    <div class="container">

        <div class="page-title">
            <div class="title_left">
                <h3>Add Shift</h3>
            </div>

            
        </div>

        <div class="clearfix"></div>
        <div class="add_item">
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Fee_category_amount <a href="{{ route('Student.fee_amount.index') }}" class="btn btn-sm btn-success">all Fee_category_amount</a></h2>
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
                            <form action="{{ route('Student.fee_amount.update',$fee_amount->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                  @method('PUT')
    
                                <div class="form-group row">
                                    <label class="control-label col-md-1 col-sm-1 "> Fee Category</label>
                                    <div class="col-md-4 col-sm-9 ">
                                        <select class="select2_single form-control" tabindex="-1" name="fee_category_id">
                                            <option value="">Select Fee_category</option>
                                       @foreach ($fee_Category as $category )
                                       <option value="{{ $category->id }}"{{ $category->id == $fee_amount->fee_category_id ? "selected" : " " }}>{{ $category->fee_name }}</option>
                                      @endforeach
                                        </select>
                                        @error('fee_category_id')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label class="control-label col-md-1 col-sm-1 "> Class</label>
                                    <div class="col-md-4 col-sm-9 ">
                                        <select class="select2_single form-control" tabindex="-1" name="class_id">
                                            <option value="">Select Class</option>
                                       @foreach ($all_class as $class )
                                       <option value="{{ $class->id }}" {{ $class->id == $fee_amount->class_id ? "selected" :"" }}>{{ $class->class_name }}</option>
                                           
                                       @endforeach
                                        </select>
                                        @error('class_id')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
    
                                    <label class="control-label col-md-1 col-sm-1 ">amount</label>
                                    </label>
                                    <div class="col-md-4 col-sm-6 ">
                                        <input type="number"  name="amount"  class="form-control " value="{{ $fee_amount->amount }}">
                                        @error('amount')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
    
                                    <div class="col-md-1 col-sm-6 " >
                                       <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
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
@extends('layouts.backendApp')
@section('title','All banner |')
@section('content')

<section>
    <div class="containe">
        <div class="row">

            <div class="col-md-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All banner <a href="{{ route('Backend.banner.create') }}" class="btn btn-sm btn-success">Add Banner</a></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>sL</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($all_banner as $data )
                              
                          <tr>
                            <th scope="row">1</th>
                            <td>
                                <img width="100" src="{{ asset('storage/uploads/banner/'.$data->image) }}" alt="{{ $data->title }}">
                            </td>
                            <td>{{ $data->title }}</td>
                            <td>{{ Str::limit($data->discription, 30, '...')  }}</td>
                            <td>{{ $data->status ==1 ?'Active' : 'Deactive'  }}</td>
                            <td>
                              <a href="{{ route('Backend.banner.status.update',$data->id) }}" class="btn btn-{{  $data->status ==1 ? "warning" : "info" }} btn-sm ">
                              {{ $data->status ==1 ?'Deactive' : 'Active'    }}</a>

                                <a href="{{ route('Backend.banner.edit',$data->id) }}" class="btn btn-sm btn-success">view</a>
                                <a href="{{ route('Backend.banner.edit' ,$data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                
                                <form class="d-inline" action="{{ route('Backend.banner.destroy',$data->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                          </tr>
                              
                          @endforeach
                       
                       
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
        </div>

        <div class="row">

          <div class="col-md-12  ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Deleted Banner </h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table">
                    <thead>
                      <tr>
                        <th>sL</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($Onlytrash as $data )
                            
                        <tr>
                          <th scope="row">1</th>
                          <td>
                              <img width="100" src="{{ asset('storage/uploads/banner/'.$data->image) }}" alt="{{ $data->title }}">
                          </td>
                          <td>{{ $data->title }}</td>
                          <td>{{ Str::limit($data->discription, 30, '...')  }}</td>
                          <td>{{ $data->status ==1 ?'Active' : 'Deactive'  }}</td>
                          <td>
                              <a href="{{ route('Backend.banner.restore',$data->id) }}"
                                 class="btn btn-sm btn-success">Restore</a>
                              
                              <button type="submit" value="{{ route('Backend.banner.parmanent.delete',$data->id) }}"
                                 class="ParmanentDelete btn btn-sm btn-danger">Parmanent Delete</button>
                            
                          </td>
                        </tr>
                            
                        @endforeach
                     
                     
                    </tbody>
                  </table>

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
@section("Backend_css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css">
  
@endsection
@section('backend_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.min.js">
  
</script>
<script>
    $('.toast').toast('show')


    // sweet alert
   $('.ParmanentDelete').on('click',function(){
     let btnUrl= $(this).val();
     
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
   window.location.href=btnUrl;
  }
})
   });
  

  

</script>
@endsection
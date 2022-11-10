@extends('layouts.backendApp')
@section('title','Admin List |')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 bg-light text-right">
<a class="btn btn-sm btn-success " href="{{ route('Profile.admin.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>Add Admin Or User</a>
  </div>
</div>
<span class="text text-success"><h3>Studen Shift List</h3></span>


<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
     
          <th>Sl</th>
          <th>Image</th>
          <th>Admin name</th>
          <th>Admin Email</th>
          <th> password</th>
          <th>Role</th>
         <th>action</th>
          
       
  </thead>
 <tbody>
 
  @foreach ($all_admin as $admin)
  <tr>
    <td>{{ $loop->index +1 }}</td>
    <td>
        <img src="{{asset('storage\uploads\profile') }}/{{ $admin->image }}" 
         height="50px" width="50px" alt="">
    </td>

    <td>{{ $admin->name }}</td>
    <td>{{ $admin->email }}</td>
    <td>{{ $admin->code }}</td>
    <td>{{ $admin->role }}</td>

    <td>
      <a class="btn btn-black" href="{{ route('Profile.admin.edit',$admin->id) }}"><i class="fa fa-edit"></i></a>
    </td>
  </tr>
  @endforeach
 

 </tbody>
  {{-- <tfoot>
      <tr>
          <th>Name</th>
          <th>Position</th>
          <th>Office</th>
          <th>Age</th>
          <th>Start date</th>
          <th>Salary</th>
      </tr>
  </tfoot> --}}
</table>

  @endsection
  @section('backend_js')
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
    $('#example').DataTable();
});
  </script>
    
  @endsection
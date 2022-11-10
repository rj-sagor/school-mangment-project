@extends('layouts.backendApp')
@section('title','Show All Assign subject |')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 bg-light text-right">
<a class="btn btn-sm btn-success " href="{{ route('Student.Assign_subject.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>Add Assign Subject</a>
  </div>
</div>
<span class="text text-success"><h3>Studen Assign Subject List</h3></span>


<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
     
          <th>Sl</th> 
          <th>subject Name</th> 
          <th>Full mark</th> 
          <th>Pass mark</th> 
          <th>Subjective mark</th> 
          <th>action</th>
          
       
  </thead>
 <tbody>
 
  @foreach ($all_data as $data)
  <tr>
    <td>{{ $loop->index +1 }}</td>

    <td>{{ $data->assign_riletion_subject->sub_name }}</td>
    <td>{{ $data->full_mark }}</td>
    <td>{{ $data->pass_mark }}</td>
    <td>{{ $data->subjective_mark }}</td>

    <td>
         <a class="btn btn-black" href="{{ route('Student.Assign_subject.edit',$data->id) }}"><i class="fa fa-edit"></i></a>
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
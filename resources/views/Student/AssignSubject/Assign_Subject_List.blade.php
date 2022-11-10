@extends('layouts.backendApp')
@section('title','assign subject |')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 bg-light text-right">
<a class="btn btn-sm btn-success " href="{{ route('Student.Assign_subject.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>Add Assign subject</a>
  </div>
</div>
<span class="text text-success"><h3>Studen Fee_Amount List</h3></span>


<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
     
          <th>Sl</th>
          <th>Class  Name</th> 
          <th>action</th>
          
       
  </thead>
 <tbody>
 
  @foreach ($assign_sub as $class)
  <tr>
    <td>{{ $loop->index +1 }}</td>

    <td>{{ $class->assignreliationclass->class_name }}</td>
    <td>
      <a class="btn btn-black" href="{{ route('Student.Assign_subject.show',$class->class_id) }}"><i class="fa fa-eye"></i></a>
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
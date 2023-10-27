
@extends('layouts.master')

@section('main')
<main class="app-content">
  <div class="app-title">
      <div>
          <h1><i class="fa fa-file"></i> Income Entry</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      </ul>
  </div>
    <div class="py-12">
    <div class="container">
              <div class="row">




              <div class="col-md-8">

              <div class="card">


              @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif




<div class="card-header">
  All Category
</div>






<table class="table data-table">
<thead>
<tr>
<th scope="col">SL No</th>
<th scope="col">Applicant Name</th>
<th scope="col">Amount</th>
<th scope="col">User</th>
<th scope="col">Status</th>
<th scope="col">action</th>
</tr>
</thead>
<tbody>

@foreach($entries as $entry)
<tr>

<th scope="row">{{$entries->firstItem()+$loop->index}}</th>
<td>{{$entry->applicant_name}}</td>
<td>{{$entry->amount}}</td>
<td>{{$entry->user->name}}</td>
<td>
  {{$entry->status}}
</td>
<td>

<a  href="" class="btn btn-sm btn-info" data-toggle="tooltip"
data-placement="top" title="" data-original-title="Edit">
<i class="fa fa-edit"></i>
</a>
<a href="" class="btn btn-sm btn-danger" data-toggle="tooltip"
data-placement="top" title="" data-original-title="Delete">
<i class="fa fa-trash"></i>
</a>

</td>


</tr>
@endForeach


</tbody>

</table>

    
    
       </div>
              </div>

               <div class="col-md-4">

           <div class="card">
              <div class="card-header">
              Add Category
                </div>
                <div class="card-body">
                <form action="{{route('store.entry')}}" method="POST"> 
                @csrf
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Applicant Name</label>
  
      <input type="text" name="applicant_name" class="form-control" id="inputEmail3">
    @error('applicant_name')
    <span class="text-danger">{{$message}}</span>
    @enderror
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-6 col-form-label">Amount</label>
      
          <input type="text" name="amount" class="form-control" id="inputEmail3">
        @error('amount')
        <span class="text-danger">{{$message}}</span>
        @enderror
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-6 col-form-label">Date</label>
          
            <input type="text" name="date" class="datepicker form-control"  />
            @error('date')
            <span class="text-danger">{{$message}}</span>
            @enderror
          

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-6 col-form-label">Status</label>
          
              <input type="text" name="status" class="form-control" id="inputEmail3">
            @error('status')
            <span class="text-danger">{{$message}}</span>
            @enderror
              </div>
      
  
 

  <button type="submit" class="btn btn-primary">Add Entry</button>
 
</form>
</div>

</div>
    </div>
             
            </div>
        </div>



<!-- start Trashed -->


<div class="container">
              <div class="row">




              <div class="col-md-8">

              <div class="card">


             







              <div class="card-header">
                     Trashed List
              </div>

             




              <table class="table data-table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Category Name</th>
      <th scope="col">Category Info</th>
      <th scope="col">User</th>
      <th scope="col">Created At</th>
      <th scope="col">action</th>
      </tr>
       </thead>
       <tbody>

      

       </tbody>

       </table>
    
       </div>
              </div>

               <div class="col-md-4">

    </div>
             
            </div>
        </div>

<!-- End Trached -->


    </div>

</main>
@endsection

@section('pageJsDate')
<script type="text/javascript">
 $('.datepicker').datepicker({
    dateFormat: 'dd-mm-yy',
    changeMonth: true,
    changeYear: true,
    
    
});
</script>
@endsection
@section('pageJs')
    <script type="text/javascript">

    </script>
@endsection

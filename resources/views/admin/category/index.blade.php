
@extends('layouts.master')

@section('main')
<main class="app-content">
  <div class="app-title">
      <h1><i class="fa fa-file"></i> Category</h1>
  </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    </ul>
    <div class="py-12">
    <div class="container">




{{--       
              <div class="col-8">




              <div class="col-md-8"> --}}

              <div class="card">


              @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              </div>
@endif



<div class="container">
  <div class="row" >
    <div class="col-md-8" >
      <div class="row ">

        <div class="card-header">
          All Category
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
    
              @foreach($categories as $index=> $category)
              <tr>
              
              <th scope="row">{{$categories->first()->id+$index}}</th>
              <td>{{$category->category_name}}</td>
              <td>{{substr($category->category_info,0,20)}} ...</td>
              <td>{{$category->user->name}}</td>
              <td>
              @if($category->created_at == NULL)
              <span class="text-danger"> No Date Set</span>
              @else
              {{$category->created_at->diffForHumans()}}
              @endif
              </td>
              <td>
              <a  href="{{url('category/edit/'.$category->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip"
              data-placement="top" title="" data-original-title="Edit">
              <i class="fa fa-edit"></i>
              </a>
              <a href="{{url('softdelete/category/'.$category->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip"
                  data-placement="top" title="" data-original-title="Delete">
                  <i class="fa fa-trash"></i>
              </a>
              </td>
              </tr>
              @endForeach
              </tbody>
        </table>
      </div>
      <div class="row py-3"  style="background: #e5e5e5;">
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

                                              @foreach($trashCat as $category)
                                              <tr>
                                              
                                              <th scope="row">{{$trashCat->firstItem()+$loop->index}}</th>
                                              <td>{{$category->category_name}}</td>
                                              <td> {{substr($category->category_info,60)}}</td>
                                              <td>{{$category->user->name}}</td>
                                              <td>
                                              @if($category->created_at == NULL)
                                              <span class="text-danger"> No Date Set</span>
                                              @else
                                            {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                              @endif
                                              </td>
                                              <td>

                                                
                                              <a  href="{{url('category/restore/'.$category->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Restore">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{url('pDelete/category/'.$category->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Permanent Delete">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                              {{-- <a  href="{{url('category/restore/'.$category->id)}}" type="submit" class="btn btn-info">Restore</a>
                                              <a href="{{url('pDelete/category/'.$category->id)}}" type="submit" class="btn btn-danger">P Delete</a></td> --}}

                                              </tr>
                                              @endForeach


                                              </tbody>

                                              </table>

                              </div>
      </div>
    </div>
  <div class="col-4 " style="background: #e5e5e5;">
      
    <div class="card">
      <div class="card-header">
      Add Category
        </div>
        <div class="card-body">
        <form action="{{route('store.category')}}" method="POST"> 
        @csrf
<div class="form-group">
<label for="inputEmail3" class="col-sm-6 col-form-label">Category Name</label>

<input type="text" name="category_name" class="form-control" id="inputEmail3">
@error('category_name')
<span class="text-danger">{{$message}}</span>
@enderror
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-6 col-form-label">Category Info</label>

<textarea name="category_info" class="form-control" placeholder="Leave a comment here" id="category_info"
style="height: 150px"></textarea>
@error('category_info')
<span class="text-danger">{{$message}}</span>
@enderror
  </div>



<button type="submit" class="btn btn-primary">Add Category</button>

</form>
</div>

</div>
  </div>
</div>
</div>




             



</main>
@endsection

@section('pageJs')
    <script type="text/javascript">

    </script>
@endsection
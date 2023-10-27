
@extends('layouts.master')

@section('main')
<main class="app-content">
  <div class="app-title">
      <div>
          <h1><i class="fa fa-file"></i> Categories</h1>
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
                <div class="col-md-4">

                    <div class="card">
                        <div class="card-header">
                            Update Category
                        </div>
                        <div class="card-body">
                            <form action="{{ url('category/update/' . $categories->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Update Category Name</label>

                                    <input type="text" name="category_name" class="form-control" id="inputEmail3"
                                        value="{{ $categories->category_name }}">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-6 col-form-label">Category Info</label>
                                  
                                    <textarea type="text" name="category_info" class="form-control" placeholder="Leave a comment here" id="category_info"  
                                    style="height: 150px">{{ $categories->category_info }}</textarea>
                                    @error('category_info')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                      </div>
                             
                                <button type="submit" class="btn btn-primary">Update Category</button>

                            </form>
                        </div>

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
@extends('layouts.master')

@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file"></i> Add New post</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="tile">
                    <h3 class="tile-title">Add new post</h3>
                    <div class="tile-body">
                        <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 col-form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="inputEmail3">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 col-form-label control-label">Content</label>

                                <textarea name="content" class="form-control" placeholder="Leave a comment here" id="content"
                                    style="height: 150px"></textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 col-form-label control-label" selected>Select
                                    Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label class="control-label">Upload</label>
                                <input class="form-control form-control-lg" name="post_pic" id="formFileLg" type="file">
                                @error('post_pic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                
                <div class="tile">
                    @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>{{session('success')}}</strong> 
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                             @endif
                    <h3 class="tile-title">All Posts</h3>
                    <div class="tile-body">
                        <table class="table data-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row">{{$posts->firstItem()+$loop->index}}</th>
                                        <td>
                                            <img src="{{ asset($post->post_pic) }}" alt="{{ $post->title }}" height="70">
                                        </td>

                                        <td>{{ $post->category_id }}</td>

                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        
                                        @if ($post->created_at == null)
                                            <span class="text-danger"> No Date Set</span>
                                        @else
                                            <td>{{ $post->created_at->diffForHumans() }}</td>
                                        @endif
                                        <td>
                                            <a href={{url('post/edit/'.$post->id)}} class="btn btn-sm btn-info" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{url('post/delete/'.$post->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tile">
                    <h3 class="tile-title">Trash List</h3>
                    <div class="tile-body">
                        <table class="table data-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th>Pic</th>
                                    <th scope="col">Category Name</th>
                                    <th>Title</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($trashPost as $post)

                                <tr>
                                <th scope="row">{{$trashPost->firstItem()+$loop->index}}</th>
                                <td>
                                    <img src="{{ asset($post->post_pic) }}" alt="{{ $post->title }}" height="70">
                                </td>

                                <td>{{ $post->category_id }}</td>

                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                
                                @if ($post->created_at == null)
                                    <span class="text-danger"> No Date Set</span>
                                @else
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                @endif
                                
                                <td><a href="{{url('post/restore/'.$post->id)}}" class="btn btn-sm btn-info" data-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{url('post/pDelete/'.$post->id)}}" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a></td>
                            </tr>
                            @endForeach
                            </tbody>
                        </table>
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

@extends('layouts.master')

@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file"></i> Post</h1>
                <p>A free and open source Bootstrap 4 admin template</p>
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
                        <form action="{{ url('post/update/' . $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 col-form-label">Title</label>
                                <input type="text" name="title"  value="{{$post->title}}" class="form-control" id="inputEmail3">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 col-form-label control-label">Content</label>

                                <textarea name="content"  class="form-control" placeholder="Leave a comment here" id="content"
                                    style="height: 150px">{{$post->content}}</textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-6 col-form-label control-label" selected>Select
                                    Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="{{$post->category_id}}">{{$post->category->category_name}}</option>
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
            

        </div>
    </main>
@endsection

@section('pageJs')
    <script type="text/javascript">

    </script>
@endsection

@extends('layouts.backend.app') 
@push('header')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

@endpush
@section('content')
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Posts</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ url('admin/post') }}" class="active">Post List</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                     <span class="badge badge-pill badge-success">Success</span> {{ $error }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                    @endforeach
                            </div>
                        @endif
                        
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Create Post</strong>
                                <a href="{{ route('admin.post.create') }}"><i class="fa fa-plus"></i></a>
                            </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf                            
             <div class="row form-group">
                 <div class="col col-md-3"><label for="title" class=" form-control-label">Title</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="title" name="title" placeholder="Title" class="form-control"></div>
            </div>
             <div class="row form-group">
                      <div class="col col-md-3"><label for="category" class=" form-control-label">Category</label></div>
                     <div class="col-12 col-md-9">
                         <select name="category" id="category" class="form-control">
                          @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                         @endforeach
                         </select>
                     </div>
                 </div>
            <div class="row form-group">
                 <div class="col col-md-3"><label for="tag" class=" form-control-label">Tag</label></div>
                <div class="col-12 col-md-9"><input type="text" id="tag" name="tag" placeholder="Enter Tag" class="form-control"></div>
            </div>
            <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                    <div class="col col-md-9">
                        <div class="form-check">
                            <div class="checkbox">
                                <label for="checkbox1" class="form-check-label ">
                                    <input type="checkbox" id="checkbox1" name="checkbox1" value="option1" class="form-check-input">Option 1
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
                </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="content" class=" form-control-label">Content</label></div>
                <div class="col-12 col-md-9"><textarea name="content" id="summernote" rows="9" placeholder="Content..." class="form-control"></textarea></div>
            </div>
            <div class="row form-group float-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
           </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
   
@endsection

@push('footer')

    <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 300
      });
    </script>

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

@endpush

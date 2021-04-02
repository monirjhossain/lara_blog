@extends('layouts.backend.app') 
@push('header')
    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

@endpush
@section('content')
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Categories</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ url('admin/category') }}" class="active">Category List</a></li>
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
                                <strong class="card-title">Category Table</strong>
                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#createModal">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($categories as $key=> $category)
                                    <tbody>
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{$category->name }}</td>
                                            <td>{{$category->slug }}</td>
                                            <td>{{$category->description }}</td>
                                            <td><img src="{{ asset('storage/category/'. $category->image) }}" alt="{{ $category->name }}" height="60px" width="90px"></td>
                                            <td>
                                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#viewModal-{{ $category->id }}">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#editModal-{{ $category->id }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#deleteModal-{{ $category->id }}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
            <div class="animated">
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Create Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.category.store') }}" method="post" id="createCategory" enctype="multipart/form-data" class="form-horizontal">
                                                            @csrf
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Text" class="form-control"></div>
                                                            </div>
                                                            {{-- <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Slug</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="slug" name="slug" placeholder="Text" class="form-control"></div>
                                                            </div> --}}
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea name="description" id="description" name="description" class="form-control"></textarea></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Category Image</label></div>
                                                                <div class="col-12 col-md-9"><input type="file" id="image" name="image" class="form-control-file"></div>
                                                            </div
                                             class="modal-footer">
                                                <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('createCategory').submit();">Create</button>
                                        
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($categories as $category)
                    <div class="modal fade" id="viewModal-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="viewmodalLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">View</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                        <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{ $category->name }}</p>
                                        </div>
                                    </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Slug</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{ $category->slug }}</p>
                                        </div>
                                    </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{ $category->description }}</p>
                                        </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('storage/category/'. $category->image) }}" alt="category image" style="height:100px widht:50px" class="float-right">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary float-left" data-dismiss="modal" >Cancel</button>
                            </div>
                        </div>        
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editModal-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Edit User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.category.update', $category->id) }}" method="post" id="editCategory-{{ $category->id }}" enctype="multipart/form-data" class="form-horizontal">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Text" class="form-control" value="{{ $category->name }}"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Slug</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="slug" name="slug" placeholder="Text" class="form-control" value="{{ $category->slug }}"></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea name="description" id="description" name="description" class="form-control">{{ $category->description }}</textarea></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Category Image</label></div>
                                                                <div class="col-12 col-md-9"><input type="file" id="image" name="image" class="form-control-file" value="{{ $category->image }}"></div>
                                                            </div
                                             class="modal-footer">
                                                <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('editCategory-{{ $category->id }}').submit();">Update</button>
                                        
                                    </form> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deleteModal-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Delete Category!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Do you want to delete Category?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                document.getElementById('deleteCategory-{{ $category->id }}').submit();">Confirm</button>
                                <form action="{{ route('admin.category.destroy', $category->id) }}" style="display:none" id="deleteCategory-{{ $category->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div><!-- .content -->
    </div>
   
@endsection

@push('footer')
    <script src="{{ asset('backend') }}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/jszip/dist/jszip.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{ asset('backend') }}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/init-scripts/data-table/datatables-init.js"></script>

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

@endpush

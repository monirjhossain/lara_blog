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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li><a href="#" class="active">User List</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>User ID</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($users as $key=> $user)
                                    <tbody>
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{$user->name }}</td>
                                            <td>{{$user->role->name }}</td>
                                            <td>{{$user->user_id }}</td>
                                            <td>{{$user->email }}</td>
                                            <td>{{$user->created_at }}</td>
                                            <td>{{$user->updated_at }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#viewModal-{{ $user->id }}">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#editModal-{{ $user->id }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#deleteModal-{{ $user->id }}">
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
                @foreach ($users as $user)
                    <div class="modal fade" id="viewModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="viewmodalLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">View</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{ $user->name }}</p>
                                        </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Role</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{ $user->role->name }}</p>
                                        </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">User ID</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{ $user->user_id }}</p>
                                        </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{ $user->email }}</p>
                                        </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Created At</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{ $user->created_at }}</p>
                                        </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Updated At</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{ $user->updated_at }}</p>
                                        </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">About</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static">{{ $user->about }}</p>
                                        </div>
                                </div>
                                        
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Edit User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.users.update', $user->id) }}" method="post" id="editUser-{{ $user->id }}" enctype="multipart/form-data" class="form-horizontal">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
                                                                <p>{{ $user->name }}</p>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">User ID</label></div>
                                                                <p>{{ $user->user_id }}</p>
                                                            </div>

                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label class=" form-control-label">Role</label></div>
                                                                    <div class="col col-md-9">
                                                                        <div class="form-check">
                                                                            @foreach ($roles as $role)
                                                                                <div class="radio">
                                                                                <label for="radio1" class="form-check-label ">
                                                                                    <input type="radio" id="radio1" name="role" value="{{ $role->id }}" class="form-check-input" {{ $user->role->id == $role->id ? "checked" : " " }}>{{ $role->name }}
                                                                                </label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('editUser-{{ $user->id }}').submit();">Update</button>
                                            </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deleteModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Static Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Want to User Delete?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                document.getElementById('deleteUser-{{ $user->id }}').submit();">Confirm</button>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" style="display:none" id="deleteUser-{{ $user->id }}" method="POST">
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

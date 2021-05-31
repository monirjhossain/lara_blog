@extends('layouts.backend.app') 
@section('title','Comments');
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
                        <h1>Replied Comments</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ url('admin/comments') }}" class="active">Comments List</a></li>
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
                                <strong class="card-title">Comments Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Replied Comment</th>
                                            <th>To Comments</th> 
                                            <th>Post</th>
                                            <th>Created At</th>   
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($reply_comments as $key => $reply_comment)
                                    <tbody>
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $reply_comment->message }}</td>
                                            <td>{{ $reply_comment->comment->comment }}</td>
                                            <td><a href="{{ route('post', $reply_comment->comment->post->sulg) }}">{{ $reply_comment->comment->post->title }}</a></td>
                                            <td>{{$reply_comment->created_at->diffForHumans() }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger mb-1 " data-toggle="modal" data-target="#deleteModal-{{ $reply_comment->id }}">
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
                @foreach ($reply_comments as $reply_comment)
                <div class="modal fade" id="deleteModal-{{ $reply_comment->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" data-backdrop="static" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Delete Comment!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Do you want to delete Comment?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                document.getElementById('deleteComment-{{ $reply_comment->id }}').submit();">Confirm</button>
                                <form action="{{ route('user.reply-comment.destroy', $reply_comment->id) }}" style="display:none" id="deleteComment-{{ $reply_comment->id }}" method="POST">
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

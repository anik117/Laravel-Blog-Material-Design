@extends('layouts.backend.app')

@section('title', 'Posts')

@push('css')
    <style>
        .dt-buttons {
            display: inline-block;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">library_books</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Posts <span class="label label-rose">{{ $posts->count() }}</span></h4>
                    <a href="{{ route('admin.post.create') }}" class="btn btn-rose btn-raised "><i class="material-icons">add</i> Create A New Post</a>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover table-responsive" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Is Approved</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th><i class="material-icons">visibility</i></th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Is Approved</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th><i class="material-icons">visibility</i></th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($posts as $key=>$post)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ str_limit($post->title, '20') }}</td>
                                    <td>
                                        @if($post->is_approved == true)
                                            <span class="label label-success">Approved</span>
                                        @else
                                            <span class="label label-rose">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($post->status == true)
                                            <span class="label label-success">Published</span>
                                        @else
                                            <span class="label label-rose">Not published</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td>{{ $post->view_count }}</td>
                                    <td class="text-right">

                                        <form id="confirm_approve-{{$post->id}}" onsubmit="approvePost({{$post->id}})" action="{{ route('admin.post.approve', $post->id) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-simple btn-danger btn-fab btn-icon" type="submit">
                                                <i class="material-icons">done</i>
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-simple btn-info btn-fab btn-icon"><i class="material-icons">visibility</i></a>
                                        <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-simple btn-primary btn-fab btn-icon edit"><i class="material-icons">edit</i></a>
                                        <form id="confirm_delete-{{$post->id}}" onsubmit="deletePost({{$post->id}})" action="{{ route('admin.post.destroy', $post->id) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-simple btn-danger btn-fab btn-icon" type="submit">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-default',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },

                    {
                        extend: 'csvHtml5',
                        className: 'btn btn-default',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },

                    {
                        extend: 'pdfHtml5',
                        className: 'btn btn-default',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    }
                ]
            });

            $('.card .material-datatables label').addClass('form-group');
            $('.card .material-datatables button').addClass('btn btn-primary');
            $('.card .material-datatables .dataTables_filter').addClass('pull-right');

        });
    </script>

    <script type="text/javascript">
        function deletePost (id) {
            event.preventDefault();
            swal({
                title: 'Are you sure?',
                text: "Please click confirm to delete this item",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                reverseButtons: true,
                buttonsStyling: false
            }).then(function() {
                $("#confirm_delete-"+id).off("submit").submit();
                swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );
            }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    );
                }
            });
        }

        // approve post
        function approvePost (id) {
            event.preventDefault();
            swal({
                title: 'Are you sure?',
                text: "Please click confirm to approve this post",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                reverseButtons: true,
                buttonsStyling: false
            }).then(function() {
                $("#confirm_approve-"+id).off("submit").submit();
                swal(
                    'Approved!',
                    'Post has been approved.',
                    'success'
                );
            }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Post remains pending',
                        'info'
                    );
                }
            });
        }
    </script>
@endpush

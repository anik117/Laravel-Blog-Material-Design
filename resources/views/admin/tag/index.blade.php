@extends('layouts.backend.app')

@section('title', 'Tags')

@push('css')

@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">label</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Tags <span class="label label-rose">{{ $tags->count() }}</span></h4>
                    <a href="{{ route('admin.tag.create') }}" class="btn btn-rose btn-raised "><i class="material-icons">add</i> Create A New Tag</a>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover table-responsive" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Post count</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Post count</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($tags as $key=>$tag)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->posts->count() }}</td>
                                    <td>{{ $tag->created_at }}</td>
                                    <td>{{ $tag->updated_at }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.tag.edit', $tag->id) }}" class="btn btn-simple btn-primary btn-fab btn-icon edit"><i class="material-icons">edit</i></a>
                                        <form class="delete_me" id="confirm_delete" action="{{ route('admin.tag.destroy',$tag->id) }}" method="POST" style="display: inline-block">
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
                }

            });

            $('.card .material-datatables label').addClass('form-group');

        });


    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $( "#confirm_delete" ).submit(function( event ) {
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
                    $("#confirm_delete").off("submit").submit();
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
                })
            });
        });
    </script>
@endpush

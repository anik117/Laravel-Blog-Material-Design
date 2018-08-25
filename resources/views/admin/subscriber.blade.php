@extends('layouts.backend.app')

@section('title', 'Subscribers')

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
                    <i class="material-icons">label</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Subscribers <span class="label label-rose">{{ $subscribers->count() }}</span></h4>

                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover table-responsive" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($subscribers as $key=>$subscriber)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>{{ $subscriber->created_at }}</td>
                                    <td>{{ $subscriber->updated_at }}</td>
                                    <td class="text-right">
                                        <form id="confirm_delete-{{$subscriber->id}}" onsubmit="deleteSubscriber({{$subscriber->id}})" action="{{ route('admin.subscriber.destroy', $subscriber->id) }}" method="POST" style="display: inline-block">
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
        function deleteSubscriber (id) {
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
    </script>

@endpush

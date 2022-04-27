
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>




    <!-- appointment table data search -->

    <script>
        toastr.options.preventDuplicates = true;

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function(){

            //=====================================================Get all Appointments=============================================
            $('#service-list-table').DataTable({
            processing:false,
            info:true,
            ajax:"{{ route('admin.service.list')}}",
            "pageLength":5,
            "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
            columns:[
                // {data:'id', name:'id'},
                // {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'service_name', name:'service_name'},
                {data:'service_desc', name:'service_desc'},
                {data:'service_image', name:'service_image'},
                {data:'activeStatus', name:'activeStatus', orderable:false, searchable:false},
                {data:'actions', name:'actions', orderable:false, searchable:false},
            ]
            });



        });

    </script>

  {{-- <!-- jQuery -->
    <!-- DataTables  & Plugins -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- AdminLTE App -->

    <script>
        $(function () {
            $("#service-list-table").DataTable({
                "pageLength":5,
                // "lengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script> --}}


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

            //=====================================================Get all services data=============================================
            
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
                    // {data:'service_image', name:'service_image'},
                    {data:'activeStatus', name:'activeStatus', orderable:false, searchable:false},
                    {data:'actions', name:'actions', orderable:false, searchable:false},
                ]
            });

            //=========================================================add guest appointment===================================
            $(document).on('click','#addServiceBtn', function(){
                var service_id = $(this).data('s_id');
                //alert(service_id);

                $.post('<?= route("admin.add.service.post") ?>',{service_id:service_id, _token:'{{csrf_token()}}'}, function(data){
                    //alert(data.service_id);
                    //console.log(data.details.full_name);

                    $('.addService').find('form')[0].reset();
                    $('.addService').find('span.error-text').text('');

                    $('.addService').modal('show');
                },'json');
            });

            //=====================================================add guest appointment=====================================

            $('#add-service-form').on('submit', function(e){
                e.preventDefault();
                //alert('hello test');

                var form = this;
                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(form).find('span.error-text').text('');
                    },
                    success:function(data){
                        if(data.code == 0){
                            $.each(data.error, function(prefix, val){
                                $(form).find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else{
                            //$(form)[0].reset();
                            //alert(data.msg);
                            //console.log(data.msg);

                            $('.addService').modal('hide');
                            $('.addService').find('form')[0].reset();

                            if(data.code == 1){
                                $('#service-list-table').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                            }else{
                                toastr.error(data.msg);
                            }
                        }
                    }
                });
            });

            //===========================================================edit service details==================================================
            $(document).on('click','#editServiceBtn', function(){
              var service_id = $(this).data('id');
              //alert(service_id);

              $.post('<?= route('edit.service.details') ?>',{service_id:service_id, _token:'{{csrf_token()}}'}, function(data){

                  $('.editService').find('input[name="s_id"]').val(data.details.id);
                  $('.editService').find('textarea[name="service_desc"]').val(data.details.service_desc);
                  $('.editService').find('input[name="service_name"]').val(data.details.service_name);
                //   $('.editService').find('input[name="service_image"]').val(data.details.service_image);
                
                  $('.editService').modal('show');
              },'json');
            });

            // =============================================UPDATE COUNTRY DETAILS==============================================
            $('#update-service-form').on('submit', function(e){
                e.preventDefault();
                var form = this;
                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend: function(){
                            $(form).find('span.error-text').text('');
                    },
                    success: function(data){
                        if(data.code == 0){
                            $.each(data.error, function(prefix, val){
                                $(form).find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else{
                            $('#service-list-table').DataTable().ajax.reload(null, false);
                            $('.editService').modal('hide');
                            $('.editService').find('form')[0].reset();
                            toastr.success(data.msg);
                        }
                    }
                });
            });

            //=============================DELETE service record===========================
            $(document).on('click','#deleteServiceBtn', function(){
                var service_id = $(this).data('id');

                //alert(service_id)

                var url = '<?= route("delete.service") ?>';

                Swal.fire({
                    title:'Are you sure?',
                    html:'You want to <b>delete</b> this service',
                    showCancelButton:true,
                    showCloseButton:true,
                    cancelButtonText:'Cancel',
                    confirmButtonText:'Yes, Delete',
                    cancelButtonColor:'#d33',
                    confirmButtonColor:'#556ee6',
                    width:300,
                    allowOutsideClick:false
                }).then(function(result){
                    if(result.value){
                        $.post(url,{service_id:service_id, _token:'{{csrf_token()}}'}, function(data){
                            if(data.code == 1){
                                $('#service-list-table').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                            }else{
                                toastr.error(data.msg);
                            }
                        },'json');
                    }
                });
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

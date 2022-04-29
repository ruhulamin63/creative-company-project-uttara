
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
            
            $('#product-list-table').DataTable({
                processing:false,
                info:true,
                ajax:"{{ route('admin.product.list')}}",
                "pageLength":5,
                "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
                columns:[
                    // {data:'id', name:'id'},
                    // {data:'DT_RowIndex', name:'DT_RowIndex'},
                    {data:'product_name', name:'product_name'},
                    {data:'product_image', name:'product_image'},
                    {data:'activeStatus', name:'activeStatus', orderable:false, searchable:false},
                    {data:'actions', name:'actions', orderable:false, searchable:false},
                ]
            });

            //=========================================================add guest appointment===================================
            $(document).on('click','#addProductBtn', function(){
                var product_id = $(this).data('p_id');
                //alert(service_id);

                $.post('<?= route("admin.add.product.post") ?>',{product_id:product_id, _token:'{{csrf_token()}}'}, function(data){
                    //alert(data.service_id);
                    //console.log(data.details.full_name);

                    $('.addProduct').find('form')[0].reset();
                    $('.addProduct').find('span.error-text').text('');

                    $('.addProduct').modal('show');
                },'json');
            });

            //=====================================================add guest appointment=====================================

            $('#add-product-form').on('submit', function(e){
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

                            $('#product-list-table').DataTable().ajax.reload(null, false);
                            $('.addProduct').modal('hide');
                            $('.addProduct').find('form')[0].reset();

                            if(data.code == 1){
                                $('#product-list-table').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                            }else{
                                toastr.error(data.msg);
                            }
                        }
                    }
                });
            });

            //===========================================================edit service details==================================================
            $(document).on('click','#editProductBtn', function(){
              var product_id = $(this).data('id');
              //alert(product_id);

              $.post('<?= route('edit.product.details') ?>',{product_id:product_id, _token:'{{csrf_token()}}'}, function(data){

                  $('.editProduct').find('input[name="p_id"]').val(data.details.id);
                  $('.editProduct').find('input[name="product_name"]').val(data.details.product_name);
                  $('.editProduct').find('input[name="product_image"]').val(data.details.product_image);
                
                  $('.editProduct').modal('show');
              },'json');
            });

            // =============================================UPDATE COUNTRY DETAILS==============================================
            $('#update-product-form').on('submit', function(e){
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
                            $('#product-list-table').DataTable().ajax.reload(null, false);
                            $('.editProduct').modal('hide');
                            $('.editProduct').find('form')[0].reset();
                            toastr.success(data.msg);
                        }
                    }
                });
            });

            //=============================DELETE service record===========================
            $(document).on('click','#deleteProductBtn', function(){
                var product_id = $(this).data('p_id');

                // alert(product_id)

                var url = '<?= route("delete.product") ?>';

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
                        $.post(url,{product_id:product_id, _token:'{{csrf_token()}}'}, function(data){
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

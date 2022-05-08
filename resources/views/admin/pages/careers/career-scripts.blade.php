
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
            
            $('#career-list-table').DataTable({
                processing:false,
                info:true,
                ajax:"{{ route('admin.career.list')}}",
                "pageLength":5,
                "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
                columns:[
                    // {data:'id', name:'id'},
                    // {data:'DT_RowIndex', name:'DT_RowIndex'},
                    {data:'position_name', name:'position_name'},
                    {data:'company_name', name:'company_name'},
                    {data:'vacancy', name:'vacancy'},
                    {data:'job_type', name:'job_type'},
                    {data:'apply_date', name:'apply_date'},
                    {data:'job_context', name:'job_context'},
                    {data:'job_nature', name:'job_nature'},
                    {data:'edu_requirment', name:'edu_requirment'},
                    {data:'job_location', name:'job_location'},
                    {data:'salary_range', name:'salary_range'},
                    {data:'other_benefit', name:'other_benefit'},
                    {data:'activeStatus', name:'activeStatus', orderable:false, searchable:false},
                    {data:'actions', name:'actions', orderable:false, searchable:false},
                ]
            });

            //=========================================================add guest appointment===================================
            $(document).on('click','#addCareerBtn', function(){
                var product_id = $(this).data('p_id');
                //alert(service_id);

                $.post('<?= route("admin.add.career.post") ?>',{product_id:product_id, _token:'{{csrf_token()}}'}, function(data){
                    //alert(data.service_id);
                    //console.log(data.details.full_name);

                    $('.addCareer').find('form')[0].reset();
                    $('.addCareer').find('span.error-text').text('');

                    $('.addCareer').modal('show');
                },'json');
            });

            //=====================================================add guest appointment=====================================

            $('#add-career-form').on('submit', function(e){
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

                            $('.addCareer').modal('hide');
                            $('.addCareer').find('form')[0].reset();

                            if(data.code == 1){
                                $('#career-list-table').DataTable().ajax.reload(null, false);
                                toastr.success(data.msg);
                            }else{
                                toastr.error(data.msg);
                            }
                        }
                    }
                });
            });

            //===========================================================edit service details==================================================
            $(document).on('click','#editCareerBtn', function(){
              var career_id = $(this).data('id');
              //alert(career_id);

              $.post('<?= route('edit.career.details') ?>',{career_id:career_id, _token:'{{csrf_token()}}'}, function(data){

                // alert(data.details.position_name)

                  $('.editCareer').find('input[name="c_id"]').val(data.details.id);
                  $('.editCareer').find('input[name="position_name"]').val(data.details.position_name);
                  $('.editCareer').find('input[name="company_name"]').val(data.details.company_name);
                  $('.editCareer').find('input[name="vacancy"]').val(data.details.vacancy);
                  $('.editCareer').find('input[name="job_type"]').val(data.details.job_type);
                  $('.editCareer').find('input[name="apply_date"]').val(data.details.apply_date);
                  $('.editCareer').find('textarea[name="job_context"]').val(data.details.job_context);
                  $('.editCareer').find('input[name="job_nature"]').val(data.details.job_nature);
                  $('.editCareer').find('textarea[name="edu_requirment"]').val(data.details.edu_requirment);
                  $('.editCareer').find('input[name="job_location"]').val(data.details.job_location);
                  $('.editCareer').find('input[name="salary_range"]').val(data.details.salary_range);
                  $('.editCareer').find('input[name="other_benefit"]').val(data.details.other_benefit);
                
                  $('.editCareer').modal('show');
              },'json');
            });

            // =============================================UPDATE COUNTRY DETAILS==============================================
            $('#update-career-form').on('submit', function(e){
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
                            $('#career-list-table').DataTable().ajax.reload(null, false);
                            $('.editCareer').modal('hide');
                            $('.editCareer').find('form')[0].reset();
                            toastr.success(data.msg);
                        }
                    }
                });
            });

            //=============================DELETE service record===========================
            $(document).on('click','#deleteCareerBtn', function(){
                var career_id = $(this).data('id');

                //alert(product_id)

                var url = '<?= route("delete.career") ?>';

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
                        $.post(url,{career_id:career_id, _token:'{{csrf_token()}}'}, function(data){
                            if(data.code == 1){
                                $('#career-list-table').DataTable().ajax.reload(null, false);
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

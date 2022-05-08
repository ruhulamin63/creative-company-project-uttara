
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
        
        $('#home-table').DataTable({
            processing:false,
            info:true,
            ajax:"{{ route('admin.home.list')}}",
            "pageLength":5,
            "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
            columns:[
                // {data:'id', name:'id'},
                // {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'title', name:'title'},
                {data:'desc', name:'desc'},
                {data:'logo', name:'logo'},
                {data:'logo_name', name:'logo_name'},
                {data:'actions', name:'actions', orderable:false, searchable:false},
            ]
        });

        //=========================================================add guest appointment===================================
        $(document).on('click','#addHomeBtn', function(){
            //var c_id = $(this).data('c_id');
            //alert('test');

            $.post('<?= route("admin.add.home.post") ?>',{ _token:'{{csrf_token()}}'}, function(data){
                //alert(data.service_id);
                //console.log(data.details.full_name);

                $('.addHome').find('form')[0].reset();
                $('.addHome').find('span.error-text').text('');

                $('.addHome').modal('show');
            },'json');
        });

        //=====================================================add guest appointment=====================================

        $('#add-home-form').on('submit', function(e){
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

                            //alert('hello');
                        });
                    }else{
                        //$(form)[0].reset();
                       // alert(test);
                        //console.log(data.msg);

                        $('.addHome').modal('hide');
                        $('.addHome').find('form')[0].reset();

                        if(data.code == 1){
                            $('#home-table').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg);
                        }else{
                            toastr.error(data.msg);
                        }
                    }
                }
            });
        });

        //===========================================================edit service details==================================================
        $(document).on('click','#editHomeBtn', function(){
            var home_id = $(this).data('id');
            //alert(home_id);

            $.post('<?= route('edit.home.details') ?>',{home_id:home_id, _token:'{{csrf_token()}}'}, function(data){
            // alert(data.details.product_image);
                $('.editHome').find('input[name="home_id"]').val(data.details.id);
                $('.editHome').find('input[name="title"]').val(data.details.title);
                $('.editHome').find('input[name="logo_name"]').val(data.details.logo_name);
                $('.editHome').find('textarea[name="desc"]').val(data.details.desc);
            
                $('.editHome').modal('show');
            },'json');
        });

        // =============================================UPDATE COUNTRY DETAILS==============================================
        $('#update-home-form').on('submit', function(e){
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
                        //alert('test')
                    }else{
                        $('#home-table').DataTable().ajax.reload(null, false);
                        $('.editHome').modal('hide');
                        $('.editHome').find('form')[0].reset();
                        toastr.success(data.msg);
                    }
                }
            });
        });

        //=============================DELETE service record===========================
        $(document).on('click','#deleteHomeBtn', function(){
            var home_id = $(this).data('id');

            //alert(company_id)

            var url = '<?= route("delete.home") ?>';

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
                    $.post(url,{home_id:home_id, _token:'{{csrf_token()}}'}, function(data){
                        if(data.code == 1){
                            $('#home-table').DataTable().ajax.reload(null, false);
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

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
        
        $('#client-table').DataTable({
            processing:false,
            info:true,
            ajax:"{{ route('admin.client.list')}}",
            "pageLength":5,
            "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
            columns:[
                // {data:'id', name:'id'},
                // {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'client_image', name:'client_image'},
                {data:'actions', name:'actions', orderable:false, searchable:false},
            ]
        });

        //=========================================================add guest appointment===================================
        $(document).on('click','#addClientBtn', function(){
            var c_id = $(this).data('c_id');
            //alert('test');

            $.post('<?= route("admin.add.client.post") ?>',{company_id:c_id, _token:'{{csrf_token()}}'}, function(data){
                //alert(data.service_id);
                //console.log(data.details.full_name);

                $('.addClient').find('form')[0].reset();
                $('.addClient').find('span.error-text').text('');

                $('.addClient').modal('show');
            },'json');
        });

        //=====================================================add guest appointment=====================================

        $('#add-client-form').on('submit', function(e){
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

                        $('.addClient').modal('hide');
                        $('.addClient').find('form')[0].reset();

                        if(data.code == 1){
                            $('#client-table').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg);
                        }else{
                            toastr.error(data.msg);
                        }
                    }
                }
            });
        });

        //=============================DELETE service record===========================
        $(document).on('click','#deleteClientBtn', function(){
            var client_id = $(this).data('id');

            //alert(company_id)

            var url = '<?= route("delete.client") ?>';

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
                    $.post(url,{client_id:client_id, _token:'{{csrf_token()}}'}, function(data){
                        if(data.code == 1){
                            $('#client-table').DataTable().ajax.reload(null, false);
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
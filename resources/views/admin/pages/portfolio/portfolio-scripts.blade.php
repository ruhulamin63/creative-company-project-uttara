
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
        
        $('#portfolio-table').DataTable({
            processing:false,
            info:true,
            ajax:"{{ route('admin.portfolio.list')}}",
            "pageLength":5,
            "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
            columns:[
                // {data:'id', name:'id'},
                // {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'web_app_image', name:'web_app_image'},
                {data:'mobile_app_image', name:'mobile_app_image'},
                {data:'graphic_design_image', name:'graphic_design_image'},
                {data:'actions', name:'actions', orderable:false, searchable:false},
            ]
        });

        //=========================================================add guest appointment===================================
        $(document).on('click','#addPortfolioBtn', function(){
            //var c_id = $(this).data('c_id');
            //alert('test');

            $.post('<?= route("admin.add.portfolio.post") ?>',{ _token:'{{csrf_token()}}'}, function(data){
                //alert(data.service_id);
                //console.log(data.details.full_name);

                $('.addPortfolio').find('form')[0].reset();
                $('.addPortfolio').find('span.error-text').text('');

                $('.addPortfolio').modal('show');
            },'json');
        });

        //=====================================================add guest appointment=====================================

        $('#add-portfolio-form').on('submit', function(e){
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

                        $('.addPortfolio').modal('hide');
                        $('.addPortfolio').find('form')[0].reset();

                        if(data.code == 1){
                            $('#portfolio-table').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg);
                        }else{
                            toastr.error(data.msg);
                        }
                    }
                }
            });
        });

        //=============================DELETE service record===========================
        $(document).on('click','#deletePortfolioBtn', function(){
            var portfolio_id = $(this).data('id');

            //alert(company_id)

            var url = '<?= route("delete.portfolio") ?>';

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
                    $.post(url,{portfolio_id:portfolio_id, _token:'{{csrf_token()}}'}, function(data){
                        if(data.code == 1){
                            $('#portfolio-table').DataTable().ajax.reload(null, false);
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
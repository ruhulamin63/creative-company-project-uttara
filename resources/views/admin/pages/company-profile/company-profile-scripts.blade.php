
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
        
        $('#company-profile-table').DataTable({
            processing:false,
            info:true,
            ajax:"{{ route('admin.company.list')}}",
            "pageLength":5,
            "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
            columns:[
                // {data:'id', name:'id'},
                // {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'company_name', name:'company_name'},
                {data:'reg_no', name:'reg_no'},
                {data:'trade_licence_no', name:'trade_licence_no'},
                {data:'tagline', name:'tagline'},
                {data:'website', name:'website'},
                {data:'facebook_id', name:'facebook_id'},
                {data:'skype_id', name:'skype_id'},
                {data:'bank_account_name', name:'bank_account_name'},
                {data:'bank_name', name:'bank_name'},
                {data:'branch_name', name:'branch_name'},
                {data:'actions', name:'actions', orderable:false, searchable:false},
            ]
        });

        //=========================================================add guest appointment===================================
        $(document).on('click','#addCompanyBtn', function(){
            var c_id = $(this).data('c_id');
            //alert('test');

            $.post('<?= route("admin.add.company.post") ?>',{company_id:c_id, _token:'{{csrf_token()}}'}, function(data){
                //alert(data.service_id);
                //console.log(data.details.full_name);

                $('.addCompany').find('form')[0].reset();
                $('.addCompany').find('span.error-text').text('');

                $('.addCompany').modal('show');
            },'json');
        });

        //=====================================================add guest appointment=====================================

        $('#add-company-profile-form').on('submit', function(e){
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

                        $('.addCompany').modal('hide');
                        $('.addCompany').find('form')[0].reset();

                        if(data.code == 1){
                            $('#company-profile-table').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg);
                        }else{
                            toastr.error(data.msg);
                        }
                    }
                }
            });
        });

        //===========================================================edit service details==================================================
        $(document).on('click','#editCompanyBtn', function(){
            var company_id = $(this).data('id');
            //alert(company_id);

            $.post('<?= route('edit.company.details') ?>',{company_id:company_id, _token:'{{csrf_token()}}'}, function(data){
                //alert(company_id);
                $('.editCompany').find('input[name="company_id"]').val(data.details.id);
                $('.editCompany').find('input[name="company_name"]').val(data.details.company_name);
                $('.editCompany').find('input[name="reg_no"]').val(data.details.reg_no);
                $('.editCompany').find('input[name="trade_licence_no"]').val(data.details.trade_licence_no);
                // $('.editCompany').find('input[name="company_logo"]').val(data.details.company_logo);
                $('.editCompany').find('input[name="tagline"]').val(data.details.tagline);
                $('.editCompany').find('input[name="website"]').val(data.details.website);
                $('.editCompany').find('input[name="facebook_id"]').val(data.details.facebook_id);
                $('.editCompany').find('input[name="skype_id"]').val(data.details.skype_id);
                $('.editCompany').find('input[name="bank_account_name"]').val(data.details.bank_account_name);
                $('.editCompany').find('input[name="bank_name"]').val(data.details.bank_name);
                $('.editCompany').find('input[name="branch_name"]').val(data.details.branch_name);
            
                $('.editCompany').modal('show');
            },'json');
        });

        // =============================================UPDATE COUNTRY DETAILS==============================================
        $('#update-company-profile-form').on('submit', function(e){
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
                        $('#company-profile-table').DataTable().ajax.reload(null, false);
                        $('.editCompany').modal('hide');
                        $('.editCompany').find('form')[0].reset();
                        toastr.success(data.msg);
                    }
                }
            });
        });

        //=============================DELETE service record===========================
        $(document).on('click','#deleteCompanyBtn', function(){
            var company_id = $(this).data('id');

            //alert(company_id)

            var url = '<?= route("delete.company") ?>';

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
                    $.post(url,{company_id:company_id, _token:'{{csrf_token()}}'}, function(data){
                        if(data.code == 1){
                            $('#company-profile-table').DataTable().ajax.reload(null, false);
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
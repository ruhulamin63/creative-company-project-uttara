
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
        
        $('#about-table').DataTable({
            processing:false,
            info:true,
            ajax:"{{ route('admin.about.list')}}",
            "pageLength":5,
            "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
            columns:[
                // {data:'id', name:'id'},
                // {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'title', name:'title'},
                {data:'desc', name:'desc'},
                {data:'mission_title', name:'mission_title'},
                {data:'mission_desc', name:'mission_desc'},
                {data:'difference_title', name:'difference_title'},
                {data:'difference_desc', name:'difference_desc'},
                {data:'actions', name:'actions', orderable:false, searchable:false},
            ]
        });

        //=========================================================add guest appointment===================================
        $(document).on('click','#addAboutBtn', function(){
            //var c_id = $(this).data('c_id');
            //alert('test');

            $.post('<?= route("admin.add.about.post") ?>',{_token:'{{csrf_token()}}'}, function(data){
               
                //console.log(data.details.full_name);

                $('.addAbout').find('form')[0].reset();
                $('.addAbout').find('span.error-text').text('');

                $('.addAbout').modal('show');
            },'json');
        });

        //=====================================================add guest appointment=====================================

        $('#add-about-form').on('submit', function(e){
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

                           // alert('hello');
                        });
                    }else{
                        //$(form)[0].reset();
                       // alert(test);
                        //console.log(data.msg);

                        $('.addAbout').modal('hide');
                        $('.addAbout').find('form')[0].reset();

                        if(data.code == 1){
                            $('#about-table').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg);
                        }else{
                            toastr.error(data.msg);
                        }
                    }
                }
            });
        });

        //===========================================================edit service details==================================================
        $(document).on('click','#editAboutBtn', function(){
              var about_id = $(this).data('id');
              //alert(about_id);

              $.post('<?= route('edit.about.details') ?>',{about_id:about_id, _token:'{{csrf_token()}}'}, function(data){

                //alert(data.details.id)

                $('.editAbout').find('input[name="about_id"]').val(data.details.id);
                $('.editAbout').find('input[name="title"]').val(data.details.title);
                $('.editAbout').find('input[name="mission_title"]').val(data.details.mission_title);
                $('.editAbout').find('input[name="difference_title"]').val(data.details.difference_title);
                $('.editAbout').find('textarea[name="desc"]').val(data.details.desc);
                $('.editAbout').find('textarea[name="mission_desc"]').val(data.details.mission_desc);
                $('.editAbout').find('textarea[name="difference_desc"]').val(data.details.difference_desc);
                
                  $('.editAbout').modal('show');
              },'json');
            });

            // =============================================UPDATE COUNTRY DETAILS==============================================
            $('#update-about-form').on('submit', function(e){
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

                                //alert('test')
                            });
                        }else{
                            $('#about-table').DataTable().ajax.reload(null, false);
                            $('.editAbout').modal('hide');
                            $('.editAbout').find('form')[0].reset();
                            toastr.success(data.msg);
                        }
                    }
                });
            });

        //=============================DELETE service record===========================
        $(document).on('click','#deleteAboutBtn', function(){
            var about_id = $(this).data('id');

            //alert(company_id)

            var url = '<?= route("delete.about") ?>';

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
                    $.post(url,{about_id:about_id, _token:'{{csrf_token()}}'}, function(data){
                        if(data.code == 1){
                            $('#about-table').DataTable().ajax.reload(null, false);
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
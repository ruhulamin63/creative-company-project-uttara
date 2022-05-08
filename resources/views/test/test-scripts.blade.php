    <!--import jQuery cdn-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  
    <script>
  
        // jQuery functions to show and hide divisions
        $(document).ready(function () {
            $('input[type="checkbox"]').click(function () {
                var inputValue = $(this).attr('value');
                $("." + inputValue).toggle();
            });
        });
    </script>


     <script>
       // console.log("oij");
        $(document).ready(function(){
            $('.radio-custom-button').click(function(){
              //  console.log($(this).val());
                localStorage.setItem('step-1',$(this).val());
                //localStorage.setItem('step-2',$(this).val());

                const set_val = [
                    'red','green','blue'
                ];
                localStorage.setItem('get_array', JSON.stringify(set_val));
                const array_list = JSON.parse(localStorage.getItem('get_array'));

                console.log(array_list);


                var stp = localStorage.getItem('step-1');

                if(stp == 'red' || stp == 'green' || stp=='blue'){
                    //here will code
                    console.log("paici");
                }
            });

            $('.reset-button').click(function(){
              localStorage.clear();
            });

            // $("input[name='colorCheckbox']").change(function(){
            //     // Do something interesting here
               
            //     // var arr = [
            //     //     'step_one' => $(this).val();
            //     // ];
            //     localStorage.setItem('step-1',$(this).val());
            //     var stp = localStorage.getItem('step-1');

            //     if(stp == 'red'){
            //         //here will code
            //         console.log('paisi re');
            //     }

                
            // });
        })
    </script>
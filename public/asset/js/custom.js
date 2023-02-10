$(document).on("click", ".btnsaveajaxfile", function(e) {


    e.preventDefault();
    e.stopPropagation();




    var idform = $(this).data("idform");

    var confirmcustom = $(this).data("confirmcustom");
    var confirmtitle = $(this).data("confirmtitle");
    var goto=   $(this).data('goto');


    
    if(confirmcustom){

        $confirmcustom=  "'" + confirmcustom + "'";
    }else{
        confirmcustom='Adakah anda pasti?';
    }
   


    if(confirmtitle){

        $confirmtitle=  "'" + confirmtitle + "'";
    }else{
        confirmtitle='Adakah anda pasti?';
    }
   

    var buttonmu = $(this).val();

    var input = $("<input>")
        .attr("type", "hidden")
        .attr("name", "status-simpan").val(buttonmu);
    $("#" + idform).append(input);

    var form = $("#" + idform);




    Swal.fire({
        title: confirmtitle,
        text: confirmcustom,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {


        


            Swal.fire({
                // position: 'top-end',
                // icon: 'info',
                title: 'Sila Tunggu',
                icon: 'warning',
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false

            })

          
            var formData2 = new FormData(document.getElementById(idform));
            var actionUrl = form.attr('action');
            
            var request = $.ajax({
            //     headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
                url: actionUrl,
                method: "POST",
                data: formData2, // Must Include CSRF Token Input in Form
            });

            request.success(function( data ) {

                    
                    var datanow = JSON.parse(data);
                    var statuserror=datanow.error;
                    var status=datanow.status;

                    console.log(status);
                    $('.erromsgcs').remove();
                    $('.form-group').removeClass('has-error')
                    if(statuserror==true){
                      
                      

                        $.each(datanow.selector, function(key, msg) {
                            console.log(key);
                            if(msg) {

                                var sel="#"+idform+" textarea[name='"+key+"'],input[name='"+key+"'],select[name='"+key+"'],checkbox[name='"+key+"'],radio[name='"+key+"']";
                                $(sel).closest('.form-group').removeClass('has-success').addClass('has-error');
                            
                                var span='<span class="help-block erromsgcs">'+msg+' </span>';

                                $(span).insertAfter( $("input,select,textarea").closest(sel) );
                            
                            }
                            

                
                            


                        });
                        swal.close();

                  

                        
                    }else if(status==true){

                        var id=datanow.id;
                        window.location.href =site_url+goto+'/'+id;

                        // console.log(goto);

                        var mytbl = $("#groups").dataTable();
                        mytbl.fnDraw();

                        swal.close();
                        // $('#myModalGeneral').modal('toggle')
                        $('#myModalGeneral').modal('hide');
                        Swal.fire({
                            // position: 'top-end',
                            // icon: 'info',
                            title: 'succeeded',
                            icon: 'success',
                          
                        });
                        // location.reload();

                    }

                // if ( console && console.log ) {
                // //   console.log( "Sample of data:", data );
                // //   console.log( statuserror);
                // }
              });
        
    

        }
    })






});
<script>
    //untuk tampil customer 
$(document).ready(function(){
    getDatacustomerdivisi();
        $("#divisi").on("change",function(){
            let divisi =$(this).val();
            getCustByID(divisi);
        })

     

    })
    // UNTUK MENAMILKAN DATA DIVISI
function getDatacustomerdivisi(){
 
 $.ajax({
       url:"<?=base_url?>/customer/tampildivisicustomer",
       method:'POST',
       dataType:'json',      
       success:function(response){
             let data =``;
           $.each(response,function(key,value){
             let jenis = value.divisi;
              $("#divisi").append($('<option/>').val(jenis).html(jenis));  
           });
       
       
     }

     });
}
//END DATA DIVISI

function getCustByID(divisi){
  $.ajax({
            url:'<?= base_url; ?>/customer/getdatacustomer',
            method:"POST",
            data:{divisi:divisi},
            dataType: "json",
            beforeSend :function(){
                Swal.fire({
                // title: 'Sedang kirim Email...',
                  html: 'Please wait...',
                  allowEscapeKey: false,
                  allowOutsideClick: false,
                  didOpen: () => {
                    Swal.showLoading()
                }
                  });
              },
                success:function(result){
                    let data = {}
                    Swal.fire({
                            position: 'top-center',
                          icon: 'success',
                          title: "data customer muncul",
                        
                          }).then(
                        
                                $.each(result,function(key,value){
                                      data ={
                                          'id' : value.id_cust,
                                          'text':value.nama,
                                      }
                                    var newOption = new Option(data.text,data.id, false, false);
                                      $("#customer").append(newOption);
                                      $("#customer").select2({
                                        containerCssClass: "form-control",
                                        theme: 'bootstrap-5'
                                      });
                                }),
                              
                                )
                }
            });
}

</script>
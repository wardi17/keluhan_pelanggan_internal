<script>
    //untuk tampil customer 
$(document).ready(function(){
    getDatacustomerdivisi();
        $("#divisi").on("change",function(){
            let divisi =$(this).val();
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
                                    containerCssClass: "form-select"
                                  });
                            }),
                            getidTransaksi()
                            )
            }
            });
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

function getidTransaksi(){

let div = $("#divisi").find(":selected").val();

var currentDate = new Date();

// Format the date using moment.js
  var formattedDate = moment(currentDate).format("YYYY-MM-DD HH:mm:ss");
 
  let split =formattedDate.split("-");

  let thn = split[0].substr(2,2);
  let bln = split[1];
  let tgl = split[2];
  let rep_tgl = tgl.replace(" ","");
  let rep_tgl2 = rep_tgl.replace(":","");
  let rep_tgl3 = rep_tgl2.replace(":","");
  let id_trns =thn+"."+div+"."+rep_tgl3;
 
$("#Kode_keluhan").val(id_trns);
}
</script>
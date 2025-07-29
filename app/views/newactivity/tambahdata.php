<script>
$(document).ready(function(){


$("#Createdata").on('click',function(e){
    e.preventDefault();
    let divisi_cust = $("#divisi").find(":selected").val();
    let tgl = $("#tanggal").val();
    let tanggal = myformat(tgl);

    let kode = $("#Kode_keluhan").val();
    let customer = $("#customer").find(":selected").val();

    let atten = $("#atten").val();
    let address = $("#address").val();
    let phone = $("#phone").val();
    let type = $("#type").find(":selected").val();
    let keluhan = $("#keluhan").val();
    let penyebab = $("#penyebab").val();


        //check box mulitifel divisi
        let divisi_trk =``;
          $(".checkterkait:checked").each(function(){
            divisi_trk +=$(this).val()+ ',';
          });
        
     let str_div_trk = divisi_trk.slice(0,-1);
     
    //end


   // image toko
   const t_image1 = $('#toko_upload1').prop('files')[0];  
    const t_image2 = $('#toko_upload2').prop('files')[0];  
    const t_image3 = $('#toko_upload3').prop('files')[0]; 
    const t_image4 = $('#toko_upload3').prop('files')[0]; 
   
    //end image toko,
    let formData = new FormData();
    formData.append('tanggal_input', tanggal);
    formData.append('divisi_cust', divisi_cust);
    formData.append('kode', kode);
    formData.append('customer', customer);
    formData.append('atten', atten);      
    formData.append('address', address);
    formData.append('phone',phone);
    formData.append('type',type);
    formData.append('keluhan',keluhan);
    formData.append('penyebab',penyebab);


    formData.append('divisi_trk', str_div_trk);


    formData.append('image1', t_image1);
    formData.append('image2', t_image2);
	  formData.append('image3', t_image3);
	  formData.append('image4', t_image4);
  

    $.ajax({
      url:'<?=base_url?>/customer/tambahdatatransaksi',
      method:'POST',
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
      dataType:'json',
       success:function(result){ 
        let status = result.error;
           
              Swal.fire({
                position: 'top-center',
              icon: 'success',
              title: status,
              showConfirmButton: false,
              timer: 500000
              }); 
            location.reload();

       }
    })
  })
})
function myformat(date){
            let d = date.split('/')[0];
            let m = date.split('/')[1];
            let y = date.split('/')[2];
            let format = y + "-" + m + "-" + d;
          
            return format;
          }
</script>
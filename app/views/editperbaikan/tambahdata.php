<script>
$(document).ready(function(){


$("#Createdata").on('click',function(e){
    e.preventDefault();
    let tgl = $("#tanggal_pkn").val();
    let tanggal = myformat(tgl);

    let kode = $("#Kode_keluhan_pkn").val();
    let perbaikan = $("#perbaikan").val();
 
     
    //end


   // image toko
      let gambar1 ='';
     let gambar2 ='';
     let gambar3 ='';
     let gambar4 ='';
     const image1 = $('#perbaikan_upload1').prop('files')[0];
    
     //const auth = undefined;
     if(image1 == undefined){
      let image1_e = $("#PknImage1").attr('src');
      gambar1 =image1_e;
     }else{
      gambar1 =image1;
     }

     const image2 = $('#perbaikan_upload2').prop('files')[0];
     if(image2 == undefined){
      let image2_e = $("#PknImage2").attr('src');
      gambar2 =image2_e;
     }else{
      gambar2 = image2;
     }
     const image3 = $('#perbaikan_upload3').prop('files')[0]; 
     if(image3 == undefined){
      let image3_e = $("#PknImage3").attr('src');
      gambar3 = image3_e;
     }else{
      gambar3 = image3;
     } 
     const image4 = $('#perbaikan_upload4').prop('files')[0];  
     if(image4 == undefined){
      let image4_e = $("#PknImage4").attr('src');
      gambar4 = image4_e;
     }else{
      gambar4 = image4;
     }

   
    //end image toko,
    let formData = new FormData();
    formData.append('tanggal_perbaikan', tanggal);
    formData.append('kode', kode);
    formData.append('perbaikan',perbaikan);
    formData.append('image1_j', gambar1);
    formData.append('image2_j', gambar2);
	  formData.append('image3_j', gambar3);
	  formData.append('image4_j', gambar4);
  

    $.ajax({
      url:'<?=base_url?>/editcustperbaikan/updatedataTransaksi',
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
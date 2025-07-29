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
    let type = $("#TypeKeluhan").find(":selected").val();
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
      let gambar1 ='';
     let gambar2 ='';
     let gambar3 ='';
     let gambar4 ='';
     const image1 = $('#toko_upload1').prop('files')[0];
    
     //const auth = undefined;
     if(image1 == undefined){
      let image1_e = $("#EditImage1").attr('src');
      gambar1 =image1_e;
     }else{
      gambar1 =image1;
     }

     const image2 = $('#toko_upload2').prop('files')[0];
     if(image2 == undefined){
      let image2_e = $("#EditImage2").attr('src');
      gambar2 =image2_e;
     }else{
      gambar2 = image2;
     }
     const image3 = $('#toko_upload3').prop('files')[0]; 
     if(image3 == undefined){
      let image3_e = $("#EditImage3").attr('src');
      gambar3 = image3_e;
     }else{
      gambar3 = image3;
     } 
     const image4 = $('#toko_upload4').prop('files')[0];  
     if(image4 == undefined){
      let image4_e = $("#EditImage4").attr('src');
      gambar4 = image4_e;
     }else{
      gambar4 = image4;
     }

   
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


    formData.append('image1', gambar1);
    formData.append('image2', gambar2);
	  formData.append('image3', gambar3);
	  formData.append('image4', gambar4);
  

    $.ajax({
      url:'<?=base_url?>/editcustomer/updatedatatransaksi',
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
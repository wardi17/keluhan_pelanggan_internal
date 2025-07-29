<script>
    $(document).ready(function(){
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        let  output = (day<10 ? '0' : '') + day + '/' +
                    (month<10 ? '0' : '') + month + '/' +
                    d.getFullYear() ;

            $("#tanggal_pkn").val(output);
            $("#delete_pknimage1").hide();
            $("#delete_pknimage2").hide();
            $("#delete_pknimage3").hide();
            $("#delete_pknimage4").hide();


    const getDatePickerTitle = elem => {
  // From the label or the aria-label
          const label = elem.nextElementSibling;
          let titleText = '';
          if (label && label.tagName === 'LABEL') {
            titleText = label.textContent;
          } else {
            titleText = elem.getAttribute('aria-label') || '';
          }
          return titleText;
        }

        const elems = document.querySelectorAll('.datepicker_input');
        for (const elem of elems) {
          const datepicker = new Datepicker(elem, {
            'format': 'dd/mm/yyyy', // UK format
            title: getDatePickerTitle(elem)
          });
        }


        
//upload gambar 
$("#delete_pknimage1").on("click",function(){
    let img =$("#PknImage1").attr('src');
    let newUrl ='';
    let gambar1 = $("#PknImage1");
    gambar1.attr('src',newUrl);
    $("#delete_pknimage1").hide();
});
$("#delete_pknimage2").on("click",function(){
    let img =$("#PknImage2").attr('src');
    let gambar2 = $("#PknImage2");
    gambar2.attr('src',newUrl);
    $("#delete_pknimage2").hide();

});
$("#delete_pknimage3").on("click",function(){
    let img =$("#PknImage3").attr('src');
    let newUrl ='';
    let gambar3 = $("#PknImage3");
    gambar3.attr('src',newUrl);
    $("#delete_pknimage3").hide();

});
$("#delete_pknimage4").on("click",function(){
    let img =$("#PknImage4").attr('src');
    let newUrl ='';
    let gambar4 = $("#PknImage4");
    gambar4.attr('src',newUrl);
    $("#delete_pknimage4").hide();
});
  //end delete image
    // upload gambar
  $('#perbaikan_upload1').on('change', function () {
    $("#delete_pknimage1").show();
        let id = '#PknImage1';
        readURL(this,id);
  });
  $('#perbaikan_upload2').on('change', function () {
    $("#delete_pknimage2").show();
        let id = '#PknImage2';
        readURL(this,id);
  });
  $('#perbaikan_upload3').on('change', function () {
    $("#delete_pknimage3").show();
        let id = '#PknImage3';
        readURL(this,id);
  });
  $('#perbaikan_upload4').on('change', function () {
    $("#delete_pknimage4").show();
        let id = '#PknImage4';
        readURL(this,id);
  });

  //tAMBAH PERBAIKAN
  $("#Createdata").on('click',function(e){
    e.preventDefault();
  
    let tgl = $("#tanggal_pkn").val();
    let tanggal = myformat(tgl);
    let kode = $("#Kode_keluhan_pkn").val();
    let perbaikan = $("#perbaikan").val();
	let kodeTransaksi = $("#kode_transaksi").val();
	



   // image toko
   const t_image1 = $('#perbaikan_upload1').prop('files')[0];  
    const t_image2 = $('#perbaikan_upload2').prop('files')[0];  
    const t_image3 = $('#perbaikan_upload3').prop('files')[0]; 
    const t_image4 = $('#perbaikan_upload4').prop('files')[0]; 
   
    //end image toko,
    let formData = new FormData();
    formData.append('tanggal_perbaikan', tanggal);
    formData.append('kode', kode);
    formData.append('perbaikan',perbaikan);
    formData.append('image1_j', t_image1);
    formData.append('image2_j', t_image2);
	  formData.append('image3_j', t_image3);
	  formData.append('image4_j', t_image4);
		formData.append('kodeTransaksi', kodeTransaksi);

    $.ajax({
      url:'<?=base_url?>/custperbaikan/tambahdatatransaksi',
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

function readURL(input,id){
  
    let file = input.files[0];
    if(file){
            var reader = new FileReader();
            console.log(reader)
            reader.onload = function(){
                $(id).attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
}

</script>
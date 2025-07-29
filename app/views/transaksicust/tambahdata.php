<script>
$(document).ready(function(){


$("#Createdata").on('click',function(e){
	
    e.preventDefault();
    let tgl = $("#tanggal").val();
    let tanggal = myformat(tgl);

    let kode = $("#KodeKeluhan").val();
	let type = $("#type").find(":selected").val();
    let keluhan = $("#keluhan").val();
    let penyebab = $("#penyebab").val();
	let noTransaksi = $("#No_urut").val();
	
     //end
	/*if(type == "Please Select" && keluhan =="" && penyebab =="" || keluhan =="" || penyebab ==""  ){
	    Swal.fire({
                position: 'top-center',
              icon: 'danger',
              title: "Type  harus di pilih, keluhan dan penyebab harus di isi !!!!,
              showConfirmButton: true,
			  
              }).then(function(){
				location.reload();  
			  }); 
	}else{*/
	
	   // image toko
	   const t_image1 = $('#toko_upload1').prop('files')[0];  
		const t_image2 = $('#toko_upload2').prop('files')[0];  
		const t_image3 = $('#toko_upload3').prop('files')[0]; 
		const t_image4 = $('#toko_upload3').prop('files')[0]; 
	   
		//end image toko,
		let formData = new FormData();
		formData.append('noTransaksi',noTransaksi);
		formData.append('tanggal_input', tanggal);
		formData.append('kode', kode);
		formData.append('type',type);
		formData.append('keluhan',keluhan);
		formData.append('penyebab',penyebab);


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
			      beforeSend :function(){
                      
                       Swal.fire({
                          title: 'Loading',
                          html: 'Please wait...',
                          allowEscapeKey: false,
                          allowOutsideClick: false,
                                didOpen: () => {
                                Swal.showLoading()
                             }
                         });
                      },
			   success:function(result){ 
			  // Emailkeluhan(kode,tanggal);
				let status = result.error;
				   
					  Swal.fire({
						position: 'top-center',
					  icon: 'success',
					  title: status,
					  showConfirmButton: false,
					  timer:2000
					  }).then(function(){
						 
						  if(noTransaksi !=""){
							   window.location.replace(`<?=base_url?>/listkeluhancust/index`);
						  }else{
							location.reload();  
						  }
						//  
					  }); 
				   

			   }
			})
	
	/*}*/

  })
})
function myformat(date){
            let d = date.split('/')[0];
            let m = date.split('/')[1];
            let y = date.split('/')[2];
            let format = y + "-" + m + "-" + d;
          
            return format;
          }
		  
		  
		  
		  function Emailkeluhan(kode,tanggal){
			    $.ajax({
                    url:'<?=base_url?>/kirimdataemail/kirimemailkeluhan',
                    method:'POST',
                    data: {kode:kode},
                    dataType:'json',
                    success:function(result){
                    $("#pesan_email").val('');
                       /* Swal.fire({         
                                    position: 'top-center',
                                    icon: 'success',
                                    title: "Email berhasi di kirim",
                                }).then(function(){ 
                                    location.reload();
                                }); */
                    

                    },

                });
		  }
</script>
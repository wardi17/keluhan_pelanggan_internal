<style>
.error {
  color: red;
}

</style>


<div id="main">
<div class ="col-md-12 col-12">
  <div class="card">
    <div class="card-header">
    <h5>Registasi</h5>
    </div>
    <div class="card-content">
      <div class="card-body">
      <form  id ="registasi" class ="form form-horizontal">
        <div class="row col-md-12-col-12">
                      <div class="row col-md-12 mb-3">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                          <input type="email" id="email" class="form-control" >
						   <span id="emailError" class="error"></span>
                        </div>
                      </div>
                      <div class =" row col-md-12 mb-3">
                      <label for="nama" class="col-sm-2 col-form-label" >Nama</label>
                        <div class = "col-md-4">
                        <input type="text" id="nama" class="form-control">
						  <span id="namaError" class="error"></span>
                        </div>
                    </div>
                      <div class="row col-md-12 mb-3">
                                <label for="no_hp" class="col-sm-2 col-form-label">NO HP</label>
                               <div class="col-sm-4">
								<input type="text" id="no_hp" class="form-control" placeholder="Masukan Nomor Hp">
								<span id="noHpError" class="error"></span>
                               </div> 
                      </div>
          
          </div>

        </div>
    
                            </div>
                            <div class="col-sm-11 d-flex justify-content-end">
                                    <button  type="sumbit" name="sumbit" class="btn btn-primary me-1 mb-3" >Save</button>
									 <button type="button" class="btn btn-secondary me-1 mb-3" id="batal">Batal</button>
                                  </div>
          </form>
      </div>
    </div>
  </div>
  </div>
</div>


<script>
$(document).ready(function(){
	
	$("#no_hp").on("input",function(){
		let inputValue = $(this).val();
		   // Menghapus karakter non-digit dari nilai input
        var numericValue = inputValue.replace(/\D/g, '');

        // Memperbarui nilai input dengan hanya karakter digit
        $(this).val(numericValue);

    });
	
	$("#batal").on("click",function(e){
		goBack();
		
	});
	
	$("#registasi").submit(function(event){
		event.preventDefault();
		 
	    let email = $("#email").val();
			if (email === "") {
			  $("#emailError").text("Email harus diisi");
			  event.preventDefault(); // Menghentikan pengiriman formulir jika ada kesalahan
			} else {
			  $("#emailError").text("");
			}
		 
		 
		 
		 let nama = $("#nama").val();
		 	if (nama === "") {
			  $("#namaError").text("Nama harus diisi");
			  event.preventDefault(); // Menghentikan pengiriman formulir jika ada kesalahan
			} else {
			  $("#namaError").text("");
			}
		 
		 let no_hp = $("#no_hp").val();
		if (no_hp === "") {
			  $("#noHpError").text("No Hp harus diisi");
			  event.preventDefault(); // Menghentikan pengiriman formulir jika ada kesalahan
			} else {
			  $("#noHpError").text("");
			}




	
		if(email !=="" && nama !==""  && no_hp !==""){
		const datas ={
			  'email':email,
			  'nama':nama,
			  'noHp':no_hp,
	  
			}
        
          $.ajax({
                        url:"<?= base_url; ?>/registasicustomer/daftarcustomer",
                        type:'POST',
                        dataType:'json',
                        data :datas,
                        success:function(result){
						
							
							if(result.nilai == 0){
								let nohp1_rp = result.hp1;
								let nohp2_rp = result.hp2;
								let nama_rp = result.nama;
								let email_rp = result.email;
								
								let nohp1 = nohp1_rp.replace(/\s/g, '');
								let nohp2 = nohp2_rp.replace(/\s/g, '');
								let nama = nama_rp.replace(/\s/g, '');
								let email = email_rp.replace(/\s/g, '');
								let pesan = result.error;
								
									Swal.fire({         
                                    position: 'top-center',
                                    icon: 'info',
									showConfirmButton: false,
									html :`
									<p>${pesan}</p>
									<a href="<?= base_url;?>/whatsapp/hp1?'nama':'${nama}','email':'${email}','nohp':'${nohp2}'"><i class="fa-brands fa-whatsapp text-success"></i> ${nohp2}</a>
									</br></br>
									<p>Klik no whatsapp diatas</p>
									`,
									
                                }).then(function(){ 
                                   goBack();
                                }); 
							}else{
								
								Swal.fire({         
                                    position: 'top-center',
                                    icon: 'success',
                                    title: "Registasiberhasil",
                                }).then(function(){ 
                                   goBack();
                                });  
							}

                        }
                      });
		
		}else{

			 Swal.fire({
                            position: 'top-center',
                          icon: 'info',
                          title: "inputan tidak boleh kosong",
                          showConfirmButton: false,
                          timer: 10000
                          }); 
		}
		
		
	});
	
	
			
		$("#email").blur(function() {
			let email = $(this).val();
			if (email === "") {
			  $("#emailError").text("Email harus diisi");
			} else {
			  $("#emailError").text("");
			}
		  });
		  
		  
		  	$("#nama").blur(function() {
			let email = $(this).val();
			if (email === "") {
			  $("#namaError").text("Nama harus diisi");
			} else {
			  $("#namaError").text("");
			}
		  });
		  
		  	$("#no_hp").blur(function() {
			let email = $(this).val();
			if (email === "") {
			  $("#noHpError").text("No Hp harus diisi");
			} else {
			  $("#noHpError").text("");
			}
			
			
			
		  });
	/*batas document ready */
	
	$(document).on("click","#Apinohp1",function(e){
		e.preventDefault();
		let nama = $("#nama").val();
		let email = $("#email").val();
		let no_hp = $("#nohp").val();
			const datas ={
			  'email':email,
			  'nama':nama,
			  'nohp':no_hp
			}
        
          $.ajax({
                        url:"<?= base_url; ?>/whatsapp/hp1",
                        type:'POST',
                        dataType:'json',
                        data :datas,
						success: function(response) {
						console.log('Response dari server:', response);
						// Lakukan sesuatu dengan respons dari server di sini
					  },
					  error: function(error) {
						console.error('Error:', error);
					  }
		  });
		
	});
		
		
  function goBack(){
                window.location.replace("<?= base_url; ?>/login");
            } 
});



  
  
  
</script>
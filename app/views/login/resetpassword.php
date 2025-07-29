<style>
.error {
  color: red;
}

</style>


<div id="main">
<div class ="col-md-12 col-12">
  <div class="card">
    <div class="card-header">
    <h5>Reset Password</h5>
    </div>
    <div class="card-content">
      <div class="card-body">
      <form  id ="resetpassword" class ="form form-horizontal">
        <div class="row col-md-12-col-12">
                      <div class="row col-md-12 mb-3">
                        <label for="Email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-6">
                          <input type="email" id="email" class="form-control" >
						   <span id="emailError" class="error"></span>
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
	$("#batal").on("click",function(e){
		goBack();
		
	});
	
	$("#resetpassword").submit(function(event){
		event.preventDefault();
		
	    let email = $("#email").val();
			if (email === "") {
			  $("#emailError").text("Email harus diisi");
			  event.preventDefault(); // Menghentikan pengiriman formulir jika ada kesalahan
			} else {
			  $("#emailError").text("");
			}
		 
		 
	




	
		if(email !==""){
		const datas ={
			  'email':email,
			}
        
          $.ajax({
                        url:"<?= base_url; ?>/login/simpanrisetpassword",
                        type:'POST',
                        dataType:'json',
                        data :datas,
                        success:function(result){

							let pesan = result.error;
							if(pesan =="gagal"){
							Swal.fire({         
                                    position: 'top-center',
                                    icon: 'info',
                                    title: "Email yang anda masukan  tidak sesuai",
                                }).then(function(){ 
                                   goBack();
                                }); 
							}else{
							   Swal.fire({         
                                    position: 'top-center',
                                    icon: 'success',
                                    title:pesan,
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
	
	
  function goBack(){
                window.location.replace("<?= base_url; ?>/login");
            } 
});
</script>
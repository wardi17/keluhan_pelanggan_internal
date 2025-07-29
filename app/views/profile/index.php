<style>
.error {
  color: red;
}

</style>

<?php 
	$data = $data['user'];
	
	/* echo "<pre>";
	 print_r($data);
	 echo "</pre>";
	 die();*/
	 
	  $nama ="";
	  $email ="";
	  $passwordold="";
	  $customerid="";
	  $customername="";
	  $nohp ="";
	 foreach($data as $item){
		 $nama =$item["nama"];
		 $email =$item["email"];
		$passwordold =$item["password"];
		$nohp =$item["noHp"];
	 }
 //die(var_dump($data['user']));
 ?>
<div id="main">
<div class ="col-md-12 col-12">
  <div class="card">
    <div class="card-header">
    <h5>Edit Password</h5>
    </div>
    <div class="card-content">
      <div class="card-body">
	  <input type="hidden" class="form-control" id="pwslama" value="<?=$passwordold?>"
      <form  id ="registasi" class ="form form-horizontal">
			<div class="row col-md-12-col-12">
								<div class="row col-md-12 mb-3">
									<label for="Nama" class="col-sm-2 col-form-label">Nama</label>
									<div class="col-sm-4">
									  <input disabled type="text" id="nama" value="<?=$nama?>" class="form-control" >
									   <span id="emailError" class="error"></span>
									</div>
								  </div>
								  <div class="row col-md-12 mb-3">
									<label for="Email" class="col-sm-2 col-form-label">Email</label>
									<div class="col-sm-4">
									  <input disabled type="email" id="email"  value="<?=$email?>" class="form-control" >
									
									</div>
								  </div>
								 
									 <div class="row col-md-12 mb-3">
											<label for="no_hp" class="col-sm-2 col-form-label">NO HP</label>
										   <div class="col-sm-4">
											<input disabled type="text" id="no_hp" value="<?=$nohp?>" class="form-control" placeholder="Masukan Nomor Hp">
											<span id="noHpError" class="error"></span>
										   </div> 
									</div>
									  <div class="row col-md-12 mb-3">
											<label for="passwordold" class="col-sm-2 col-form-label">Password lama</label>
											<div class="col-sm-3">
											<span toggle="#passwordold"  style="float: right;"  class="fa fa-fw fa-eye field-icon toggle-password fa-4"></span>
											  <input type="password"  class="form-control" name ="passwordold" id="passwordold" value="" placeholder=" Password Old" required>
												 <span id="passwordold" class="error"></span>
											</div>
									</div>
								  <div class="row col-md-12 mb-3">
											<label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
											<div class="col-sm-3">
											<span toggle="#newpassword"  style="float: right;"  class="fa fa-fw fa-eye field-icon toggle-password fa-4"></span>
											  <input type="password"  class="form-control" name ="newpassword" id="newpassword" value="" placeholder=" New Password" required>
											</div>
									</div>

					  
					  
		             	<div class="col-sm-11 d-flex justify-content-end mb-5">
									<div class="btn-group">
										<button  type="button" name="sumbit" class="btn btn-primary me-1 mb-3" id="SimpanData">Save</button>
									</div>
									<div class="btn-group">
									 <button type="button" class="btn btn-secondary me-1 mb-3" id="batal">Batal</button>
									</div>
                           </div>
				
          </form>
		  </div>
      </div>

        </div>
    
       </div>
       
    </div>
  </div>
  </div>
</div>

 <script>
       $(document).ready(function(){
        $(document).on("click",".toggle-password",function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        $(document).on("click",".checkNamaDivisi_edit",function(){
          $('.checkNamaDivisi_edit').not(this).prop('checked', false); 
        });

        $(document).on("click",".checkNamaJabatan_edit",function(){
          $('.checkNamaJabatan_edit').not(this).prop('checked', false); 
        });

        let div = $("#checkdivisi").val();
        if(div !==''){
          let id_div = "#"+div;
          $(id_div).prop("checked",true);
        }
        let jab = $("#checkjabatan").val();
        if(jab !==''){
          let id_jab = "#"+jab;
          $(id_jab).prop("checked",true);
        }
      
        $("#SimpanData").on("click",function(e){
					
                    e.preventDefault();
                  
              
					
                    let  email = $("#email").val();
                    let  passold = $("#passwordold").val();
					let  pass = $("#newpassword").val();
					let passwordasli = $("#pwslama").val();
				  validasipassword(email,passold,passwordasli,pass);
					
					/* for(let cek of datahasil){
						 console.log(cek);
					 }
					
					
                 /*   $.ajax({
                       // url:"<?= base_url; ?>/user/updateuser",
                        type:'POST',
                        dataType:'json',
                        data :{nama_user:nama_user,email:email,newpassword:pass,passworlold:passold},
                        success:function(result){
						 console.log(result);
						 let pesan = result.error;
						 
                          Swal.fire({
                            position: 'top-center',
                          icon: 'success',
                          title: pesan,
                           showConfirmButton: false,
                          timer:10000
                          });
							goBack();  
						   
                          
                      
                        }
                    });*/
                });
            //end edit


		$("#passwordold").blur(function(){
			let passwordold = $(this).val();
			let email =$("#email").val();
			let passwordasli =$("#pwslama").val();
			if (passwordold === "") {
			  $("#oldeError").text("Password lama  harus diisi");
			} else{
			  //cekpassword(email,passwordold,passwordasli);
			}
		});
      });



// untuk simpan dan validsi password saat simpan

 function  validasipassword(email,passold,passwordasli,pass){

					$.ajax({
                        url:"<?= base_url; ?>/profile/cekpassword",
                        type:'POST',
                        dataType:'json',
                        data :{email:email,passwordold:passold,passwordasli:passwordasli},
                        success:function(result){
							
							let st = result.nilai;
							let pesan = result.error;
							
							if(st ==1){
								  Swal.fire({
								position: 'top-center',
								  icon: 'success',
								  title: pesan,
								   showConfirmButton: false,
								  timer:10000
								  });
							}else{
								UpdatePasswordbaru(email,pass);
							}
								
							 
							// $("#passwordold").empty().html(result);
				
                      
                        }
                    });
 }



	 function UpdatePasswordbaru(email,pass){
		
				$.ajax({
                        url:"<?= base_url; ?>/profile/updatepassword",
                        type:'POST',
                        dataType:'json',
                        data :{email:email,newpassword:pass},
                        success:function(result){
							
							let nilai = result.nilai;
							let pesan = result.error;
							
							  
							  Swal.fire({
								position: 'top-center',
							  icon: 'success',
							  title: pesan,
							  showConfirmButton: false,
							  timer:2000
							  }).then(function(){
								 
								  if(nilai ==1){
									   window.location.replace(`<?=base_url?>/logout`);
								  }else{
									location.reload();  
								  }
								//  
							  }); 

						}
				});
	 }
//end 




		function cekpassword(email,passwordold,passwordasli){
			
			//console.log(passwordold);
			     $.ajax({
                        url:"<?= base_url; ?>/profile/cekpassword",
                        type:'POST',
                        dataType:'json',
                        data :{email:email,passwordold:passwordold,passwordasli:passwordasli},
                        success:function(result){
							console.log(result);
						
							// $("#passwordold").empty().html(result);
				
                      
                        }
                    });
		}


      function goBack(){
        window.location.replace("<?= base_url; ?>/user/index");
     
      } 
  </script>
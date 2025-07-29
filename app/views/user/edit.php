
<?php 
 
      $user = $data['user'];
	//die(var_dump($user));
        $nama ='';
        $email ='';
        $pass = '';
        $div = '';
        $jab ='';
      foreach ($user as $item){
        $nama = $item['nama'];
        $email = $item['email'];
        $pass = $item['password'];
        $div = $item['divisi'];
      }
?>
<style>
.error {
  color: red;
}

</style>
  <div class="card">
    <div class="card-header">
    <button onclick="goBack()" type="button" class="btn btn-lg mb-4"><i class="fa-solid fa-chevron-left"></i></button>
    <h5>Edit Data</h5>
    </div>
    <div class="card-content">
      <div class="card-body">
      <input   type="hidden"  class="form-control" id="checkjabatan" value="<?=$jab?>">
      <input  type="hidden"  class="form-control" id="checkdivisi" value="<?=$div?>">

      <form class ="form form-horizontal"  enctype="multipart/form-data">
        <div class="row col-md-12-col-12">
                      <div class="row col-md-12 mb-3">
                                <label for="nama_user" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-3">
                                  <input type="text"  class="form-control" name ="nama_user" id="nama_user" value="<?=$nama?>" placeholder="Nama" required>
                                </div>
                        </div>
                        <div class="row col-md-12 mb-3">
                                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                               <div class="col-sm-3">
                               <input disabled type="text" class="form-control" id="Email" name ="Email" value="<?=$email?>" caria-describedby="emailHelp" placeholder="Enter email">
                               <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                               </div> 
                        </div>

                        <div class="row col-md-12 mb-3">
                                <label for="passwordold" class="col-sm-2 col-form-label">Password Old</label>
                                <div class="col-sm-3">
                                <span toggle="#passwordold"  style="float: right;"  class="fa fa-fw fa-eye field-icon toggle-password fa-4"></span>
                                  <input  type="password"  class="form-control" name ="password" id="passwordold" value="" placeholder="Password Old" required>
								  <span id="oldeError" class="error"></span>
                                </div>
                        </div>
						
						<div class="row col-md-12 mb-3">
                                <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-3">
                                <span toggle="#newpassword"  style="float: right;"  class="fa fa-fw fa-eye field-icon toggle-password fa-4"></span>
                                  <input type="password"  class="form-control" name ="newpassword" id="newpassword" value="" placeholder=" New Password" required>
                                </div>
                        </div>
                 
        

        </div>
                            </div>
                            <div class="col-sm-11 d-flex justify-content-end">
                                    <button  type="sumbit" name="sumbit" class="btn btn-primary me-1 mb-3" id="Updatedata">Update</button>
                                    <button type="button" class="btn btn-secondary me-1 mb-3" onclick="goBack()">Batal</button>
                                  </div>
          </form>
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
      
        $("#Updatedata").on("click",function(e){
      
                    e.preventDefault();
                  
                    let  nama_user = $("#nama_user").val();
                    let  email = $("#Email").val();
                    let  passold = $("#passwordold").val();
					let  pass = $("#newpassword").val();
                    $.ajax({
                        url:"<?= base_url; ?>/user/updateuser",
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
                    });
                });
            //end edit


		$("#passwordold").blur(function(){
			let passwordold = $(this).val();
			
			if (passwordold === "") {
			  $("#oldeError").text("Password lama  harus diisi");
			} else {
			  let email = $("#Email").val();
			  cekpassword(email,passwordold);
			}
		});
      });


		function cekpassword(email,passwordold){
			
			//console.log(passwordold);
			     $.ajax({
                        url:"<?= base_url; ?>/user/cekpassword",
                        type:'POST',
                        dataType:'json',
                        data :{email:email,passwordold:passwordold},
                        success:function(result){
							console.log(result)
				
                      
                        }
                    });
		}


      function goBack(){
        window.location.replace("<?= base_url; ?>/user/index");
     
      } 
    </script>
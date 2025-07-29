
<style>


table {
  border-collapse: collapse;
  width: 100%;
}

td {
  text-align: start;
}

    #toko_upload1{
    opacity: 0;
    }
    #toko_upload2{
    opacity: 0;
    }
    #toko_upload3{
    opacity: 0;
    }
    #toko_upload4{
    opacity: 0;
    }

    #perbaikan_upload1 {
        opacity: 0;
    }
    #perbaikan_upload2 {
        opacity: 0;
    }
    #perbaikan_upload3 {
        opacity: 0;
    }
    #perbaikan_upload4 {
        opacity: 0;
    }

    .box {
    width: 100px;
    height:100px;
    background: url(assets/images/image1.jpg);
    background-repeat: no-repeat;
    background-size: 100px 100px;
    }
    .box2 {
    width: 100px;
    height:100px;
    background:	#F0F8FF;
    background: url(assets/images/image2.jpg);
    background-repeat: no-repeat;
    background-size: 100px 100px;
    }
    .box3 {
    width: 100px;
    height:100px;
    background:	#F0F8FF;
    background: url(assets/images/image3.jpg);
    background-repeat: no-repeat;
    background-size: 100px 100px;
    }
    .box4 {
    width: 100px;
    height:100px;
    background:	#F0F8FF;
    background: url(assets/images/image4.jpg);
    background-repeat: no-repeat;
    background-size: 100px 100px;
    }

    .btn-space {
    margin-right: 10px;
}
</style>
<?php 
$keluhan =$data['keluhan'];
$ms_divisi =$data['ms_divisi'];
$transaksi = $data['transaksi'];
	// echo "<pre>";
	// 	print_r($transaksi);
	// 	echo "</pre>";
	// 	die();
  $Kode_keluhan ="";
  $tanggal ="";
  $div ="";
  $cust ="";
  $cust_kln ="";
  $div_trk ="";
  $atten ="";
  $address_edit ="";
  $typekln ="";
  $kecamatan ="";
  $kodepos ="";
  $phone ="";
  $nohp ="";
  $nofax ="";
  $div_tkt ="";
  $penyebab_edit ="";
  $div_trt ="";
  $keluhan_edit ="";
  $kodtransaksi ="";
  foreach($transaksi as $items){
      $Kode_keluhan =$items["KodeKeluhan"];
      $tanggal = $items["TanggalInput"]; 
      $div = $items["Divisi"];
      $cust = $items["CustomerID"];
      $cust_kln = $items["Divisi"];
      $div = $items["Divisi"];
      $div = $items["Divisi"];
      $atten =$items["Atten"];
      $address_edit = $items["Address"];
      $phone = $items["Phone"];
      $div_tkt = $items["DivisiTerkait"];
      $penyebab_edit = $items["Penyebab"];
      $keluhan_edit = $items["Keluhan"];
      $typekln = $items["TypeKeluhan"];
	  $kodtransaksi = $items["NoTransaksi"];
  }

?>
<div id="main">
<div class ="col-md-12 col-12">
  <div class="card">

    <div class="card-header">
    <button onclick="goBack()" type="button" class="btn btn-lg mb-4"><i class="fa-solid fa-chevron-left"></i></button>

    <h5>Data Keluhan <?=$kodtransaksi?></h5>
    </div>
    <div class="card-content">
			<input type="hidden" id="kode_transaksi" class="form-control" value="<?=$kodtransaksi?>">
         <input type="hidden" id="id_div" class="form-control" value="<?=$div?>">
          <input type="hidden" id="id_customer" class="form-control" value="<?=$cust?>">
          <input type="hidden" id="id_TypeKeluhan" class="form-control" value="<?=$typekln?>">
          <input type="hidden" id="check_divterkait" class="form-control" value="<?=$div_tkt?>">
      <div class="card-body">
      <form  id ="formtambah" class ="form form-horizontal">
        <div class="row col-md-12-col-12">
          <div class= "col-md-6">
               
                  <div class="row col-md-12 mb-3">
                                <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
                               <div class="col-sm-3">
                               <input disabled type="text" id="divisi" value="<?=$div?>" class="form-control">

                               </div> 
                      </div>
                      <div class="row col-md-12 mb-3">
                        <label for="text" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-4">
                          <input  disabled type="text" id="Kode_keluhan" value="<?=$Kode_keluhan?>" class="form-control">
                        </div>
                      </div>
                      <div class =" row col-md-12 mb-3">
                      <label for="tanggal" class="col-sm-2 col-form-label" >Tanggal</label>
                        <div class = "col-md-4">
                        <input disabled type="text" id="tanggal" value="<?=$tanggal?>" class="datepicker_input form-control"required>
                        </div>
                    </div>
                      <div class="row col-md-12 mb-3">
                                <label for="customer" class="col-sm-2 col-form-label">Pelanggan</label>
                               <div class="col-sm-8">
                               <input  disabled type="text" id="customer" value="<?=$cust?>" class="form-control">
                              
                               </div> 
                      </div>
                          <div class="row col-md-12 mb-3">
                                        <label for="atten" class="col-sm-2 col-form-label">Attn</label>
                                        <div class="col-sm-4">
                                          <input disabled type="text"class="form-control" value="<?=$atten?>" name ="atten" id="atten" value="" required></input>
                                        </div>
                          </div>
                          <div class="row col-md-12 mb-3">
                                        <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                        <textarea disabled  style="height:100px;" class="form-control" name ="address" id="address" required><?= htmlspecialchars($address_edit); ?></textarea>
                                        </div>
                            </div>
                           
                       
                          <div class="row col-md-12 mb-3">
                                        <label for="phone" class="col-sm-2 col-form-label">Telpon/HP</label>
                                        <div class="col-sm-6">
                                          <input disabled type="text"class="form-control" name ="phone" id="phone" value="<?=$phone?>" required></input>
                                        </div>
                          </div>
                     
                          
              </div>
          
          <div class= "col-md-6">
                          <div class="row col-md-12 mb-3">
                                        <label for="TypeKeluhan" class="col-sm-2 col-form-label">Type</label>
                                        <div class="col-sm-8">
                                        <select disabled class="form-control" id="TypeKeluhan">
                                    <?php  foreach($keluhan as $file):
                                          $kode = $file['kode_keluhan'];
                                          $nama = $file['nama_keluhan'];
                                      ?>
                                          <option value="<?= $kode ?>"><?= $nama ?></option>
                                  <?php endforeach;?> 
                                        </select>
                               </div> 
                            </div>
                            <div class="row col-md-12 mb-3">
                                        <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
                                        <div class="col-sm-8">
                                        <textarea disabled style="height:100px;" class="form-control" name ="keluhan" id="keluhan" required><?= htmlspecialchars($keluhan_edit); ?></textarea>
                                        </div>
                            </div>
                            <div class="row col-md-12 mb-3">
                                        <label for="penyebab" class="col-sm-2 col-form-label">Penyebab</label>
                                        <div class="col-sm-8">
                                        <textarea disabled style="height:100px;" class="form-control" name ="penyebab" id="penyebab" required><?= htmlspecialchars($penyebab_edit); ?></textarea>
                                        </div>
                            </div>
             
                       
                       
                      <div class="row col-md-12">
                                <label for="image_toko" class="col-sm-2 col-form-label">Foto</label>
                            <div class=" col-md-12 row mb-3">
                              <div class="col-md-3">
                                  <div class="col-md-8 row">
                                    <div class="col-md-1">  
                                    <input alt="" id="toko_upload1" type="file"  class="form-control border-0">
                                    </div>
                                    <div class="col-md-7">  
                                    <img id="tokoImage1" src="#" class="box md-3"> 
                                    <p style="cursor:pointer" id="delete_image1"class="mt-3"><i class="fa-regular fa-trash-can xl text-danger"></i></p>   
                                    </div> 
                                    
                                  </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                <input alt="" id="toko_upload2" type="file"  class="form-control border-0">
                                </div>
                                <div class="col-md-7">  
                                <img id="tokoImage2" src="#" class="box2" >    
                                <p style="cursor:pointer" id="delete_image2"class="mt-3"><i class="fa-regular fa-trash-can xl text-danger"></i></p>   
                              </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                <input alt="" id="toko_upload3" type="file"  class="form-control border-0">
                                </div>
                                <div class="col-md-7">  
                                <img id="tokoImage3" src="#" class="box3" > 
                                  <p style="cursor:pointer" id="delete_image3"class="mt-3">
                                  <i class="fa-regular fa-trash-can xl text-danger"></i></p>   
                                </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                <input alt="" id="toko_upload4" type="file"  class="form-control border-0">
                                </div>
                                <div class="col-md-7">  
                                <img id="tokoImage4" src="#" class="box4" >
                                  <p style="cursor:pointer" id="delete_image4"class="mt-3">
                                  <i class="fa-regular fa-trash-can xl text-danger"></i></p>                                 </div>                            
                              </div>
                              </div>
                              
                            </div>        
                      </div>
                </div>

                </div>
    
                        
          </form>
     
      </div>
    </div>
  </div>
  </div>

<!-- ==================================== untuk input perbaikan ================================================================= -->
<div class ="col-md-12 col-12">
<div class="card">
    <div class="card-header">
    <h5>Input Perbaikan</h5>
    </div>
    <div class="card-content">
      <div class="card-body">
      <form  id ="formtambah" class ="form form-horizontal">
        <div class="row col-md-12-col-12">
          <div class= "col-md-6">
               
                  <div class="row col-md-12 mb-3">
                                <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
                               <div class="col-sm-3">
                               <input disabled type="text" id="divisi_pkn" value="<?=$div?>" class="form-control">

                               </div> 
                      </div>
                      <div class="row col-md-12 mb-3">
                        <label for="text" class="col-sm-2 col-form-label">ID Keluhan</label>
                        <div class="col-sm-4">
                        <input  disabled type="text" id="Kode_keluhan_pkn" value="<?=$Kode_keluhan?>" class="form-control">
                        </div>
                      </div>
                      <div class =" row col-md-12 mb-3">
                      <label for="tanggal" class="col-sm-2 col-form-label" >Tanggal Keluhan</label>
                        <div class = "col-md-4">
                        <input disabled type="text" id="tanggal_kln" value="<?=$tanggal?>" class="datepicker_input form-control"required>
                        </div>
                    </div>
                      <div class="row col-md-12 mb-3">
                                <label for="customer" class="col-sm-2 col-form-label">Pelanggan</label>
                               <div class="col-sm-8">
                                <input  disabled type="text" id="customer_pkn" value="<?=$cust?>" class="form-control">
                               </div> 
                      </div>
                
                      <div class="row col-md-12 mb-3">
                                        <label for="keluhan_pkn" class="col-sm-2 col-form-label">Keluhan</label>
                                        <div class="col-sm-8">
                                        <textarea disabled style="height:100px;" class="form-control" name ="keluhan_pkn" id="keluhan_pkn" required><?= htmlspecialchars($keluhan_edit); ?></textarea>
                                        </div>
                            </div>
                            <div class="row col-md-12 mb-3">
                                        <label for="penyebab" class="col-sm-2 col-form-label">Penyebab</label>
                                        <div class="col-sm-8">
                                        <textarea disabled style="height:100px;" class="form-control" name ="penyebab" id="penyebab" required><?= htmlspecialchars($penyebab_edit); ?></textarea>
                                        </div>
                            </div>
                          
              </div>
          
          <div class= "col-md-6">
                          <div class="row col-md-12 mb-3">
                          <label for="tanggal" class="col-sm-2 col-form-label" >Tanggal Perbaikan</label>
                        <div class = "col-md-4">
                        <input disabled type="text" id="tanggal_pkn" class="datepicker_input form-control">
                        </div>
                            </div>
                            <div class="row col-md-12 mb-3">
                                        <label for="perbaikan" class="col-sm-2 col-form-label">Perbaikan</label>
                                        <div class="col-sm-8">
                                        <textarea style="height:100px;" class="form-control" name ="perbaikan" id="perbaikan" value="" required></textarea>
                                        </div>
                            </div>
                        
                        <!-- <div class="row col-md-12">
                            <div class="col-md-10">
                              <div class ="row col-md-10">
                                  <label for="direksi" class="col-sm-3 col-form-label" >Divisi Terkait</label>
                                  <div class ="col-md-8">
                                    <?php  foreach($ms_divisi as $file):
                                          $kode = $file['kode_divisi'];
                                          $nama = $file['nama_divisi'];
                                      ?>
                                          <div class="form-check form-check-inline col-md-5">
                                          <input class="form-check-input checkterkait" for ="<?=$kode?>" type="checkbox" id="divisi_tkt"name="divisi_tkt[]" value="<?=$kode?>">
                                          <label class="form-check-label" for ="<?=$kode?>" ><?=$nama?></label>
                                      </div>
                                  <?php endforeach;?> 
                                     
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                            <button type="button"id="TambahEmail" class="btn btn-primary" style="color:#FFFF;">
                              Pilih
                            </button>
                               
                            </div>
                        </div> -->
                       
                      <div class="row col-md-12">
                                <label for="image_toko" class="col-sm-2 col-form-label">Foto</label>
                            <div class=" col-md-12 row mb-3">
                              <div class="col-md-3">
                                  <div class="col-md-8 row">
                                    <div class="col-md-1">  
                                    <input alt="" id="perbaikan_upload1" type="file"  class="form-control border-0">
                                    </div>
                                    <div class="col-md-7">  
                                    <label style="cursor:pointer" id="upload-label1" for="perbaikan_upload1" class="font-weight-light text-muted">Upload</label>
                                    <img id="PknImage1" src="#" class="box md-3"> 
                                    <p style="cursor:pointer" id="delete_pknimage1"class="mt-3"><i class="fa-regular fa-trash-can xl text-danger"></i></p>   
                                    </div> 
                                    
                                  </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                <input alt="" id="perbaikan_upload2" type="file"  class="form-control border-0">
                                </div>
                                <div class="col-md-7">  
                                <label style="cursor:pointer" id="upload-label1" for="perbaikan_upload2" class="font-weight-light text-muted">Upload</label>
                                <img id="PknImage2" src="#" class="box2" >    
                                <p style="cursor:pointer" id="delete_pknimage2"class="mt-3"><i class="fa-regular fa-trash-can xl text-danger"></i></p>   
                              </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                <input alt="" id="perbaikan_upload3" type="file"  class="form-control border-0">
                                </div>
                                <div class="col-md-7">  
                                <label style="cursor:pointer" id="upload-label1" for="perbaikan_upload3" class="font-weight-light text-muted">Upload</label>
                                <img id="PknImage3" src="#" class="box3" > 
                                  <p style="cursor:pointer" id="delete_pknimage3"class="mt-3">
                                  <i class="fa-regular fa-trash-can xl text-danger"></i></p>   
                                </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                <input alt="" id="perbaikan_upload4" type="file"  class="form-control border-0">
                                </div>
                                <div class="col-md-7">  
                                <label style="cursor:pointer" id="upload-label1" for="perbaikan_upload4" class="font-weight-light text-muted">Upload</label>
                                <img id="PknImage4" src="#" class="box4" >
                                  <p style="cursor:pointer" id="delete_pknimage4"class="mt-3">
                                  <i class="fa-regular fa-trash-can xl text-danger"></i></p>                                 
								  </div>                            
                              </div>
                              </div>
                              
                            </div>
                            
                      </div>
    
        
          </div>

        </div>
    
                            </div>
                            <div class="col-sm-11 d-flex justify-content-end">
                                    <button  type="sumbit" name="sumbit" class="btn btn-primary me-1 mb-3" id="Createdata">Save</button>
                                    <button type="button" class="btn btn-secondary me-1 mb-3" onclick="goBack()" >Back</button>
                                  </div>
          </form>
      </div>
</div>
</div>
<!-- ======================================= and perbaikan ================================================================= -->
</div>




<script>
$(document).ready(function(){

  var d = new Date();
  var month = d.getMonth()+1;
  var day = d.getDate();
  let  output = (day<10 ? '0' : '') + day + '/' +
              (month<10 ? '0' : '') + month + '/' +
              d.getFullYear() ;

   // $("#tanggal").val(output);
    $("#delete_image1").hide();
    $("#delete_image2").hide();
    $("#delete_image3").hide();
    $("#delete_image4").hide();
    let val_div     =   $("#id_div").val();
    let val_id_cust =   $("#id_cust").val();
    let id_keluhan=$("#id_TypeKeluhan").val();
    let val_id_div_trt=$("#id_div_trt").val();

    $("#TypeKeluhan").val(id_keluhan);
   
    $("#divisi").val(val_div);
      let kode_kln = $("#Kode_keluhan").val();
	  let kode_trans = $("#kode_transaksi").val();
	  
    get_gambarkeluhan(kode_kln,kode_trans);
        //chcekc divisiterkait
        let div_t = $("#check_divterkait").val();
        let split_div = div_t.split(",");
          $.each(split_div,function(a,b){
              if(b !=''){
                let id_tkt ="#"+b;
                $(id_tkt).prop("checked",true);
              }
          });
        //end
        let kode = $("#Kode_keluhan").val();







  $("#clear").on('click',function(){
    window.location.href="<?=base_url?>/custperbaikan/index";
  })

});

  function myformat(date){
    let d = date.split('/')[0];
    let m = date.split('/')[1];
    let y = date.split('/')[2];
    let format = y + "-" + m + "-" + d;
   
    return format;


   
  }

          
                                  

            function goBack(){
				let kode = $("#Kode_keluhan_pkn").val();

                window.location.replace(`<?=base_url?>/listkeluhan/detailkkeluhan?KodeKeluhan=${kode}`);
            } 

      function get_gambarkeluhan(kode_kln,kode_trans){
		  
        $.ajax({
            url:'<?=base_url?>/listkeluhan/gambarkeluhan',
            method:'POST',
            data:{kode:kode_kln,kode_transaksi:kode_trans},
            dataType:'json',  
            success:function(result){
           
              $.each(result,function(key,value){
                let image1_e ="<?=base_url?>/uploads/"+value.image1_k;
                $("#tokoImage1").attr("src",image1_e);
                
                let image2_e ="<?=base_url?>/uploads/"+value.image2_k;
                $("#tokoImage2").attr("src",image2_e);

                let image3_e ="<?=base_url?>/uploads/"+value.image3_k;
                $("#tokoImage3").attr("src",image3_e);

                let image4_e ="<?=base_url?>/uploads/"+value.image4_k;
                $("#tokoImage4").attr("src",image4_e);
            
              });
        
            }
           });
      }
     
</script>
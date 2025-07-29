
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
	/*echo "<pre>";
	 	print_r($transaksi);
		echo "</pre>";
	 	die();*/


?>


	

<?php foreach($transaksi as $items){

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
	  $tglperbaikan = $items["tanggalperbaikan"];
	  $perbaikan = $items["perbaikan"];
	  
	  $image1_k = $items['image1_k'];
	  $image2_k = $items['image2_k'];
	  $image3_k = $items['image3_k'];
	  $image4_k = $items['image4_k'];
	  
	  
	  $gamabar1_k ="https://27.123.222.151:886/keluhan_pelanggan/public/uploads/".$image1_k."";
	  $gamabar2_k ="https://27.123.222.151:886/keluhan_pelanggan/public/uploads/".$image2_k."";
	  $gamabar3_k ="https://27.123.222.151:886/keluhan_pelanggan/public/uploads/".$image3_k."";
	  $gamabar4_k ="https://27.123.222.151:886/keluhan_pelanggan/public/uploads/".$image4_k."";
	  
	  
	  $image1_j = $items['image1_j'];
	  $image2_j = $items['image2_j'];
	  $image3_j = $items['image3_j'];
	  $image4_j = $items['image4_j'];
	  
	  
	  $gamabar1_j ="https://27.123.222.151:886/keluhan_pelanggan/public/uploads/".$image1_j."";
	  $gamabar2_j ="https://27.123.222.151:886/keluhan_pelanggan/public/uploads/".$image2_j."";
	  $gamabar3_j ="https://27.123.222.151:886/keluhan_pelanggan/public/uploads/".$image3_j."";
	  $gamabar4_j ="https://27.123.222.151:886/keluhan_pelanggan/public/uploads/".$image4_j."";
?>
<div id="main">
<div class ="col-md-12 col-12">
  <div class="card">

    <div class="card-header">
	<button onclick="goBack()" type="button" class="btn btn-lg"><i class="fa-solid fa-chevron-left"></i></button>
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
                                    </div>
                                    <div class="col-md-7">  
                                    <img id="Image1_Kln<?=$kodtransaksi?>" src="<?=$gamabar1_k?>" class="box md-3"> 
                                    </div> 
                                    
                                  </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                </div>
                                <div class="col-md-7">  
                                <img id="Image2_Kln<?=$kodtransaksi?>" src="<?=$gamabar2_k?>" src="#" class="box2" >    
                              </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                            
                                </div>
                                <div class="col-md-7">  
                                <img id="Image3_Kln<?=$kodtransaksi?>" src="<?=$gamabar3_k?>" class="box3" > 
                                 
                                </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                </div>
                                <div class="col-md-7">  
                                <img id="Image4_Kln<?=$kodtransaksi?>" src="<?=$gamabar4_k?>" class="box4" >
                                 </div>                            
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
    <h5>Input Perbaikan <?=$kodtransaksi?></h5>
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
                        <input disabled type="text" id="tanggal_pkn" value="<?=$tglperbaikan?>" class="datepicker_input form-control">
                        </div>
                            </div>
                            <div class="row col-md-12 mb-3">
                                        <label for="perbaikan" class="col-sm-2 col-form-label">Perbaikan</label>
                                        <div class="col-sm-8">
                                        <textarea disabled style="height:100px;" class="form-control" name ="perbaikan" id="perbaikan" value="" required> <?= htmlspecialchars($perbaikan);?></textarea>
                                        </div>
                            </div>
                        
                 
                       
                      <div class="row col-md-12">
                                <label for="image_toko" class="col-sm-2 col-form-label">Foto</label>
                            <div class=" col-md-12 row mb-3">
                              <div class="col-md-3">
                                  <div class="col-md-8 row">
                                    <div class="col-md-1">  
                                    </div>
                                    <div class="col-md-7">  
                                    <img id="PknImage1" src="<?=$gamabar1_j?>" class="box md-3"> 
                                    </div> 
                                  </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                </div>
                                <div class="col-md-7">  
                                <img id="PknImage2" src="<?=$gamabar2_j?>" class="box2" >    
                              </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                </div>
                                <div class="col-md-7">  
                                <img id="PknImage3" src="<?=$gamabar3_j?>" class="box3" > 
                                  
                                </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                </div>
                                <div class="col-md-7">  
                                <img id="PknImage4" src="<?=$gamabar4_j?>" class="box4" >
                                                               
								  </div>                            
                              </div>
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
<!-- ======================================= and perbaikan ================================================================= -->
</div>


<?php } ?>

<script>
$(document).ready(function(){

  var d = new Date();
  var month = d.getMonth()+1;
  var day = d.getDate();
  let  output = (day<10 ? '0' : '') + day + '/' +
              (month<10 ? '0' : '') + month + '/' +
              d.getFullYear() ;

   // $("#tanggal").val(output);

    let val_div     =   $("#id_div").val();
    let val_id_cust =   $("#id_cust").val();
    let id_keluhan=$("#id_TypeKeluhan").val();
    let val_id_div_trt=$("#id_div_trt").val();

    $("#TypeKeluhan").val(id_keluhan);
   
    $("#divisi").val(val_div);
      let kode_kln = $("#Kode_keluhan").val();
	  let kode_trans = $("#kode_transaksi").val();
	  
    //get_gambarkeluhan(kode_kln);
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

                window.location.replace(`<?=base_url?>/home/detail?KodeKeluhan=${kode}`);
            } 

      function get_gambarkeluhan(kode_kln){
		  
        $.ajax({
            url:'<?=base_url?>/reportviews/gambarkeluhan',
            method:'POST',
            data:{kode:kode_kln},
            dataType:'json',  
            success:function(result){
			
              $.each(result,function(key,value){
				
				  const h = value.NoTransaksi;
				  const gambar = value.datagambar;
					 
					for(let items of gambar){
						
					let image1_e ="<?=base_url?>/uploads/"+value.image1_k;
					}
				   let id = $("#Image"+h+"_Kln"+h);
				   
				
		
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
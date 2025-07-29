
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

    #upload_edit1 {
        opacity: 0;
    }
    #upload_edit2 {
        opacity: 0;
    }
    #upload_edit3 {
        opacity: 0;
    }
    #upload_edit4 {
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
$customer = $data["customer"];
	// echo "<pre>";
	// 	print_r($customer);
	// 	echo "</pre>";
	//die();
  $Kode_keluhan ="";
  $tanggal ="";
  $div ="";
  $cust ="";
  $cust_kln ="";
  $div_trk ="";
  $atten ="";
  $address_edit ="";
  $phone ="";
  $div_tkt ="";
  $typekln ="";
  $div_trt ="";
  $keluhan_edit ="";
  $penyebab_edit = "";
  $tglperbaikan ="";
  $perbaikan ="";
  foreach($transaksi as $items){
      $Kode_keluhan =$items["KodeKeluhan"];
      $tanggal = $items["TanggalInput"]; 
      $div = $items["Divisi"];
      $cust = $items["CustomerID"];
      $cust_kln = $items["Divisi"];
      $div = $items["Divisi"];
      $atten =$items["Atten"];
      $address_edit = $items["Address"];
      $phone = $items["Phone"];
      $div_tkt = $items["DivisiTerkait"];
      $typekln = $items["TypeKeluhan"];
      $keluhan_edit = $items["Keluhan"];
      $penyebab_edit = $items["Penyebab"];
      $tglperbaikan = $items["tanggalperbaikan"];
      $perbaikan = $items["perbaikan"];

  }


?>
<div id="main">
<div class ="col-md-12 col-12">
  <div class="card">

    <div class="card-header">
    <button onclick="goBack()" type="button" class="btn btn-lg mb-4"><i class="fa-solid fa-chevron-left"></i></button>

 
    </div>
    <div class="card-content">
      <div class="card-body">

      <form  id ="formtambah" class ="form form-horizontal">
        <div class="row col-md-12-col-12">
          <div class= "col-md-6">
          <input type="hidden" id="id_div" class="form-control" value="<?=$div?>">
          <input type="hidden" id="id_customer" class="form-control" value="<?=$cust?>">
          <input type="hidden" id="id_TypeKeluhan" class="form-control" value="<?=$typekln?>">
          <input type="hidden" id="check_divterkait" class="form-control" value="<?=$div_tkt?>">

                  <div class="row col-md-12 mb-3">
                                <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
                               <div class="col-sm-3">
                               <input disabled type="text" id="divisi_pkn" value="<?=$div?>" class="form-control">

                               </div> 
                      </div>
                      <div class="row col-md-12 mb-3">
                        <label for="text" class="col-sm-2 col-form-label">Kode Keluhan</label>
                        <div class="col-sm-4">
                          <input  disabled type="text" id="Kode_keluhan" class="form-control" value="<?=$Kode_keluhan?>">
                        </div>
                      </div>
                      <div class =" row col-md-12 mb-3">
                      <label for="tanggal" class="col-sm-2 col-form-label" >Tanggal</label>
                        <div class = "col-md-4">
                        <input disabled value="<?=$tanggal?>" type="text" id="tanggal" class="datepicker_input form-control"required>
                        </div>
                    </div>
                      <div class="row col-md-12 mb-3">
                                <label for="customer" class="col-sm-2 col-form-label">Pilih Pelanggan</label>
                               <div class="col-sm-8">
                               <select disabled class="form-control" id="customer">
                               <?php  foreach($customer as $file):
                                          $kode = $file['id_cust'];
                                          $nama = $file['nama'];
                                      ?>
                                          <option value="<?= $kode ?>"><?= $nama ?></option>
                                  <?php endforeach;?> 
                                        </select>
                               </div> 
                      </div>
                          <div class="row col-md-12 mb-3">
                                        <label for="atten" class="col-sm-2 col-form-label">Attn</label>
                                        <div class="col-sm-4">
                                          <input disabled type="text"class="form-control" name ="atten" id="atten" value="<?=$atten?>" required></input>
                                        </div>
                          </div>
                          <div class="row col-md-12 mb-3">
                                        <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                        <textarea disabled style="height:100px;" class="form-control" name ="address" id="address" required><?= htmlspecialchars($address_edit); ?> </textarea>
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
                                        <option selected="selected">Please Select </option>
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
                                        <textarea disabled style="height:100px;" class="form-control" name ="keluhan" id="keluhan" value=""><?= htmlspecialchars($keluhan_edit); ?></textarea>
                                        </div>
                            </div>
                            <div class="row col-md-12 mb-3">
                                        <label for="penyebab" class="col-sm-2 col-form-label">Penyebab</label>
                                        <div class="col-sm-8">
                                        <textarea disabled style="height:100px;" class="form-control" name ="penyebab" id="penyebab" required><?= htmlspecialchars($penyebab_edit); ?></textarea>
                                        </div>
                            </div>
             
                        <div class="row col-md-12">
                            <div class="col-md-10">
                              <div class ="row col-md-10">
                                  <label for="direksi" class="col-sm-3 col-form-label" >Divisi Terkait</label>
                                  <div class ="col-md-8">
                                    <?php  foreach($ms_divisi as $file):
                                          $kode = $file['kode_divisi'];
                                          $nama = $file['nama_divisi'];
                                      ?>
                                          <div class="form-check form-check-inline col-md-5">
                                          <input disabled class="form-check-input checkterkait" for ="<?=$kode?>" type="checkbox" id="<?=$kode?>"name="divisi_tkt[]" value="<?=$kode?>">
                                          <label class="form-check-label" for ="<?=$kode?>" ><?=$nama?></label>
                                      </div>
                                  <?php endforeach;?> 
                                     
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <button type="button" id="open-viewemail" class="btn btn-primary" style="color:#FFFF;">
                                ViewEmail
                              </button>
                            </div>
                        </div>
                       
                      <div class="row col-md-12">
                                <label for="image_toko" class="col-sm-2 col-form-label">Foto</label>
                            <div class=" col-md-12 row mb-3">
                              <div class="col-md-3">
                                  <div class="col-md-8 row">
                                   
                                    <div class="col-md-7">  
                                    <img id="EditImage1" src="#" class="box md-3"> 
                                    </div> 
                                    
                                  </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                               
                                <div class="col-md-7">  
                                <img id="EditImage2" src="#" class="box2" >    
                              </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                              
                                <div class="col-md-7">  
                                <img id="EditImage3" src="#" class="box3" > 
                                </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                              
                                <div class="col-md-7">  
                                <img id="EditImage4" src="#" class="box4" >
                                </div>                            
                              </div>
                              </div>
                              
                            </div>
                            
                      </div>
    
                        <!-- <div class="row col-md-12 mb-3">  
                                <label for="ket" class="col-sm-2 col-form-label">Catatan</label>
                                <div class="col-sm-8">
                                  <textarea  style="height:100px;" maxlength="500" type="text" class="form-control"  name="ket" id="ket" value="" required> </textarea>
                                </div>
                        </div> -->
          </div>

        </div>
    
                            </div>
                          
          </form>
      </div>
    </div>
  </div>
<!-- ==================================== untuk input perbaikan ================================================================= -->
<div class ="col-md-12 col-12">
<div class="card">
    <div class="card-header">
    <h5> Edit Perbaikan</h5>
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
                        <input type="text" id="tanggal_pkn" value="<?=$tglperbaikan?>" class="datepicker_input form-control">
                        </div>
                            </div>
                            <div class="row col-md-12 mb-3">
                                        <label for="perbaikan" class="col-sm-2 col-form-label">Perbaikan</label>
                                        <div class="col-sm-8">
                                        <textarea style="height:100px;" class="form-control" name ="perbaikan" id="perbaikan" value="" required><?= htmlspecialchars($perbaikan); ?></textarea>
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
                            </div> --
                           
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
                                  <i class="fa-regular fa-trash-can xl text-danger"></i></p>                                 </div>                            
                              </div>
                              </div>
                              
                            </div>
                            
                      </div>
    
        
          </div>

        </div>
    
                            </div>
                            <div class="col-sm-11 d-flex justify-content-end">
                                    <button  type="sumbit" name="sumbit" class="btn btn-primary me-1 mb-3" id="Createdata">Save</button>
                                    <button type="button" class="btn btn-secondary me-1 mb-3" onclick="goBack();">Batal</button>
                                  </div>
          </form>
      </div>
</div>
</div>
<!-- ======================================= and perbaikan ================================================================= -->

  </div>
</div>




<script>
$(document).ready(function(){

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

        let id_keluhan=$("#id_TypeKeluhan").val();
        $("#TypeKeluhan").val(id_keluhan);

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

        let id_customer = $("#id_customer").val();

        $("#customer").val(id_customer);
        $("#customer").select2();

       let kode_kln= $("#Kode_keluhan").val();
       getgamabar(kode_kln);
       getgambarperbaikan(kode_kln);


       //upload gambar 
          $("#delete_pknimage1").on("click",function(){
              let img =$("#PknImage1").attr('src');
              let newUrl ='';
              let gambar1 = $("#PknImage1");
              gambar1.attr('src',newUrl);
              $("#delete_pknimage1").hide();
          });
          $("#perbaikan_upload2").on("click",function(){
              let img =$("#PknImage2").attr('src');
              let gambar2 = $("#PknImage2");
              gambar2.attr('src',newUrl);
              $("#perbaikan_upload2").hide();

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


        //end upload gambar
  });

  function goBack(){
                window.location.replace("<?=base_url?>/listperbaikan/index");
            } 


      
    function getgamabar(kode_kln){
    
      $.ajax({
            url:'<?=base_url?>/listkeluhan/gambarkeluhan',
            method:'POST',
            data:{kode:kode_kln},
            dataType:'json',  
            success:function(result){
           
              $.each(result,function(key,value){
                let image1_e ="<?=base_url?>/uploads/"+value.image1_k;
                $("#EditImage1").attr("src",image1_e);
                
                let image2_e ="<?=base_url?>/uploads/"+value.image2_k;
                $("#EditImage2").attr("src",image2_e);

                let image3_e ="<?=base_url?>/uploads/"+value.image3_k;
                $("#EditImage3").attr("src",image3_e);

                let image4_e ="<?=base_url?>/uploads/"+value.image4_k;
                $("#EditImage4").attr("src",image4_e);
            
              });
        
            }
          });
     }


     //gambar perbaikan
      function getgambarperbaikan(kode_kln){
        $.ajax({
            url:'<?=base_url?>/listperbaikan/gambarperbaikan',
            method:'POST',
            data:{kode:kode_kln},
            dataType:'json',  
            success:function(result){
              $.each(result,function(key,value){
                let image1_e ="<?=base_url?>/uploads/"+value.image1_j;
                $("#PknImage1").attr("src",image1_e);
                
                let image2_e ="<?=base_url?>/uploads/"+value.image2_j;
                $("#PknImage2").attr("src",image2_e);

                let image3_e ="<?=base_url?>/uploads/"+value.image3_j;
                $("#PknImage3").attr("src",image3_e);

                let image4_e ="<?=base_url?>/uploads/"+value.image4_j;
                $("#PknImage4").attr("src",image4_e);
            
              });
        
            }
          });
      }

     //end gambar perbaikan

        function readURL(input,id){
            let file = input.files[0];
            if(file){
                    var reader = new FileReader();
        
                    reader.onload = function(){
                        $(id).attr("src",reader.result);
                    }
                    reader.readAsDataURL(file);
                }
        }
</script>
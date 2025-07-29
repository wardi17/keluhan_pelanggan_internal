
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


option{
  font-family: Helvetica !important;
  line-height: 1.0 !important;
  /* margin-bottom: 0;
  padding-bottom: calc(.375rem + 1px);
  padding-top: calc(.375rem + 1px); */
}
</style>
<?php 
$keluhan =$data['keluhan'];
$ms_divisi =$data['ms_divisi'];
$transaksi = $data['transaksi'];
$customer = $data["customer"];
$cusdivisi = $data["divisi_cust"];
	// echo "<pre>";
	// 	print_r($cusdivisi);
	// 	echo "</pre>";
	// die();
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
  }

//die(var_dump($cust))
?>
<div id="main">
<div class ="col-md-12 col-12">
  <div class="card">
    <div class="card-header">
    <button onclick="goBack()" type="button" class="btn btn-lg mb-4"><i class="fa-solid fa-chevron-left"></i></button>
    <h5>Edit Keluhan Pelanggan</h5>
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
                               <select class="form-control" id="divisi">
                               <?php  foreach($cusdivisi as $file):
                                          $nama = $file['divisi'];
                                      ?>
                                          <option value="<?= $nama ?>"><?= $nama ?></option>
                                  <?php endforeach;?> 
                                        </select>
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
                        <input value="<?=$tanggal?>" type="text" id="tanggal" class="datepicker_input form-control"required>
                        </div>
                    </div>
                      <div class="row col-md-12 mb-3">
                                <label for="customer" class="col-sm-2 col-form-label">Pilih Pelanggan</label>
                               <div class="col-sm-8">
                               <select class="form-control" id="customer">
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
                                          <input type="text"class="form-control" name ="atten" id="atten" value="<?=$atten?>" required></input>
                                        </div>
                          </div>
                          <div class="row col-md-12 mb-3">
                                        <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                        <textarea style="height:100px;" class="form-control" name ="address" id="address" required><?= htmlspecialchars($address_edit); ?> </textarea>
                                        </div>
                            </div>
                         
                        
                          <div class="row col-md-12 mb-3">
                                        <label for="phone" class="col-sm-2 col-form-label">Telpon/HP</label>
                                        <div class="col-sm-6">
                                          <input type="text"class="form-control" name ="phone" id="phone" value="<?=$phone?>" required></input>
                                        </div>
                          </div>
                        
                          
              </div>
          
          <div class= "col-md-6">
                          <div class="row col-md-12 mb-3">
                                        <label for="TypeKeluhan" class="col-sm-2 col-form-label">Type</label>
                                        <div class="col-sm-8">
                                        <select class="form-control" id="TypeKeluhan">
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
                                        <textarea style="height:100px;" class="form-control" name ="keluhan" id="keluhan" value=""><?= htmlspecialchars($keluhan_edit); ?></textarea>
                                        </div>
                            </div>
                            <div class="row col-md-12 mb-3">
                                        <label for="penyebab" class="col-sm-2 col-form-label">Penyebab</label>
                                        <div class="col-sm-8">
                                        <textarea  style="height:100px;" class="form-control" name ="penyebab" id="penyebab" required><?= htmlspecialchars($penyebab_edit); ?></textarea>
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
                                          <input class="form-check-input checkterkait" for ="<?=$kode?>" type="checkbox" id="<?=$kode?>"name="divisi_tkt[]" value="<?=$kode?>">
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
                                    <label style="cursor:pointer" id="upload-label1" for="toko_upload1" class="font-weight-light text-muted">Upload</label>
                                    <img id="EditImage1" src="#" class="box md-3"> 
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
                                <label style="cursor:pointer" id="upload-label1" for="toko_upload2" class="font-weight-light text-muted">Upload</label>
                                <img id="EditImage2" src="#" class="box2" >    
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
                                <label style="cursor:pointer" id="upload-label1" for="toko_upload3" class="font-weight-light text-muted">Upload</label>
                                <img id="EditImage3" src="#" class="box3" > 
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
                                <label style="cursor:pointer" id="upload-label1" for="toko_upload4" class="font-weight-light text-muted">Upload</label>
                                <img id="EditImage4" src="#" class="box4" >
                                  <p style="cursor:pointer" id="delete_image4"class="mt-3">
                                  <i class="fa-regular fa-trash-can xl text-danger"></i></p>                                 </div>                            
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
                            <div class="col-sm-11 d-flex justify-content-end">
                                    <button  type="sumbit" name="sumbit" class="btn btn-primary me-1 mb-3" id="Createdata">Save</button>
                                    <button type="button" class="btn btn-secondary me-1 mb-3" onclick="goBack();">Batal</button>
                                  </div>
          </form>
      </div>
    </div>
  </div>
  </div>
</div>




<script>
$(document).ready(function(){
  $("#customer").select2({
          containerCssClass: "form-control",
          theme: 'bootstrap-5'
        });
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
        let id_div = $("#id_div").val();
        $("#divisi").val(id_div);

        let id_customer = $("#id_customer").val();
        $("#customer").val(id_customer).trigger("change");
        //alert(id_customer)
        //$("#customer").val(id_customer);
     

       let kode_kln= $("#Kode_keluhan").val();
       getgamabar(kode_kln);


       //upload gambar 
          $("#delete_image1").on("click",function(){
              let img =$("#EditImage1").attr('src');
              let newUrl ='';
              let gambar1 = $("#EditImage1");
              gambar1.attr('src',newUrl);
              $("#delete_image1").hide();
          });
          $("#delete_image2").on("click",function(){
              let img =$("#EditImage2").attr('src');
              let gambar2 = $("#EditImage2");
              gambar2.attr('src',newUrl);
              $("#delete_image2").hide();

          });
          $("#delete_image3").on("click",function(){
              let img =$("#EditImage3").attr('src');
              let newUrl ='';
              let gambar3 = $("#EditImage3");
              gambar3.attr('src',newUrl);
              $("#delete_image3").hide();

          });
          $("#delete_image4").on("click",function(){
              let img =$("#EditImage4").attr('src');
              let newUrl ='';
              let gambar4 = $("#EditImage4");
              gambar4.attr('src',newUrl);
              $("#delete_image4").hide();
          });
            //end delete image
              // upload gambar
            $('#toko_upload1').on('change', function () {
              $("#delete_image1").show();
                  let id = '#EditImage1';
                  readURL(this,id);
            });
            $('#toko_upload2').on('change', function () {
              $("#delete_image2").show();
                  let id = '#EditImage2';
                  readURL(this,id);
            });
            $('#toko_upload3').on('change', function () {
              $("#delete_image3").show();
                  let id = '#EditImage3';
                  readURL(this,id);
            });
            $('#toko_upload4').on('change', function () {
              $("#delete_image4").show();
                  let id = '#EditImage4';
                  readURL(this,id);
            });


        //end upload gambar
  });

  function goBack(){
                window.location.replace("<?=base_url?>/listkeluhan/index");
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
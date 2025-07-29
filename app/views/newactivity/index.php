
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
?>
<div id="main">
   <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
<div class ="col-md-12 col-12">
  <div class="card">
    <div class="card-header">
    <h5>Keluhan Pelanggan</h5>
    </div>
    <div class="card-content">
      <div class="card-body">
      <form  id ="formtambah" class ="form form-horizontal">
        <div class="row col-md-12-col-12">
          <div class= "col-md-6">
               
                  <div class="row col-md-12 mb-3">
                                <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
                               <div class="col-sm-3">
                               <select class="form-control" id="divisi">
                               <option selected>Please Select</option>
                               </select>
                               </div> 
                      </div>
                      <div class="row col-md-12 mb-3">
                        <label for="text" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-4">
                          <input  disabled type="text" id="Kode_keluhan" class="form-control">
                        </div>
                      </div>
                      <div class =" row col-md-12 mb-3">
                      <label for="tanggal" class="col-sm-2 col-form-label" >Tanggal</label>
                        <div class = "col-md-4">
                        <input type="text" id="tanggal" class="datepicker_input form-control"required>
                        </div>
                    </div>
                      <div class="row col-md-12 mb-3">
                                <label for="customer" class="col-sm-2 col-form-label">Pelanggan</label>
                               <div class="col-sm-8">
                               <select class="js-example-basic-multiple js-states form-control" id="customer">
                               <option selected>Please Select</option>
                               </select>
                               </div> 
                      </div>
                          <div class="row col-md-12 mb-3">
                                        <label for="atten" class="col-sm-2 col-form-label">Attn</label>
                                        <div class="col-sm-4">
                                          <input type="text"class="form-control" name ="atten" id="atten" value="" required></input>
                                        </div>
                          </div>
                          <div class="row col-md-12 mb-3">
                                        <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                        <textarea style="height:100px;" class="form-control" name ="address" id="address" value="" required></textarea>
                                        </div>
                            </div>
                           
                       
                          <div class="row col-md-12 mb-3">
                                        <label for="phone" class="col-sm-2 col-form-label">Telpon/HP</label>
                                        <div class="col-sm-6">
                                          <input type="text"class="form-control" name ="phone" id="phone" value="" required></input>
                                        </div>
                          </div>
                     
                          
              </div>
          
          <div class= "col-md-6">
                          <div class="row col-md-12 mb-3">
                                        <label for="type" class="col-sm-2 col-form-label">Type</label>
                                        <div class="col-sm-8">
                                        <select class="form-control" id="type">
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
                                        <textarea style="height:100px;" class="form-control" name ="keluhan" id="keluhan" value="" required></textarea>
                                        </div>
                            </div>
                            <div class="row col-md-12 mb-3">
                                        <label for="penyebab" class="col-sm-2 col-form-label">Penyebab</label>
                                        <div class="col-sm-8">
                                        <textarea style="height:100px;" class="form-control" name ="penyebab" id="penyebab" value="" required></textarea>
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
                                <label style="cursor:pointer" id="upload-label1" for="toko_upload2" class="font-weight-light text-muted">Upload</label>
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
                                <label style="cursor:pointer" id="upload-label1" for="toko_upload3" class="font-weight-light text-muted">Upload</label>
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
                                <label style="cursor:pointer" id="upload-label1" for="toko_upload4" class="font-weight-light text-muted">Upload</label>
                                <img id="tokoImage4" src="#" class="box4" >
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
                                    <button type="button" class="btn btn-secondary me-1 mb-3" id="clear">Clear</button>
                                  </div>
          </form>
      </div>
    </div>
  </div>
  </div>
</div>




<script>
$(document).ready(function(){

  var d = new Date();
  var month = d.getMonth()+1;
  var day = d.getDate();
  let  output = (day<10 ? '0' : '') + day + '/' +
              (month<10 ? '0' : '') + month + '/' +
              d.getFullYear() ;

    $("#tanggal").val(output);
    $("#delete_image1").hide();
    $("#delete_image2").hide();
    $("#delete_image3").hide();
    $("#delete_image4").hide();


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
$("#delete_image1").on("click",function(){
    let img =$("#tokoImage1").attr('src');
    let newUrl ='';
    let gambar1 = $("#tokoImage1");
    gambar1.attr('src',newUrl);
    $("#delete_image1").hide();
});
$("#delete_image2").on("click",function(){
    let img =$("#tokoImage2").attr('src');
    let gambar2 = $("#tokoImage2");
    gambar2.attr('src',newUrl);
    $("#delete_image2").hide();

});
$("#delete_image3").on("click",function(){
    let img =$("#tokoImage3").attr('src');
    let newUrl ='';
    let gambar3 = $("#tokoImage3");
    gambar3.attr('src',newUrl);
    $("#delete_image3").hide();

});
$("#delete_image4").on("click",function(){
    let img =$("#tokoImage4").attr('src');
    let newUrl ='';
    let gambar4 = $("#tokoImage4");
    gambar4.attr('src',newUrl);
    $("#delete_image4").hide();
});
  //end delete image
    // upload gambar
  $('#toko_upload1').on('change', function () {
    $("#delete_image1").show();
        let id = '#tokoImage1';
        readURL(this,id);
  });
  $('#toko_upload2').on('change', function () {
    $("#delete_image2").show();
        let id = '#tokoImage2';
        readURL(this,id);
  });
  $('#toko_upload3').on('change', function () {
    $("#delete_image3").show();
        let id = '#tokoImage3';
        readURL(this,id);
  });
  $('#toko_upload4').on('change', function () {
    $("#delete_image4").show();
        let id = '#tokoImage4';
        readURL(this,id);
  });


//end upload gambar


  $("#clear").on('click',function(){
    window.location.replace("<?= base_url; ?>/customer/index");
  })

});





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
 
            reader.onload = function(){
                $(id).attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
}

</script>
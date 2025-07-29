
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
#type option{
	font-size:10px;

</style>
<?php 
$keluhan =$data['keluhan'];
$transaksi =$data['transaksi'];
 /*echo "<pre>";
	 	print_r($transaksi);
	 	echo "</pre>";
		die();*/
  $NoTransaksi ="";
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
  $tgljawaban ="";
  $jawaban ="";
  $jml_trns ="";
  foreach($transaksi as $items){
	  $NoTransaksi = $items['NoTransaksi'];
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
	  $tgljawaban = $items["tanggalperbaikan"];
	   $jawaban = $items["perbaikan"];
	    $jml_trns = $items["jumlah_transaksi"];
  }

?>
<div id="main">
  <div class="card">
    <div class="card-header">
     
	 <h5> <button onclick="goBack()" type="button" class="btn btn-lg"><i class="fa-solid fa-chevron-left"></i></button>
	 Detail keluhan <?=$NoTransaksi?></h5>
    </div>
    <div class="card-content">
	<input  disabled type="hidden" id="jml_transaksi" value="<?=$jml_trns?>" class="form-control">
	<input  disabled type="hidden" id="NoTransaksi" value="<?=$NoTransaksi?>" class="form-control">
	<input  disabled type="hidden" id="Kode_keluhan" value="<?=$Kode_keluhan?>" class="form-control">
	          <input type="hidden" id="id_TypeKeluhan" class="form-control" value="<?=$typekln?>">
      <div class="card-body">
      <form  id ="formtambah" class ="form form-horizontal">
        <div class="row col-md-12-col-12">
		   
		   <input hidden type="text" id="tanggal" class="datepicker_input form-control"required>
          
          <div class= "col-md-6">
                          <div class="row col-md-12 mb-3">
                                        <label for="type" class="col-sm-2 col-form-label">Type</label>
                                        <div class="col-sm-8">
                                        <select disabled  class="form-control" id="type">

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
                                        <textarea disabled style="height:100px;" class="form-control" name ="keluhan" id="keluhan" value="" ><?= htmlspecialchars($keluhan_edit); ?></textarea>
                                        </div>
                            </div>
                            <div class="row col-md-12 mb-3">
                                        <label for="penyebab" class="col-sm-2 col-form-label">Penyebab</label>
                                        <div class="col-sm-8">
                                        <textarea disabled style="height:100px;" class="form-control" name ="penyebab" id="penyebab" value=""><?= htmlspecialchars($keluhan_edit); ?></textarea>
                                        </div>
                            </div>
             
                    
                       
                     <div class="row col-md-12">
                                <label for="image_toko" class="col-sm-2 col-form-label">Foto</label>
                            <div class=" col-md-12 row mb-3">
                              <div class="col-md-3 mt-3">
                                  <div class="col-md-8 row">
                                    <div class="col-md-1">  
                                    <input alt="" id="toko_upload1" type="file"  class="form-control border-0">

                                    </div>
                                    <div class="col-md-7 mb-3">  
                                    <img id="tokoImage1" src="#" class="box md-3"> 
                                    </div> 
                                    
                                  </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                           
                                </div>
                                <div class="col-md-7 mb-3">  
                                <img id="tokoImage2" src="#" class="box2" >    
                              </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  

                                </div>
                                <div class="col-md-7 mb-3">  
                              
                                <img id="tokoImage3" src="#" class="box3" > 
                                  <p style="cursor:pointer" id="delete_image3"class="mt-3">
                                </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                </div>
                                <div class="col-md-7 mb-3">  
                                <img id="tokoImage4" src="#" class="box4" > <p style="cursor:pointer" id="delete_image4"class="mt-3">

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

</div>
<!-- ==================================== untuk input perbaikan ================================================================= -->
<div class="card">
    <div class="card-header">
    <h5> Jawaban Perbaikan</h5>
    </div>
    <div class="card-content">
      <div class="card-body">
      <form  id ="formtambah" class ="form form-horizontal">
        <div class="row col-md-12-col-12">
         
                         <!-- <div class="row col-md-12 mb-3">
                          <label for="tanggal" class="col-sm-2 col-form-label" >Tanggal</label>
                        <div class = "col-md-4">
                        <input disabled type="text" id="tanggal_pkn" value="<?=$tgljawaban?>" class="datepicker_input form-control">
                        </div> -->
                            </div>
                            <div class="row col-md-12 mb-3">
                                        <label for="perbaikan" class="col-sm-2 col-form-label">Perbaikan</label>
                                        <div class="col-sm-8">
                                        <textarea disabled style="height:100px;" class="form-control" name ="perbaikan" id="perbaikan" value="" required><?= htmlspecialchars($jawaban); ?></textarea>
                                        </div>
                            </div>
                        

                       
                      <div class="row col-md-12">
                                <label for="image_toko" class="col-sm-2 col-form-label">Foto</label>
                            <div class=" col-md-12 row mb-3">
                              <div class="col-md-3">
                                  <div class="col-md-8 row">
                                    <div class="col-md-1">  

                                    </div>
                                    <div class="col-md-7 mb-3">  
                                    <img id="PknImage1" src="#" class="box md-3"> 
                                    </div> 
                                    
                                  </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                             
                                </div>
                                <div class="col-md-7 mb-3">  
                                <img id="PknImage2" src="#" class="box2" >
                              </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                </div>
                                <div class="col-md-7 mb-3">  

                                <img id="PknImage3" src="#" class="box3" > 
                                </div>                            
                              </div>
                              </div>
                              <div class="col-md-3">
                              <div class="col-md-8 row">
                                <div class="col-md-1">  
                                </div>
                                <div class="col-md-7 mb-3">  
                                <img id="PknImage4" src="#" class="box4" >
								  </div>                            
                              </div>
                              </div>
                              
                            </div>
                      </div>
				</div>
					<div class="col-sm-11 d-flex justify-content-end mb-5">
									
									<div class="btn-group">
                                    <button type="button" class="btn btn-secondary me-1 mb-3" onclick="goBack()">Back</button>
                                  </div>
						</div>
			 </form>
			</div>
                          
         
      </div>
</div><br>
<!-- ======================================= and perbaikan ================================================================= -->

</div>

<script>
$(document).ready(function(){
	    let id_keluhan=$("#id_TypeKeluhan").val();
		$("#type").val(id_keluhan);
		   let kode_kln = $("#Kode_keluhan").val();
		   let kode_trns = $("#NoTransaksi").val();
    get_gambarkeluhan(kode_kln,kode_trns);
	 get_gambarperbaikan(kode_kln,kode_trns);
 /* $('#type').select2({
    placeholder: "Select a state",
    allowClear: true
	}); */
//getidTransaksi();
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
    window.location.replace("<?= base_url; ?>/home");
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

function getidTransaksi(){



var currentDate = new Date();

// Format the date using moment.js
  var formattedDate = moment(currentDate).format("YYYY-MM-DD HH:mm:ss");
 
  let split =formattedDate.split("-");

  let thn = split[0].substr(2,2);
  let bln = split[1];
  let tgl = split[2];
  let rep_tgl = tgl.replace(" ","");
  let rep_tgl2 = rep_tgl.replace(":","");
  let rep_tgl3 = rep_tgl2.replace(":",""); 
 
  let id_trns =thn+bln+rep_tgl3;
  $("#Kode_keluhan").val(id_trns);
}

  function get_gambarkeluhan(kode_kln,kode_trns){
        $.ajax({
            url:'<?=base_url?>/listkeluhan/gambarkeluhan',
            method:'POST',
            data:{kode:kode_kln,kode_transaksi:kode_trns},
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
	  
	  
  function get_gambarperbaikan(kode_kln,kode_trns){
        $.ajax({
            url:'<?=base_url?>/listperbaikan/gambarperbaikan',
            method:'POST',
            data:{kode:kode_kln,kode_transaksi:kode_trns},
            dataType:'json',  
            success:function(result){
           console.log(result)
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
	  
	    function goBack(){
			 let kode_beck = $("#Kode_keluhan").val();
			 let jml_trans = $("#jml_transaksi").val();
                window.location.replace(`<?=base_url?>/listkeluhancust/subkeluhan?KodeKeluhan=${kode_beck},jumlahtransaksi=${jml_trans}`);
            } 
</script>
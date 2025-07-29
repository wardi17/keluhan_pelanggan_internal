<div class="modal fade" id="Gambar_Modal" tabindex="-1" role="dialog"
  aria-labelledby="Gambar_ModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Gambar_ModalTitle">Foto Perbaikan</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">

                <div id="Gallerycarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        </div>
                    <div class="carousel-inner" id="foto_kjn">
                        <div class="carousel-item active">
                            <img id="side_image1" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img id="side_image2" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img id="side_image3" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img id="side_image4" class="d-block w-100">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#Gallerycarousel" role="button" type="button" data-bs-slide="prev">
                        <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                        <img src="<?=base_url?>/assets/images/back.png" aria-hidden="true"></span>
                      </a>
                    <a class="carousel-control-next" href="#Gallerycarousel" role="button" data-bs-slide="next">
                        <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                        <img src="<?=base_url?>/assets/images/next.png" aria-hidden="true"></span>

                    </a>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- end lihat gambar -->


<script>
    $(document).ready(function(){
         //tampil gambar 
    $(document).on("click",".open-gambar",function(){
        let kode = $(this).data('id');

              $.ajax({
                    url:'<?=base_url ?>/listperbaikan/gambarperbaikan',
                    method:'POST',
                    data:{kode:kode},
                    dataType:'json',  
                    success:function(result){
                        
                      $.each(result,function(key,value){
                       
                        let image1_pkn = value.image1_j;
                        let image2_pkn = value.image2_j;
                        let image3_pkn = value.image3_j;
                        let image4_pkn = value.image4_j;
                     
                        if(image1_pkn !== ''){
                          $("#side_image1").attr("src","<?=base_url?>/uploads/"+image1_pkn);
                        }else{
                          $("#side_image1").attr("src",'<?=base_url?>/assets/images/image1.jpg');
                        }
                        if(image2_pkn !== ''){
                          $("#side_image2").attr("src","<?=base_url?>/uploads/"+image2_pkn);
                        }else{
                          $("#side_image2").attr("src",'<?=base_url?>/assets/images/image2.jpg');
                        }
                        if(image3_pkn !== ''){
                          $("#side_image3").attr("src","<?=base_url?>/uploads/"+image3_pkn);
                        }else{
                          $("#side_image3").attr("src",'<?=base_url?>/assets/images/image3.jpg');
                        }
                        if(image4_pkn !== ''){
                          $("#side_image4").attr("src","<?=base_url?>/uploads/"+image4_pkn);
                        }else{
                          $("#side_image4").attr("src",'<?=base_url?>/assets/images/image4.jpg');

                        }
                       
                     
                       
                      
                       
                       
                     
                       
                    
                      });
                
                    }
          });
      });

    //end gambar
    })
</script>
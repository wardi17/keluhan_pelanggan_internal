 <div id="main">
 	        <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
    <!-- Main content action="<?= base_url; ?>/level/simpanlevel" method="POST" -->
    <section id="basic-horizontal-layouts">
    <div class ="col-md-12 col-12">
		  <div class="card">
			<div class="card-header">
			<h5>Tambah level</h5>
			</div>
			<div class="card-content">
			  <div class="card-body">
		   
			  <form  id ="formtambah"  class ="form form-horizontal" enctype="multipart/form-data">
				<div class="row col-md-12-col-12">
							  <div class="row col-md-12 mb-3">
										<label for="nama_level" class="col-sm-2 col-form-label">Nama Level</label>
										<div class="col-sm-3">
										  <input type="text"  class="form-control" name ="nama_level" id="nama_level" value="" placeholder="NamaLevel" required>
										</div>
								</div>
				
				</div>
			
									</div>
								
			
			  </div>
			  </div>
			 <!-- untuk akses menu -->
			
			 <div class="card">
					 <div class="card-header">
					<h5>Akses Menu</h5>
					</div>
					<div class="card-content">
					  <div class="card-body">
				   
						     <div class="row col-md-12">
								<div class="col-md-10">
								 
									  <div class ="col-md-10" >
										<?php  
										$controler = $data['aksesmenu'];
										foreach($controler as $file):?>
										   <div id="datamenu" class="form-check form-check-inline col-md-5">
										   <label class="form-check-label" for ="<?=$file?>" ><?=$file?></label>
                                          <input class="form-check-input checkaksesmenu" for ="<?=$file?>" type="checkbox" id="<?=$file?>" name="<?=$file?>" value="<?=$file?>">
                                        
                                      </div>
									  <?php endforeach;?> 
										 
								  </div>
								</div>

							</div>
					
											</div>
											<div class="col-sm-11 d-flex justify-content-end">
													<button  type="sumbit" name="sumbit" class="btn btn-primary me-1 mb-3" id="Createdata">Save</button>
													<button type="button" class="btn btn-secondary me-1 mb-3" id="clear">Clear</button>
												  </div>
						  </form>
					  </div>
			 
			 <!--end menu -->
			  
			  
			  
			</div>
  </div>
  </div>
</div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 </div>


<script>

	$("#Createdata").on("click",function(e){
		e.preventDefault();
			var selectedCheckboxes = $(".checkaksesmenu");
			$(selectedCheckboxes).each(function(){
				let aksemenu = {
					'datamenu' : '{'+$('.checkaksesmenu').attr("name") + ':'+ $(this).find(".checkaksesmenu").is(":checked") +'}',
				}
				console.log(aksemenu);
				
				 
			});
		
	});

</script>
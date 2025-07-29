  <!-- Modal  edit data member_divisi -->
  <div class="modal fade" id="EditModal_Member" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class ="modal-content">
      <div class="modal-header">
          <h1 class="modal-title fs-5" id="EditModalLabel">Edit Member Divisi </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
                  <div class="modal-body">
                  <form  id ="formedit"  class ="form form-horizontal">
              
                                  <input type="hidden" class="form-control"  name="k_member_edt" id="k_member_edt" value="" required>
                        
                        <div class="row col-md-12 mb-3">  
                                <label for="n_member_edt" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control"  name="n_member_edt" id="n_member_edt" value="" required>
                                </div>
                        </div>
                        <div class="row col-md-12">  
                                <label for="e_member_edt" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-6">
                                  <input disabled type="email" class="form-control"  name="e_member_edt" id="e_member_edt" value="" required>
                                </div>
                        </div>
                  </div>
                          <div class="col-sm-11 d-flex justify-content-end">
                                      <button  type="submit" name="submit" class="btn btn-primary me-1 mb-3" data-bs-dismiss="modal" id="Simpan_Memberedit">Save</button>
                                      <button type="button" class="btn btn-secondary me-1 mb-3"  data-bs-dismiss="modal">Close</button>
                          </div>
                          
                    </form>
                  </div>
                </div>
    </div>
  <!-- end modal edit member divisi -->


  <script>
    $(document).ready(function(){
        
  // untuk edit data member divisi
  $(document).on("click",".open-Memberedit",function(){
            let div = $(this).data('div');
            let nama = $(this).data('nama');
            let email = $(this).data('email');

           $("#k_member_edt").val(div);
           $("#n_member_edt").val(nama);
           $("#e_member_edt").val(email);

        });

        $(document).on("click","#Simpan_Memberedit",function(e){
          e.preventDefault();
          let div = $("#k_member_edt").val();
          let nama = $("#n_member_edt").val();
          let email = $("#e_member_edt").val();
        
          $.ajax({
                url:"<?=base_url?>/divisimember/editdivisimember",
                type:'POST',
                dataType:'json',
                data :{kode:div,nama:nama,email:email},
            
                success:function(result){
                  let status = result.error;
                  Swal.fire({
                    position: 'top-center',
                  icon: 'success',
                  title: status,
                  // showConfirmButton: false,
                  // timer: 500000
                  }).then(
                    $("#member_divisi").load("<?= base_url; ?>/divisimember/index",{kode:div})

                  ); 
               
                }
            });
           
        });
     //end edit data member divisi
    })
  </script>
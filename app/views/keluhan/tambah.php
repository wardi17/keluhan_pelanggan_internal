      <!-- Modal  tambah baru -->
      <div class="modal fade" id="TambaModal" tabindex="-1" aria-labelledby="TambahModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="close_tambah" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form  id ="formtambah"  class ="form form-horizontal">
                          <div class="row col-md-12 mb-3">  
                                      <label for="kode_keluhan" class="col-sm-2 col-form-label">Kode keluhan</label>
                                      <div class="col-sm-4">
                                        <input type="text" class="form-control"  name="kode_keluhan" id="kode_keluhan" value="" required>
                                      </div>
                              </div>
                              <div class="row col-md-12">  
                                      <label for="nama_keluhan" class="col-sm-2 col-form-label">Nama keluhan</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control"  name="nama_keluhan" id="nama_keluhan" value="" required>
                                      </div>
                              </div>
                                
                              </div>
                                  <div class="col-sm-11 d-flex justify-content-end">
                                          <button  type="submit" name="submit" class="btn btn-primary me-1 mb-3" data-bs-dismiss="modal" id="Createdata">Save</button>
                                          <button type="button" class="btn btn-secondary me-1 mb-3" data-bs-dismiss="modal"  id="close_tambah2" >Close</button>
                                        </div>
            </form>
              </div>
      </div>
      </div>
      <!-- end modal tambah -->
<script>
        //tambah data
        $("#Createdata").on('click',function(e){
                e.preventDefault();
            
                let kode = $("#kode_keluhan").val();
                let nama = $("#nama_keluhan").val();
                $.ajax({
                  url:'<?= base_url; ?>/keluhan/tambahkeluhan',
                  method:'POST',
                  data:{kode:kode,nama:nama},
                  cache:true,
                  dataType:'json',
                  success:function(result){
                    let status = result.error;
                          Swal.fire({
                            position: 'top-center',
                          icon: 'success',
                          title: status,
                          // showConfirmButton: false,
                          // timer: 500000
                          }); 
                          $("#formtambah").trigger('reset');
                          get_data_divisi();
                  }
                })
              });
              //end tambah data
</script>
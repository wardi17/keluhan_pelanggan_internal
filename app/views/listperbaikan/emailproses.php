<!-- Modal   email data  -->
<div class="modal fade" id="Send_emailProsesModal" tabindex="-1" role="dialog" aria-labelledby="Send_emailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class ="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="Send_emailProsesModalLabel">Message Proses</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="close_email" aria-label="Close"></button>
      </div>
                <div class="modal-body">
                  <div id="title_proses"></div>
                <input type ="hidden"  id="st_prosesemail" class ="form-control">
                <input type ="hidden"  id="id_proses_email" class ="form-control">
                <textarea type="text" style="height:120px; font-size:18px;" class="form-control"  id="pesan_emailproses"></textarea>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="kirim_emailProses">Send</button>
                  <button type="button" class="btn btn-secondary" id="close_email2" data-bs-dismiss="modal">Cancel</button>
                </div>
              </div>
    </div>
</div>
<!-- end modal kirim email data -->

<script>
    $(document).ready(function(){
        $(document).on("click","#btn_emailProses",function(){
           $("#Send_emailProsesModal").modal("show");
       
            let id = $(this).data('id');
            let pesan = $(this).data('pesanproses');
            let st_proses = $(this).data('st_proses');
        
        
            $("#st_prosesemail").val(st_proses);
            $("#id_proses_email").val(id);
          
            if(pesan != '' ){
            $(".modal-body #pesan_emailproses").val(pesan);
            $(".modal-body #pesan_emailproses").attr("disabled",true);
            }else{
            $(".modal-body #pesan_emailproses").attr("disabled",false);  
            }

            let title =`
                <h6>${id} </h6>
            `;
            $("#title_proses").empty().html(title);


        });
        //data emai id
        // ini untuk kirim email 
        $("#kirim_emailProses").on("click",function(e){
            e.preventDefault()
            let st_emailproses = $("#st_prosesemail").val();
            let id_kjn = $("#id_proses_email").val();
            let pesan = $("#pesan_emailproses").val();
            let tujuan = "PROCESS";
            if(st_emailproses == 1){
                Swal.fire({         
                    position: 'top-center',
                        icon: 'success',
                        title:"Data Sudah pernah di email ..???",                    
                    });
            }else{
                $.ajax({
                    url:'<?=base_url?>/kirimdataemail/kirimemailproses',
                    method:'POST',
                    data: {id_kjn:id_kjn,pesan:pesan,tujuan:tujuan},
                    dataType:'json',
                    beforeSend :function(){
                    
                    Swal.fire({
                        title: 'Sedang kirim Email...',
                        html: 'Please wait...',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                        Swal.showLoading()
                    }
                        });
                    },
                    success:function(result){
                    $("#pesan_email").val('');
                        Swal.fire({         
                                    position: 'top-center',
                                    icon: 'success',
                                    title: "Email berhasi di kirim",
                                }).then(function(){ 
                                    location.reload();
                                }); 
                    

                    },

                });
            
            }
        });
//end kirim email
    });
</script>
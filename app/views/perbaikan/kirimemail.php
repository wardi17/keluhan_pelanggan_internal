<!-- Modal   email data  -->
<div class="modal fade" id="Send_emailModal" tabindex="-1" role="dialog" aria-labelledby="Send_emailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class ="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="Send_emailModalLabel">Message Keluhan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="close_email" aria-label="Close"></button>
      </div>
                <div class="modal-body">
                  <div id="title_id"></div>
                <input type ="hidden"  id="st_email" class ="form-control">
                <input type ="hidden"  id="id_kjn_email" class ="form-control">
                <textarea type="text" style="height:120px; font-size:18px;" class="form-control"  id="pesan_email"></textarea>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="kirim_email">Send</button>
                  <button type="button" class="btn btn-secondary" id="close_email2" data-bs-dismiss="modal">Cancel</button>
                </div>
              </div>
    </div>
</div>
<!-- end modal kirim email data -->

<script>
    $(document).ready(function(){
        $(document).on("click","#btn_email",function(){
           $("#Send_emailModal").modal("show");
        });

        // data email id


        $(document).on("click",".open-sendmail",function(){
            let id = $(this).data('id');
            let pesan = $(this).data('pasan');
            let st_email = $(this).data('email');

        
            $("#id_kjn_email").val(id);
            $("#st_email").val(st_email);
            if(pesan != '' ){
            $(".modal-body #pesan_email").val(pesan);
            $(".modal-body #pesan_email").attr("disabled",true);
            }else{
            $(".modal-body #pesan_email").attr("disabled",false);  
            }

            let title =`
                <h6>${id} </h6>
            `;
            $("#title_id").empty().html(title);


        });
        //data emai id
        // ini untuk kirim email 
        $("#kirim_email").on("click",function(e){
            e.preventDefault()
            let st_email = $("#st_email").val();
            let id_kjn = $("#id_kjn_email").val();
            let pesan = $("#pesan_email").val();
            let tujuan = "Keluhan";
            if(st_email == 1){
                Swal.fire({         
                    position: 'top-center',
                        icon: 'success',
                        title:"Data Sudah pernah di email ..???",                    
                    });
            }else{
                $.ajax({
                    url:'<?=base_url?>/kirimdataemail/kirimemailkeluhan',
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
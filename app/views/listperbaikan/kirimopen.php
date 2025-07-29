<!-- Modal   email data  -->
<div class="modal fade" id="Send_emailOpenModal" tabindex="-1" role="dialog" aria-labelledby="Send_emailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class ="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="Send_emailModalOpenLabel">Message OPEN</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="close_email" aria-label="Close"></button>
      </div>
                <div class="modal-body">
                  <div id="title_idOpen"></div>
                <input type ="hidden"  id="st_emailOpen" class ="form-control">
                <input type ="hidden"  id="id_emailOpen" class ="form-control">
                <textarea type="text" style="height:120px; font-size:18px;" class="form-control"  id="pesan_emailOpen"></textarea>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="kirim_emailOpen">Send</button>
                  <button type="button" class="btn btn-secondary" id="close_email2" data-bs-dismiss="modal">Cancel</button>
                </div>
              </div>
    </div>
</div>
<!-- end modal kirim email data -->

<script>
    $(document).ready(function(){
        $(document).on("click","#btn_email_kln",function(){
           $("#Send_emailOpenModal").modal("show");
        });

        // data email id


        $(document).on("click",".open-sendmailOpen",function(){
            let id = $(this).data('id');
            let pesan = $(this).data('pesan');
            let st_email = $(this).data('emailopen');

        
            $("#id_emailOpen").val(id);
            $("#st_emailOpen").val(st_email);
            if(pesan != '' ){
            $(".modal-body #pesan_emailOpen").val(pesan);
            $(".modal-body #pesan_emailOpen").attr("disabled",true);
            }else{
            $(".modal-body #pesan_emailOpen").attr("disabled",false);  
            }

            let title =`
                <h6>${id} </h6>
            `;
            $("#title_idOpen").empty().html(title);


        });
        //data emai id
        // ini untuk kirim email 
        $("#kirim_emailOpen").on("click",function(e){
            e.preventDefault()
            let st_email = $("#st_emailOpen").val();
            let id_kjn = $("#id_emailOpen").val();
            let pesan = $("#pesan_emailOpen").val();
            let tujuan = "OPEN";
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
<style>
  #attach {
        opacity: 0;
    }

</style>

<!-- Modal   email data  -->
<div class="modal fade" id="Send_emailModal" tabindex="-1" role="dialog" aria-labelledby="Send_emailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class ="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="Send_emailModalLabel">Message Selesai</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="close_email" aria-label="Close"></button>
      </div>
                <div class="modal-body">
                  <div id="title_id"></div>
                <input type ="hidden"  id="st_email" class ="form-control">
                <input type ="hidden"  id="id_kjn_email" class ="form-control">
                <input type ="hidden"  id="id_cust_email" class ="form-control">
                <textarea type="text" style="height:120px; font-size:18px;" class="form-control"  id="pesan_email"></textarea>
                
                  <div class=" row col-md-12 mb-3 mt-2">
                                  <label for="attach" class="col-md-2 col-form-label">Attach Foto</label>
                                  <div class="col-sm-8 mt-0">
                                  <label style="cursor:pointer"  for="attach"><i class="fa-solid fa-file-arrow-up fa-2x"></i>
                                  <input class="col-md-1" id="attach"  type="file" multiple></input>
                                </label>
                                  </div>
                                  <div id="tampil_attach" class="row mt-0"></div>
                          </div>
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
            let pesan = $(this).data('pesanfinis');
            let st_email = $(this).data('email');
            let custID = $(this).data('custid');
          
            $("#id_cust_email").val(custID);
            $("#id_kjn_email").val(id);
            $("#st_email").val(st_email);
            if(pesan != '' ){
            $(".modal-body #pesan_email").val(pesan);
            $(".modal-body #pesan_email").attr("disabled",true);
            }else{
            $(".modal-body #pesan_email").attr("disabled",false);  
            }

            let title =`
                <h6>${id} | ${custID}</h6>
            `;
            $("#title_id").empty().html(title);

            tampilAttenData(id,custID);
        });
        //data emai id
        // ini untuk kirim email 
          $("#kirim_email").on("click",function(e){
              e.preventDefault()
              let st_email = $("#st_email").val();
              let id_kjn = $("#id_kjn_email").val();
              let pesan = $("#pesan_email").val();
              let tujuan = "CLOSED";
              if(st_email == 1){
                  Swal.fire({         
                      position: 'top-center',
                          icon: 'success',
                          title:"Data Sudah pernah di email ..???",                    
                      });
              }else{
                  $.ajax({
                      url:'<?=base_url?>/kirimdataemail/kirimemailperbaikan',
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

        //untuk tambah document atter 

        $("#attach").on('change',function(){    
            let at = $('#attach').prop('files');
           
            let kode_kln = $('#id_kjn_email').val();
            let custID = $("#id_cust_email").val();
            let id_appen ="#tampil_attach";

            post_dataAtter(at,kode_kln,custID,id_appen);
        });

        $(document).on("click",".delete_span",function(){
            $(this).parents('span').remove();
        });
        //end document atter
//batas document ready
    });

    // untuk kirim data atter_ketabel  by wardi 2023
function post_dataAtter(at,kode_kln,custID,id_appen){
  if(kode_kln !== ''){
      let formData = new FormData();
      for (var i = 0; i < at.length; i++) {
        formData.append('files[]', at[i]);
        formData.append('kode_kln',kode_kln);
        formData.append('custID',custID);
      }

      $.ajax({
        url:'<?=base_url?>/kirimdataemail/simpandataatten',
        method:'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        dataType:'json',
        beforeSend :function(){  
            Swal.fire({
              title: 'Sedang simpan Document...',
              html: 'Please wait...',
              allowEscapeKey: false,
              allowOutsideClick: false,
              didOpen: () => {
                Swal.showLoading()
            }
              });
          },
        success:function(result){ 
       
          let nilai = result.nilai;
          let status = result.error;
          let  n_file = result.nama_file
        
          if(nilai !== 0){
            Swal.fire({
                  position: 'top-center',
                icon: 'success',
                title: status,
                }).then(
              $.each(at,function(a,b){
                  let url ="<?=base_url?>/uploads_attachfile/"+n_file;
                 
                  $(id_appen).append(`<span>
                  <a href="${url}" target="_blank">${b['name']} </a>&nbsp;&nbsp;&nbsp;
                  <a style="cursor:pointer" onclick="close_attr('${n_file}','${kode_kln}','${custID}');" class="delete_span col-md-2 text-danger">X</a></span>
                  `)
                })
                ); 
          }else{
            Swal.fire({
                  position: 'top-center',
                icon: 'success',
                title: status,
                });
          }
               
        }
      })
    }else{
      Swal.fire({
        position: 'top-center',
          icon: 'success',
            title: "ID EO harus di isi",
                      
      });  
    }
}
//end  kirim data atter_ketabel

  function tampilAttenData(id,custID){
    let id_appen ="#tampil_attach";
     $(id_appen).empty();
    $.ajax({
        url:'<?=base_url?>/kirimdataemail/tampildataatten',
        method:'POST',
        data:{id:id,custID:custID},
        dataType:'json',
        success:function(result){ 
          $.each(result,function(key,value){
           
          let n_file = value.nama_document
        
          let url ="<?=base_url?>/uploads_attachfile/"+n_file;
                 
                 $(id_appen).append(`<span>
                 <a href="${url}" target="_blank">${n_file} </a>&nbsp;&nbsp;&nbsp;
                 <a style="cursor:pointer" onclick="close_attr('${n_file}','${id}','${custID}');" class="delete_span col-md-2 text-danger">X</a></span>
                 `)

        });
        }
    });
  }

  function close_attr(nama_file,id,custID){
    $.ajax({
      url:'<?=base_url?>/kirimdataemail/deletedataatten',
      method :'POST',
      data : {nama_file:nama_file,id:id,custID},
      dataType:'json',
      success:function(result){
      } 
    });
 
  };
</script>
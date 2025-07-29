<!-- Modal  selesai data  -->
<div class="modal fade" id="Selesai_Modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class ="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="Send_emailModalLabel">Message Proses</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="close_email" aria-label="Close"></button>
      </div>
                <div class="modal-body">
                  <div id="title_id"></div>
                <input type ="text"  id="st_email" class ="form-control">
                <input type ="text"  id="id_kjn_email" class ="form-control">
                <textarea type="text" style="height:120px; font-size:18px;" class="form-control"  id="pesan_email"></textarea>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="kirim_email">Send</button>
                  <button type="button" class="btn btn-secondary" id="close_email2" data-bs-dismiss="modal">Cancel</button>
                </div>
              </div>
    </div>
    </div>
<!-- end modal selesai -->

<script>
$(document).ready(function(){
  var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        let  output =  d.getFullYear()+ '-'+(month<10 ? '0' : '') + month + '-' +
                      (day<10 ? '0' : '') + day;

    $("#tgl_selesai").val(output);
  //untuk proses
  $(document).on("click",".open-selesai",function(){
 
    let id_kjn = $(this).data('id');
    let selesai = $(this).data('ket');
    let tgl_selesai = $(this).data('tgl_selesai')
 

    if(selesai != '' ){
      $(".modal-body #tgl_selesai").attr("disabled",true);
      $(".modal-body #ket_selesai").attr("disabled",true);
    }else{
      $(".modal-body #tgl_selesai").attr("disabled",false);
      $(".modal-body #ket_selesai").attr("disabled",false);
    }

    if(tgl_selesai !=='01-01-1970'){
      let for_tgl = tgl_selesai.split('-');
      let tgl_srs = for_tgl[0]+'/'+for_tgl[1]+'/'+for_tgl[2];
			$(".modal-body #tgl_selesai").val(tgl_srs);
		}

    $(".modal-body #kode_kjn").val(id_kjn);
    $(".modal-body #ket_selesai").val(selesai);

      let title =`
        <h6>${id_kjn} </h6>
              `;
      $("#title_id").empty().html(title);
  });


  
    $("#Selesai").on("click",function(e){
      e.preventDefault();
   
        let kode_kjn = $("#kode_kjn").val();
      
        let tgls= $("#tgl_selesai").val();
        let tgl_selesai = tgls
        let ket_selesai =  $("#ket_selesai").val();
    
        $.ajax({
          url:'<?=base_url?>/listperbaikan/simpatperbaikanselesai',
            type:'POST',
            dataType:'json',
            data :{kode_kjn:kode_kjn,tgl_selesai:tgl_selesai,ket_selesai:ket_selesai},
        
            success:function(result){
              // let object = JSON.parse(result)
              let status =  result.error
              Swal.fire({
                position: 'top-center',
              icon: 'success',
              title: status,
              showConfirmButton: false,
              timer: 500000
              }); 
                goBack();
            }
        });
    });
//end proses

})

function myformat(date){
    let d = date.split('/')[0];
    let m = date.split('/')[1];
    let y = date.split('/')[2];
    let format = y + "-" + m + "-" + d;
   
    return format;
  }

function goBack() {
      //   $("#tampildata").show();
      // $("#editdata").hide();
      window.location.href="<?=base_url?>/listperbaikan/index";
    }
</script>
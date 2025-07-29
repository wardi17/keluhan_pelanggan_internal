<!-- Modal  view email data  -->
<div class="modal fade" id="View_emailModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class ="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="View_emailModalLabel">View Email</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
      </div>
                <div class="modal-body">
                <input type ="hidden"  id="kode_email" class ="form-control">
                <div id="dataemail_view"></div>
                </div>
               
              </div>
    </div>
</div>
<!-- end modal view email data -->

<script>
    $(document).ready(function(){
  
        // lihat email kirim
    $(document).on("click","#open-viewemail",function(){
   
      $("#View_emailModal").modal("show");
      let id_kjn = $("#Kode_keluhan").val();
      $.ajax({
        url:'<?=base_url?>/divisimember/viewdataemail',
      method:'POST',
      data: {kode:id_kjn},
      dataType:'json',
       success:function(result){ 
        tabelemail_view();
          $('#tabelemail_view').DataTable( {
            response:true,
            columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:2
            } ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            },
            'order': [[0, 'asc']],
              data: result,
                        columns: [
                          
                          { 'data': 'nama_divisi'},
                            { 'data': 'nama' },
                            { 'data': 'email' },
                          //  { 'data': 'status' },

                        ],
                  
          });  
        
       }
      })
    //tabelemail()
    })
    })
 //untuk data tabel email
 function tabelemail_view(){
        let tabel =`     <table id="tabelemail_view" class="display table-info" style="width:100%">                    
                                      <thead  id='thead'class ='thead'>
                                      <tr>      
                                                <th>Divisi</th>
                                                 <th>Nama</th>
                                                 <th>Email</th>
                                                                                               
                                      </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                  </table><br>`;
          $("#dataemail_view").empty().html(tabel);
      }
  //data
</script>
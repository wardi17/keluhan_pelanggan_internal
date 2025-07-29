

<!-- Modal -->
<div class="modal fade" id="SendemailModal" tabindex="-1" aria-labelledby="SendemailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SendemailModalLabel">data email</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type ="hidden"  id="kode_email" class ="form-control">
							<table id="tabelemail" class="display table-info" style="width:100%">                    
                                  <thead  id='thead'class ='thead'>
                                  <tr>      
                                            <th style="width:30%">Divisi</th>
                                             <th>Nama</th>
                                             <th>Email</th>
                                             <th>To</th>
                                             <th>CC</th>
                                             <th>BCC</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                              </table>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="save_email">Save</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal  -->




<script>
  $(document).ready(function(){


  $("#TambahEmail").on("click",function(e){
    let divisi =$("#divisi").find(":selected").val();
    let cust =$("#customer").find(":selected").val();
    let kode_kln =$("#Kode_keluhan").val();
if(divisi !== 'Please Select' && cust !== 'Please Select'){
  $("#SendemailModal").modal("show");
  $("#kode_email").val(kode_kln);
  //$(".save_email").show();   
  e.preventDefault();
  if (!$(this).is('.checkterkait:checked')) { 
    let div =``;
        $(".checkterkait:checked").each(function(){
          div += "'"+$(this).val()+ "'"+',';
        });
      
      let str_div = div.slice(0,-1);
      $.ajax({
      url:'<?=base_url?>/divisimember/memberdataemail',
      method:'POST',
      data: {kode:str_div},
      dataType:'json',
      success:function(result){ 
          $('#tabelemail').DataTable({
			"ordering": false,
            "destroy":true,
			"responsive": true,
			"bAutoWidth": false,			
            pageLength :20,
            lengthMenu: [[20, -1], [20, 'all']],
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
							{data: 'nama_divisi'},
                            {data: 'nama' },
                            {data: 'email' },
                            {
                                targets: 2,
                                className: 'text-center',
                                searchable: false,
                                orderable: false,
								data: null, defaultContent: '',
                                render: function (data, type, full, meta) {
                                  return `<input type="checkbox"  id="check_to_${data.id}" class="check check_to" name="check_to" value="${data.id}">`;
                                },
                                width: "5%"
                            },
                            {
                                className: 'text-center',
                                searchable: false,
                                orderable: false,
								data: null, defaultContent: '',
                                render: function (data, type, full, meta) {
                                    return `<input type="checkbox" id="check_cc_${data.id}" class="check check_cc" name="check_cc" value="${data.id}">`;
                                },
                                width: "5%"
                            },
                            {
                                targets: 4,
                                className: 'text-center',
                                searchable: false,
                                orderable: false,
								data: null, defaultContent: '',
                                render: function (data, type, full, meta) {
                                    return `<input type="checkbox" id="check_bcc_${data.id}" class="check check_bcc" name="check_bcc"value="${data.id}">`;
                                },
                                width: "5%"
                            },
                        
                        ],
                  
          });
          editemail(kode_kln);
      }
      });
  
  } 
}else{
  Swal.fire({
    position: 'top-center',
      icon: 'warning',
        title: "data divisi dan pelanggan tidak boleh kosong",
                      // showConfirmButton: false,
                      // timer: 500000
  }); 
}
});

// simpan data kirim email
$("#save_email").on("click",function(e){
  e.preventDefault();

  let kode_email = $("#kode_email").val();
  delete_data(kode_email);

  $("table >tbody >tr").each(function(){
    let dataobject = []; 
    if($(this).find(".check").is(":checked")){
       let  data= {
          'kode_email' : kode_email,
          'id':$(this).closest('tr').find('input:checkbox').val(),
          'to':$(this).closest('tr').find(".check_to").is(":checked"),
          'cc':$(this).closest('tr').find(".check_cc").is(":checked"),
          'bcc':$(this).closest('tr').find(".check_bcc").is(":checked"),
          'nama_divisi': $(this).find('td').eq(0).text(),
          'nama'  : $(this).find('td').eq(1).text(),
          'email'  : $(this).find('td').eq(2).text(),
    };
     dataobject = data;
    }else{

        dataobject ='';
    }
   
    if(dataobject !== ''){
        var jsonString = JSON.stringify(dataobject);
        $.ajax({
          url:'<?=base_url?>/divisimember/simpanhistoryemail',
          method:'POST',
          data: {data:jsonString},
          cache: false,
          dataType:'json',
          success:function(result){ 
            let status = result.error;
                          Swal.fire({
                            position: 'top-center',
                          icon: 'success',
                          title: status,
                          showConfirmButton: false,
                          timer: 1000
                          });
          }
        });
    }
  });  


      
   
});
// 
//end document ready
});

function delete_data(kode_email){
    $.ajax({
    url:'<?=base_url?>/divisimember/deletedatahistoryemail',
          method:'POST',
          data: {kode:kode_email},
          cache: false,
          dataType:'json',
        });
}
//fungsi untuk edit data email
function editemail(kode_kln){

//untuk ceheck box send email
 $.ajax({
   url:'<?=base_url?>/divisimember/editdatahistoryemail',
           method:'POST',
           data:{id:kode_kln},
           dataType:'json',  
           success:function(respons){
           
             if(respons !== null){
               for(let item of respons){
                let id = item.id;
                let to  = parseInt(item.status_to);
                let cc  =parseInt(item.status_cc);
                let bcc  =parseInt(item.status_bcc);
                if(to == 1){
                let id_check = "#check_to_"+id
                 $(id_check).prop("checked",true);
                }else{
                  let id_check = "#check_to_"+id;
                  $(id_check).prop("checked",false);
                }

                    if(cc == 1){
                      let id_check2 = "#check_cc_"+id;
                      $(id_check2).prop("checked",true);
                    }else{
                      let id_check2 = "#check_cc_"+id;
                      $(id_check2).prop("checked",false);
                    }
                
                    if(bcc == 1){
                      let id_check3 = "#check_bcc_"+id;
                      $(id_check3).prop("checked",true);
                    }else{
                      let id_check3 = "#check_bcc_"+id;
                      $(id_check3).prop("checked",false);
                    }
             }
           }
         
           }
 })
//end check send email
}
//end data email

//untuk data tabel email
  function tabelemail(){
    let tabel =`     <br>`;
      $("#dataemail").empty().html(tabel);
  }
//data
</script>
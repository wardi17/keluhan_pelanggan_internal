<script src="<?= base_url; ?>/assets/js/printObject.js"></script>

<div id="tampildata">
<main id="main">
    <section id="" class="section">
        <div class ="card">
            <!-- <div class="card-header">
                    <div class="col-md-12 text-end mb-3">
                        <a  href="https://bestmegaindustri.com/testkirimemail.php" target="_blank" class="btn float-right btn-xs btn btn-primary">testkirim email</a>
                    </div>
            </div> -->
            <div class="card-body">
            <form id="form_filter">
                        <div class=" row col-md-10">
                          <div class="col-md-2">
                               <select class ="form-control" id="filter_tahun"></select>
                            </div>
                            <!-- <div class="col-md-2">
                               <select class ="form-control" id="filter_status"></select>
                            </div> -->
                            <div class="col-md-2">
                            <button  type="sumbit" name="sumbit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
           
                <div class="mt-4"  id="header_data"></div>
                <div id="tabelhead"></div>
            </div>
            <div id="printinvoce"></div>
            </div>
          
        </div>
     
    </section>
</main>
</div>
<div id="tampiledit">
<main id="main">
    <section id="" class="section">
    </section>
    </main>
</div>

<script>
  $(document).ready(function(){
    get_tahun();
    filter_data();
    const dateya = new Date();
    let bulan = dateya.getMonth()+1;
    let tahun = dateya.getFullYear();
    $("#filter_tahun").val(tahun);
    let status = "All";
    getDataList(tahun,status);

    $('#printInvoice').click(function(){
            Popup($('#tabelhead')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
        $(document).on("click","#finishActivity",function(){
            let id = $(this).data('id');
            $("#id_tr").val(id);
            $("#FinsihModal").modal("show");
        });

        $(document).on("click","#deleteActivity",function(){
            let id_ts = $(this).data('id');
            Swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Hapus Data Ini!",
                type: "warning",
                showDenyButton: true,
                confirmButtonColor: "#DD6B55",
                denyButtonColor: "#757575",
                confirmButtonText: "Ya, Hapus!",
                denyButtonText: "Tidak, Batal!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : "<?= base_url?>/newactivity/deleteactivity",
                            method: "POST",
                            data :{id:id_ts},
                            dataType :"json",
                            cache :true,
                            success:function(data){
                                Swal.fire('Deleted!', data.error, 'success');
                                getDataList();
                            }
                        })
                    }else if(data.isDenied) {
                        Swal.fire('Data kamu aman :)', '', 'info')
                    }
                });
        });

        $(document).on("click","#editdata",function(){
            let id = $(this).data("id");
            $("#tampildata").hide();
            $("#tampiledit").load("<?= base_url; ?>/editcustomer/index",{id:id});
        })
  });

  function filter_data(){
        const divisi =["All","Belum Proses","Belum Selesai","Belum Email","Proses","Selesai","Sudah Email"];
        for(let div of divisi){
        $("#filter_status").append($(`<option/>`).val(div).html(div));
        }
    } 

function get_tahun(){
 let startyear = 2020;
 let date = new Date().getFullYear();
 let endyear = date + 2;
 for(let i = startyear; i <=endyear; i++){
   var selected = (i !== date) ? 'selected' : date; 

  $("#filter_tahun").append($(`<option />`).val(i).html(i).prop('selected', selected));
 }
}
    function getDataList(tahun,status){
        get_header();
        get_tables(tahun);
        $.ajax({
                url:'<?= base_url; ?>/listkeluhan/tampildata',
                method:'POST',
                data:{tahun:tahun,status:status},
                dataType:'json',      
                success:function(response){
                 
                    datatabel(response)
                }
        });      
    } 
    
    function datatabel(result){
        $("#tabel1").DataTable({
                    "ordering": false,
                    "destroy":true,
                    bAutoWidth: false, 
                    "order":[[0,'desc']],
                    
                        data: result,
                        'rowCallback': function(row, data, index){
                          let proses = data.status_proses;
                          let selesai = data.status_selesai;
                          let email = data.status_email_keluhan;
                                if(proses == 1){
                                  $(row).find('#btn_proses').css('background-color', 'yellow');
                                  $(row).find('#btn_proses').css('color', 'black');
                                }else{
                                  $(row).find('#btn_proses').css('background-color', 'red');
                                  $(row).find('#btn_proses').css('color', '#FFFF');
                                }
                                if(selesai == 1){
                                  $(row).find('#btn_selesai').css('background-color', '#B3C890');
                                  $(row).find('#btn_selesai').css('color', 'black');
                                }else{
                                  $(row).find('#btn_selesai').css('background-color', 'red');
                                  $(row).find('#btn_selesai').css('color', '#FFFF');

                                }  
                                if(email == 1){
                                  $(row).find("#btn_email").css('background-color','#F79327');
                                    $(row).find('#btn_email').css('color','#FFFF');
                             
                                }else{
                                  $(row).find("#btn_email").css('background-color','#448dee');
                                   $(row).find('#btn_email').css('color','#FFFF');
                                } 
                               
                                $(row).find("#btn_viewemail").css('background-color','#448dee');
                                $(row).find('#btn_viewemail').css('color', '#FFFF');
                            },
                        pageLength: 5,
                        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
                        "columnDefs": [
                          { "width": "3%", "targets": 2 },
                          { "width": "20%", "targets": 7 }
                          ],

                            columns: [
                              { 'data': 'TanggalInput' },
                              { 'data': 'KodeKeluhan' },
                              { 'data': 'CustomerID'},
                              { 'data': 'Divisi' },
                              {'data':'TypeKeluhan'},
                              { 'data': 'Keluhan' },
                                { 'data': 'Penyebab'},
                                { 'data': 'User_log'},

                                {
                                  "render": function (data, type,row) { 
                                  // Tampilkan kolom aksi
                                  let html  ='<button type="button" id="btn_gambar"  data-id="'+row.KodeKeluhan+'" class=" open-gambar btn  btn-lg btn-space" data-bs-toggle="modal" data-bs-target="#Gambar_Modal"><i class="fa-solid fa-binoculars"></i></button>';
                                    // if(row.status_email_keluhan == 0){
                                      html  +='<button  id="editdata" type="button" data-id="'+row.KodeKeluhan+'" class=" btn  btn-lg btn-space"><i class="fa-regular fa-pen-to-square"></i></button>&nbsp';
                                    // }
                                  
                                     return html;
                                 }
                                },
                       
                                {
                                  "render":function(data,type,row){
                                  
                                        let kirim = row.tanggal_email_keluhan;
                                        let kir ="";
                                        if(kirim == "01-01-70"){
                                            kir = "Kirim";
                                          }else{
                                            kir = kirim;
                                          }
                              
                                     let html  =`<button type="button" id="btn_email" data-email="${row.status_email_keluhan}" data-id="${row.KodeKeluhan}" data-pasan="${row.pesan_email_keluhan}"style="width:100px"
                                      class="open-sendmail  btn btn-sm  mt-1">${kir}</button>`;
                                      html  +=`<button type="button" id="btn_viewemail"  data-id="${row.KodeKeluhan}" data-div_tkt="${row.divisi_terkait}" style="width:100px"
                                      class="open-viewemail  btn btn-sm  mt-1" data-bs-toggle="modal" data-bs-target="#View_emailModal">View Email</button>`;
                                    

                                return html;
                                  }
                                }

                             
                            ]      
                
              });
}
    function get_header(){
    let data_headr =`

    <div  class="page-heading mb-3">
    <div class="page-title">
    <h4 class="text-center">List Keluhan</h4>
    </div></div>

    `;
    $("#header_data").html(data_headr);
    }

    function get_tables(){
    //   let id ="#"+tabel;
    //   let substr_bulan = bulan.substr(0,3);
        let dataTable =`
                    <table id="tabel1" class='display table-info' style='width:100%'>                    
                                    <thead  id='thead'class ='thead'>
                                    <tr>
                                               
                                                <th style="width:10%">Tanggal</th>
                                                <th style="width:5%">ID Keluhan</th>
                                                <th style="width:20%">CustomerID</th>
                                                <th style="width:2%">Divisi</th>
                                                <th style="width:30%">Type</th>
                                                <th style="width:30%">Keluhan</th>
                                                <th style="width:30%">Penyebab</th>
                                                <th style="width:30%">UserInput</th>
                                                <th style="width:15%">Foto/Edit</th>
                                                <th style="width:20%">Send Email</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                          

        `;
    $("#tabelhead").empty().html(dataTable);
    };


</script>

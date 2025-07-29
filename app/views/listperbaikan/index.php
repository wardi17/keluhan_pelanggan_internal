<script src="<?= base_url; ?>/assets/js/printObject.js"></script>

<main id="main" class="main">
    <section id="tampildata" class="section">
        <div class ="card">
            <!-- <div class="card-header">
                    <div class="col-md-12 text-end mb-3">
                        <a id="printInvoice" class="btn float-right btn-xs btn btn-primary">Print</a>
                    </div>
            </div> -->
            <div class="card-body">
       
           
                <div class="mt-4"  id="header_data"></div>
                <div id="tabelhead"></div>
            </div>
            <div id="printinvoce"></div>
            </div>
          
        </div>
     
    </section>
    <section id="tampiledit" class="section">
    </section>

</main>

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
            $("#tampiledit").load("<?= base_url; ?>/editcustperbaikan/index",{id:id});
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
                url:'<?= base_url; ?>/listperbaikan/tampildata',
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
                          let proses_email = data.status_emailproses;
                          let pkn_email = data.status_emailperbaikan;
                          let email_kln = data.status_emailkeluhan;
                        
                                if(proses_email == 1){
                                 
                                  $(row).find('#btn_emailProses').css('background-color', '#8DDFCB');
                                  $(row).find('#btn_emailProses').css('color', 'black');
                                }else{
                                  $(row).find('#btn_emailProses').css('background-color', '#8DDFCB');
                                  $(row).find('#btn_emailProses').css('color', '#FFFF');

                                }  
                                if(pkn_email == 1){
                                  $(row).find("#btn_email").css('background-color','#82A0D8');
                                    $(row).find('#btn_email').css('color','black');
                             
                                }else{
                                  $(row).find("#btn_email").css('background-color','#82A0D8');
                                   $(row).find('#btn_email').css('color','#FFFF');
                                } 
                               
                                if(email_kln == 1){
                                  $(row).find("#btn_email_kln").css('background-color','#ECEE81');
                                    $(row).find('#btn_email_kln').css('color','black');
                             
                                }else{
                                  $(row).find("#btn_email_kln").css('background-color','#ECEE81');
                                   $(row).find('#btn_email_kln').css('color','#FFFF');
                                } 
                                // $(row).find("#btn_viewemail").css('background-color','#5CD2E6');
                                // $(row).find('#btn_viewemail').css('color', '#FFFF');
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
                              { 'data': 'Keluhan' },
                                { 'data': 'Penyebab'},
                                { 'data': 'tanggalperbaikan'},
                                { 'data': 'perbaikan'},
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
                                        let kirim = row.tanggal_emailperbaikan;
                                        let st_proses = row.status_emailproses;
                                  
                                        let proses = row.tanggal_emailproses;
                                    
                                      
                                        let kir ="";
                                        let sel = "";
                                        if(kirim == "01-01-70"){
                                            kir = "Closed";
                                          }else{
                                            kir = kirim;
                                          }

                                          if(proses == "01-01-70"){
                                            sel = "Procoss";
                                          }else{
                                            sel = proses;
                                          }

                                          let kirim_kln = row.tanggal_emailkeluhan;
                                          let kir_kln ="";
                                            if(kirim_kln == "01-01-70"){
                                              kir_kln = "Keluhan";
                                            }else{
                                              kir_kln = kirim_kln ;
                                            }
                                      
                                          let html =``;
                                             html  +=`<button type="button" id="btn_email_kln" data-emailopen="${row.status_emailkeluhan}" data-id="${row.KodeKeluhan}" data-pesan="${row.pesan_emailkeluhan}"style="width:100px"
                                                      class="open-sendmailOpen  btn btn-sm  mt-1">${kir_kln}</button>`;
                                            html  +=`<button type="button" id="btn_emailProses" data-st_proses="${row.status_emailproses}"  data-id="${row.KodeKeluhan}"data-pesanproses="${row.pesan_emailproses}" style="width:100px"
                                                      class="open-emailselesai  btn btn-sm  mt-1">${sel}</button>`;
                                            
                                            html   +=`<button type="button" id="btn_email" 
                                                      data-custid="${row.CustomerID}"
                                                      data-email="${row.status_emailperbaikan}" data-id="${row.KodeKeluhan}" data-pesanfinis="${row.pesan_emailperbaikan}"style="width:100px"
                                                        class="open-sendmail  btn btn-sm  mt-1">${kir}</button>`;
                                          
                                        
                                         
                                          
                                    
                                    

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
    <h4 class="text-center">List Perbaikan</h4>
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
                                               
                                                <th style="width:8%">Tanggal Keluhan</th>
                                                <th style="width:5%">ID</th>
                                                <th style="width:10%">Customer</th>
                                                <th style="width:5%">Divisi</th>
                                                <th style="width:16%">Keluhan</th>
                                                <th style="width:16%">Penyebab</th>
                                                <th style="width:8%">Tanggal Perbaikan</th>
                                                <th style="width:16%">Perbaikan</th>
                                                <th style="width:2%">Edit</th>
                                                <th style="width:14%">Email</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                          

        `;
    $("#tabelhead").empty().html(dataTable);
    };


</script>

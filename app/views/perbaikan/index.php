<script src="<?= base_url; ?>/assets/js/printObject.js"></script>

<main id="main" class="main">
  <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
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
            </div>
          
        </div>
     
    </section>


</main>

<script>
  $(document).ready(function(){

    const dateya = new Date();
    let bulan = dateya.getMonth()+1;
    let tahun = dateya.getFullYear();
    $("#filter_tahun").val(tahun);
    let status = "All";
    getDataList(tahun,status);



  });



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
                      responsive: true,
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
                              { data: 'KodeKeluhan',defaultContent:'',
								"render":function(data,type,row){
									let jml = row.NoTransaksi;
									let kode = row.KodeKeluhan;
									let html=``;
									
									if(type =='display'){
										html =`
										<a href='<?= base_url; ?>/listkeluhan/detailkkeluhan?KodeKeluhan=${kode}'>${data}<sup>${jml}</sup></a>`;
										
									}
									return html;
								}
							  },
                              { 'data': 'CustomerID'},
                              { 'data': 'Divisi' },
                              {'data':'TypeKeluhan'},
                              { 'data': 'Keluhan' },
                              { 'data': 'Penyebab'},
                              { 'data': 'User_log'},
                            ]      
                
              });
}
    function get_header(){
    let data_headr =`

    <div  class="page-heading mb-3">
    <div class="page-title">
    <h4 class="text-center">Input Perbaikan</h4>
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
                                               
                                                <th style="width:8%">Tanggal</th>
                                                <th style="width:15%">ID Keluhan</th>
                                                <th style="width:20%">CustomerID</th>
                                                <th style="width:2%">Divisi</th>
                                                <th style="width:30%">Type</th>
                                                <th style="width:30%">Keluhan</th>
                                                <th style="width:30%">Penyebab</th>
                                                <th style="width:30%">UserInput</th>
                                                
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                          

        `;
    $("#tabelhead").empty().html(dataTable);
    };


</script>

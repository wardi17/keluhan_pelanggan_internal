<script src="<?= base_url; ?>/assets/js/printObject.js"></script>

<?php $kodekln = $data['kodekeluhan']; 
	
?>
<main id="main" class="main">
  <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
    <section id="tampildata" class="section">
        <div class ="card">
			<input type="hidden" id="kodekln" value="<?=$kodekln?>">
            <div class="card-body">
         
           
                <div class="mt-4"  id="header_data"></div>
                <div id="tabelhead"></div>
            </div>
            <div id="printinvoce"></div>
            </div>
          
        </div>
     
    </section>
    <section id="InputPerbaikan" class="section">
    </section>

</main>

<script>
  $(document).ready(function(){
 
    const dateya = new Date();
    let bulan = dateya.getMonth()+1;
    let tahun = dateya.getFullYear();
    $("#filter_tahun").val(tahun);
    let kodekln =$("#kodekln").val();
    getDataList(tahun,kodekln);

     $(document).on("click",".ProsesPerbaikan",function(){
        
            let id = $(this).data("id");
			let kodetsn = $(this).data("kodetsn");
			
			
            $("#tampildata").hide();
            $("#InputPerbaikan").load("<?= base_url; ?>/custperbaikan/tambahdata",{id:id,kodetsn:kodetsn});
        })

  });




    function getDataList(tahun,kodekln){
		
        get_header();
        get_tables(tahun);
        $.ajax({
                url:'<?= base_url; ?>/listkeluhan/tampildatadetail',
                method:'POST',
                data:{tahun:tahun,kodekln:kodekln},
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
									return  html =`<a>${data} <sup>${row.NoTransaksi}</sup></a>`;
								}
							  },
                              { 'data': 'CustomerID'},
                              { 'data': 'Divisi' },
                              {'data':'TypeKeluhan'},
                              { 'data': 'Keluhan' },
                                { 'data': 'Penyebab'},
                                { 'data': 'User_log'},
                                { data:'',defaultContent:'', "render": function (data, type,row) { 
									//console.log(row);
                                  let st_proses = row.status_proses;
                                  let proses = row.tanggal_proses;
                                  let date_p = proses.split('-');
                                  let proses_date =date_p[0]+'-'+date_p[1]+'-'+date_p[2].slice(-2);
                                 
                                  let selesai = row.tanggal_selesai;
                                  let date_s = proses.split('-');
                                  let selesai_date =date_s[0]+'-'+date_s[1]+'-'+date_s[2].slice(-2);
									
								   let div_log = row.div_log;
                                   let leb ="";
                                   let sel = "";
                                  if(proses == "01-01-1970"){
                                    leb = "Perbaikan";
                                  }else{
                                    leb = proses_date;
                                  }
                                    let html = ``;
                                    if(st_proses == 1){
                                      html  =`<button type="button" id="btn_proses" style="width:100px" class="btn btn-sm text-center ">${leb}</button>`;
                                    }else{
										if(div_log == "CS"){
										  html  =`<button type="button" id="btn_proses"  data-id="${row.KodeKeluhan}" data-kodetsn="${row.NoTransaksi}"style="width:100px" 
										  class=" ProsesPerbaikan btn btn-sm text-center ">${leb}</button>`;
										}
                                    }
									
										// Tampilkan kolom aksi
                                 
                                      // html  +=`<button type="button" id="btn_selesai" data-tgl_selesai="${selesai}"  data-id="${row.id_kunjungan}"data-ket="${row.ket_selesai}" style="width:100px"
                                      // class=" open-selesai  btn btn-sm  mt-1" data-bs-toggle="modal" data-bs-target="#Selesai_Modal">${sel}</button>`;
                                    
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
	<button onclick="goBack()" type="button" class="btn btn-lg"><i class="fa-solid fa-chevron-left"></i></button>
    <h4 class="text-center">Input Perbaikan Detail</h4>
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
                                                <th style="width:15%">ID Keluhan</th>
                                                <th style="width:20%">CustomerID</th>
                                                <th style="width:2%">Divisi</th>
                                                <th style="width:30%">Type</th>
                                                <th style="width:30%">Keluhan</th>
                                                <th style="width:30%">Penyebab</th>
                                                <th style="width:30%">UserInput</th>
                                                <th style="width:15%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                          

        `;
    $("#tabelhead").empty().html(dataTable);
    };

	   function goBack(){
		
                window.location.replace(`<?=base_url?>/CustPerbaikan/index`);
            } 

</script>

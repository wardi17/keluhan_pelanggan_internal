<script src="<?= base_url; ?>/assets/js/printObject.js"></script>
<style>
.dataTables_wrapper,.btn-space {
    font-family: tahoma;
    font-size: 10px;
    position: relative;
    clear: both;
    *zoom: 1;
    zoom: 1;
}

#tabeldetail_length{
	position: relative !important;
	 top: -1px  !important;
    left: 5px  !important;
    width: 20%  !important;
    height: 0px  !important;
}
#tabeldetail_filter{
	top: -1px;
    position: relative !important;
	left: 5px  !important;	
	width: 100%  !important;
    height: 35px  !important;
}

 /* .thead{
    background-color:#E7CEA6;
    /* font-size: 8px;
    font-weight: 100 !important; */
    color :#000000;
  } */

.btn_tgl {
  border: none !important;
  background-color: inherit !important;
  padding: 0px 0px 0px 0px !important;
  cursor: pointer !important;
  display: inline-block !important;
}

.btn_tgl:hover {background: #eee !important;}

 </style>
 <?php
$kodekln = $data['kodekeluhan'];
$jml = $data['jumlah'];

 ?>
 <main id="main">
			<input type='hidden' class="form-control" id="kodekeluhan" value="<?=$kodekln?>">
             <div class="card-header">
						<h5 class="text-start">
							<button onclick="goBack()" type="button" class="btn btn-lg"><i class="fa-solid fa-chevron-left"></i></button>
						List Keluhan Detail </br>&ensp;&ensp; &ensp; &ensp;<?=$kodekln?><sup><?=$jml?></sup></h5>
            </div>
			 <div class="card-content">
				<div class="card-body">
				<div class="row col-md-12-col-12">
				   <div  class="col-md-12" id="TampilDetail"></div>
				   </div>
				 </div>
            </div>
		</div>	
</main>
<script>
  $(document).ready(function(){
 
    const dateya = new Date();
    let bulan = dateya.getMonth()+1;
    let tahun = dateya.getFullYear();
    $("#filter_tahun").val(tahun);
    let kode = $("#kodekeluhan").val();
    getDataList(tahun,kode);




      
  });



    function getDataList(tahun,kode){
		
        //get_header();

		
        $.ajax({
               url:'<?= base_url; ?>/listkeluhancust/tampildatacustdetail',
                method:'POST',
                data:{tahun:tahun,kode:kode},
                dataType:'json', 
							
                success:function(response){
					
					datatabeldetail(response)
                /* Swal.fire({
                      position: 'top-center',
                      icon: 'success',
                     title: "sucesss",
                       showConfirmButton: false,
					    timer:2000
                      }).then(function(){
							datatabel(response)
                          
                          
					  }); */
                    
                }
        });      
    } 
    
    function datatabeldetail(response){
		 get_tablesdetail();
		$("#tabeldetail").DataTable({
                            
                    "ordering": false,
					"destroy":true,
					"responsive": true,
					"bAutoWidth": false,			
                    "order":[[0,'desc']],
                            // dom: 'Plfrtip',
                            //     scrollCollapse: true,
                            paging:true,
                            //     "bPaginate":false,
                            //     "bLengthChange": false,
                            //     "bFilter": true,
                            //     "bInfo": false,
                            //     "bAutoWidth": false,
                            //     dom: 'lrt',
                                fixedColumns:   {
                                // left: 1,
                                    right: 1
                                },
                                pageLength: 5,
                                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
                                            
                                data: response,
								  'rowCallback': function(row, data, index){
									let st_keluhan = data.Status_keluhan;
									  if(st_keluhan == 1){
										  $('td', row).css('background-color', '#FFFB73');  
									}
								  },
                                    columns: [
                                            { data: 'tgl_input_detail', defaultContent: '',
											"render":function(data,type,row){

												let NoTransaksi = row.NoTransaksi;
												 if(type === 'display'){
														let html  =`
														  <a href='<?= base_url; ?>/listkeluhancust/jawabankeluhan?KodeKeluhan=${row.kode},NoTransaksi=${row.NoTransaksi}'>${data}</a>
													   `;
													return html;
												 }
												
											}
										  },
										 // {data :'kode'},
										  {data: 'keluhan_detail' },
										  {data: 'tgl_perbaikan_detail', defaultContent: '',
											"render":function (data,type,row){
												if(data !=='01-01-70 07:00'){
													return data;
												}else{
													return null;
												}
											}
											
										  },
										/*{data: null, defaultContent: '',
														 "render": function (data, type,row){ 
														  let tgl_pbk = row.tgl_perbaikan_detail
														  let html =``;
														  
														  if(tgl_pbk !=="01-01-70 07:00"){
														  html  =`<span type="text"  class="btn-warning  btn-sm btn-space">${row.perbaikan_detail}</span>`;	  
														  }else{
														   html  =`<button type="button"  class="btn btn-info  btn-sm btn-space" style="width:100px">Belum Jawab</button>`;	
														 
														 }
														 
														 return html;
														 }
										},*/
                                    
                                    
                                    ]      
                        
                        });
	}


    function get_tablesdetail(){
    //   let id ="#"+tabel;
    //   let substr_bulan = bulan.substr(0,3);
        let dataTable =`
                    <table id="tabeldetail" class='display' style='width:100%'>                    
                                    <thead  id='thead'class ='thead'>
                                    <tr>
                                               
                                                <th style="width:25%">Tgl Keluhan</th>
												<!--<th style="width:10%">ID Keluhan</th>-->
                                                <th style="width:25%">Keluhan</th>
                                                <th style="width:15%">Tgl Jawaban</th>
												<!--<th style="width:25">Jawaban</th>-->
												

                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                          

        `;
    $("#TampilDetail").empty().html(dataTable);
    };

	   function goBack(){
                window.location.replace(`<?=base_url?>/listkeluhancust/index`);
            } 


</script>

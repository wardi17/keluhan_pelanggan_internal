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

#tabel1_length{
	position: relative !important;
	 top: -1px  !important;
    left: 2px  !important;
    width: 20%  !important;
    height: 0px  !important;

}

#tabel1_filter{
	top: -1px;
    position: relative !important;
	left: 2px  !important;	
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


#letabel1_info{
    top: -1px;
    position: relative !important;
	left: 5px  !important;	
	width: 100%  !important;
    height: 35px  !important;
}


 </style>
<main id="main">
	<div class="card">
             <div class="card-header">
						<h5 class="text-center">List Keluhan</h5>
            </div>
			 <div class="card-content">
				<div class="card-body">
				<div class="row col-md-12-col-12">
				   <div  class="col-md-12" id="tabelhead"></div>
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
    let status = "All";
    getDataList(tahun,status);


 

        $(document).on("click",".DetailKeluhan",function(){
            let kode = $(this).data("kode");
            $("#tampildatahead").hide();
           $("#tampildatadetail").load("<?= base_url; ?>/listkeluhancust/subkeluhan",{kode:kode});
        });
		
		//untuk selsai Keluhan
		$(document).on("click","#keluhan_selesai",function(){
			let kode = $(this).data("kode");
			let kodetTrans = $(this).data("kodetransaki");
			$.ajax({
				url:"<?= base_url; ?>/listkeluhancust/keluhanselesai",
				method:"POST",
				dataType:"json",
				data:{'kode':kode,kodetransaksi:kodetTrans},
				success:function(response){
					
					Swal.fire({
                      position: 'top-center',
                      icon: 'success',
                     title: "sucesss",
                       showConfirmButton: false,
					    timer:2000
                      }).then(function(){
						location.reload();  
					  }); 
				}
			});
			
		});
		//end keluhan
  });




    function getDataList(tahun,status){
        //get_header();

		
        $.ajax({
                url:'<?= base_url; ?>/listkeluhancust/tampildata',
                method:'POST',
                data:{tahun:tahun,status:status},
                dataType:'json', 
				/*beforeSend :function(){
					Swal.fire({
					 // title: 'Sedang kirim Email...',
					  html: 'Please wait...',
					  allowEscapeKey: false,
					  allowOutsideClick: false,
					  didOpen: () => {
						Swal.showLoading()
					}
					  });
				  }, */				
                success:function(response){
					datatabel(response)
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
    
    function datatabel(result){
		  get_tables();
        $("#tabel1").DataTable({
                    "ordering": false,
					"destroy":true,
					"responsive": true,
					"bAutoWidth": false,			
                    "order":[[0,'desc']],
                    
                        data: result,
                        'rowCallback': function(row, data, index){
							 
							 let st_keluhan = data.Status_keluhan;
							  if(st_keluhan == 1){
								  $('td', row).css('background-color', '#FFFB73');  
							  }
                            },
                        pageLength: 5,
                        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],

                            columns: [
                              { data: 'TanggalInput', defaultContent: '',
								"render":function(data,type,row){
	                                
									 if(type === 'display'){
										    let html  =`
											 <a class="text-primary" type="text">${data}</a>
                                              <!--<a href='<?= base_url; ?>/listkeluhancust/jawabankeluhan?KodeKeluhan=${row.KodeKeluhan}'>${data}</a> -->

										   `;
										return html;
									 }
									
								}
							  },
							 { data: 'KodeKeluhan', defaultContent: '',
								"render":function(data,type,row){
									let jml = row.jumlah_transaksi;
									let kode = row.KodeKeluhan;
									let html=``;
									 if(type === 'display'){
										     
                                             html = `
											  <a href='<?= base_url; ?>/listkeluhancust/subkeluhan?KodeKeluhan=${kode},jumlahtransaksi=${jml}'>${data}<sup>${jml}</sup></a>`;
											 
											 
									 }
										return html;
								}
							  },
							 
                              {data: 'Keluhan' },
                              {data: 'tanggal_perbaikan', defaultContent: '',
								"render":function (data,type,row){
									if(data !=='01-01-70'){
										return data;
									}else{
										return null;
									}
								}
								
							  },
								 
                                {data: null, defaultContent: '',
                               	 "render": function (data, type,row){ 
								  let tgl_pbk = row.tanggal_perbaikan
								  let html =``;
								  
								  if(tgl_pbk !=="01-01-70"){
								  html  =`</br><span type="text" id="btn_tampilperbaikanxx"  data-id="${row.KodeKeluhan}" data-perbaikan="${row.perbaikan}"  class="btn-sm btn-space"><p style="background-color:#FF9209;">${row.perbaikan}</p></span>`;	  
								  }else{
								   html  =`</br><button type="button"   data-id="${row.KodeKeluhan}" class="btn btn-info  btn-sm btn-space" style="width:100px">Belum Jawab</button>`;	
                                 
                                 }
								 
								 return html;
								 }
                                },
								{data: null, defaultContent: '',
                               	 "render": function (data, type,row){ 
										//console.log(row);
										let status_kln = row.Status_keluhan;
										let kodeTransaki = row.kode_transaksi_trakhir;
									let html =``;
										if(status_kln == 0){
									     html  +=`<form action="<?= base_url; ?>/customer/addtransaksibaru" method="POST">
														<input type="hidden" name="KodeKeluhan" value="${row.KodeKeluhan}">
														<input type="hidden" name="IDType" value="${row.TypeKeluhan}">
														<button type="sumbit" style="width:100px" class="btn-primary  btn-sm btn-space mt-1"  style="width:100px">Add</button>
												</form>`;
										 
										 
                                         html   +=`</br><button type="button" id="keluhan_selesai" data-kode="${row.KodeKeluhan}" data-kodetransaki="${kodeTransaki}" style="width:100px"
                                                      class="btn btn-sm btn-space btn-secondary mt-1"  style="width:100px">Selesai</button>`;
										}else{
										 
											html   +=`</br><button type="button" 
                                                      style="width:100px"
                                                      class="open-sendmail  btn btn-sm btn-space btn-secondary mt-1"  style="width:100px">Keluan Selesai</button>`;
										}		
									return html;
								 }
								}

                             
                            ]      
                
              });
}
    function get_header(){
    let data_headr =`

    <div  class="page-heading mb-4 mt-3">
    <div class="page-title">
    <h5 class="text-center">List Keluhan</h5>
    </div></div>

    `;
    $("#header_data").html(data_headr);
    }

    function get_tables(){
    //   let id ="#"+tabel;
    //   let substr_bulan = bulan.substr(0,3);
        let dataTable =`
                    <table id="tabel1" class='display' style='width:100%'>                    
                                    <thead  id='thead'class ='thead'>
                                    <tr>
                                               
                                                <th style="width:25%">Tgl Keluhan</th>
												<th style="width:15%">ID Keluhan</th>
                                                <th style="width:25%">Keluhan</th>
                                                <th style="width:15%">Tgl Jawaban</th>
												<th style="width:25">Jawaban</th>
												<th style="width:10">Status</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                          

        `;
    $("#tabelhead").empty().html(dataTable);
    };


	$(document).on("click","#btn_tampilperbaikan",function(){
		$("#CatatanPerbaikan").modal('show');
		
		let pbk = $(this).data('perbaikan');
	
		 $(".modal-body #prebaikan").val(pbk);
		
	});

</script>

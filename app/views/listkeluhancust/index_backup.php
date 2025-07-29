<script src="<?= base_url; ?>/assets/js/printObject.js"></script>
<style>
.dataTables_wrapper {
    font-family: tahoma;
    font-size: 10px;
    position: relative;
    clear: both;
    *zoom: 1;
    zoom: 1;
}
 </style>
<div id="main">
 <section id="" class="section">
  <div class="card">
            <!-- <div class="card-header">
                    <div class="col-md-12 text-end mb-3">
                        <a  href="https://bestmegaindustri.com/testkirimemail.php" target="_blank" class="btn float-right btn-xs btn btn-primary">testkirim email</a>
                    </div>
            </div> -->
            <div class="card-body">
					<!--<form id="form_filter">
                        <div class=" row col-md-4">
                          <div class="col-md-2">
                               <select class ="form-control" id="filter_tahun"></select>
                            </div>
                             <div class="col-md-2">
                               <select class ="form-control" id="filter_status"></select>
                            </div>
                            <div class="col-md-2 mt-3">
                            <button  type="sumbit" name="sumbit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form> -->
           
               <div class="mt-4"  id="header_data"></div>
               <div id="tabelhead" class="mb-6"></div>
            </div>
            </div>
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
        $("#tabel1").DataTable({
                    "ordering": false,
					"destroy":true,
					"responsive": true,
					"bAutoWidth": false,			
                    "order":[[0,'desc']],
                    
                        data: result,
                        'rowCallback': function(row, data, index){
                        
                            },
                        pageLength: 5,
                        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],

                            columns: [
                              { data: 'TanggalInput' },
                           
                              {data: 'Keluhan' },
                              {data: 'tanggal_perbaikan'},
                              {data: 'tanggal_perbaikan'},
                                {data: null, defaultContent: '',
                                  "render": function (data, type,row){ 
							      // Tampilkan kolom aksi
                                  let html  ='<button type="button" id="btn_gambar"  data-id="'+row.KodeKeluhan+'" class=" open-gambar btn  btn-lg btn-space" data-bs-toggle="modal" data-bs-target="#Gambar_Modal"><i class="fa-solid fa-binoculars"></i></button>';
                                    // if(row.status_email_keluhan == 0){
                                      //html  +='<button  id="editdata" type="button" data-id="'+row.KodeKeluhan+'" class=" btn  btn-lg btn-space"><i class="fa-regular fa-pen-to-square"></i></button>&nbsp';
                                    // }
                                  
                                     return html;
                                 }
                                },
								 {data: null, defaultContent: '',
                                  "render": function (data, type,row){ 
								
								  let tgl_pbk = row.tanggal_perbaikan
								  let html =``;
								  
								  if(tgl_pbk !=="01-01-70"){
								  html  =`<button type="button" id="btn_tampilperbaikan"  data-id="${row.KodeKeluhan}" data-perbaikan="${row.perbaikan}" class="btn btn-warning  btn-sm btn-space" style="width:100px">${tgl_pbk}</button>`;	  
								  }else{
								   html  =`<button type="button"   data-id="${row.KodeKeluhan}" class="btn btn-info  btn-sm btn-space" style="width:100px">Belum perbaikan</button>`;	
                                 
                                 }
								 
								 return html;
								 }
                                },
							
								
                       

                             
                            ]      
                
              });
}
    function get_header(){
    let data_headr =`

    <div  class="page-heading mb-3">
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
                                               
                                                <th style="width:15%">Tgl Keluhan</th>
                                                <th style="width:30%">Keluhan</th>
                                                <th style="width:15%">Tgl Jawaban</th>
												<th style="width:20">Jawaban</th>


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

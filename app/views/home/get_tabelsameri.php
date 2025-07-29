

<script>
    $(document).ready(function(){
     
        const dateya = new Date();
        let bulan = dateya.getMonth()+1;
        let tahun = dateya.getFullYear();
        tabel_sameri(tahun);
        
$(document).on("click","#detailtransaksi",function(){
      let tahun ="";
      let status = "";
      let row = jQuery(this).closest('tr');
            let columns = row.find('td'); 
            columns.addClass('row-highlight');
            $.each(columns, function(key, item){
            switch(key){
                    case 0:
                        tahun = item.innerHTML;
                        break;
                    case 1:
                        status = item.innerHTML;
                        break;
                    }
            });
           
            $.ajax({
                url:'<?=base_url?>/home/datatabeldetail_all',
                method:'POST',
                data:{tahun:tahun,status:status},
                dataType:'json',
                 success:function(result){
					 //console.log( result);
					$("#tabelhead_sm").hide();
                    $("#tabelhead").show();
                      get_table_detail();
					  data_detail(result)
                 
                      //
                    }
                  });
    });
    });

	function get_table_detail(){
	
		    let dataTable =`
		  <section class="section">
				  <div class="card">
					  <div class="card-body">
					  <button onclick="goBack2()" class="btn btn-lg mb-2"><i class="fa-solid fa-arrow-left"></i></button>
					  <table id="tabeldetail" class='display table-info' >                    
									  <thead  id='thead'class ='thead'>
									  <tr>
										<th width="10px" class="text-start">Keluhan</th>
                                         <th class="text-start">ID</th>  
                                          <th class="text-start">CustomerID</th>
                                           <th class="text-start">Divisi</th>
                                           <th class="text-start">Keluhan</th>
                                          <th class="text-start">Penyebab</th>  
                                          <th class="text-start">Tgl Perbaikan</th>
                                          <th class="text-start">Perbaikan</th>
									  </tr>
									  </thead>
									  <tbody>
									  </tbody>
								  </table><br>
								  </div>
							  </div>
						  </section>
		  `;
	$("#tabelhead").empty().html(dataTable);
	}

    function tabel_sameri(tahun){

        get_head_sm();

        $.ajax({
        url:'<?=base_url?>/home/datatabelsm',
        method : 'POST',
        data :{tahun:tahun},
        dataType :'json',
        success : function(result){
            data_sameri(result);
        }
        });

    }

    function get_head_sm(){
        let dataTable =`
        <section class="section">
                <div class="card">
                        <div class="card-header">
                        </div>
                
                    <div class="card-body">
                    <p id="title" class="page-title">
                    </p>
					<!-- style="cursor:pointer" -->
                    <table  id="tabel_sm" class='display table-info' >                    
                                    <thead  id='thead'class ='thead'>
                                    <tr>
                                                <th>Tahun</th>
                                                <th>Status</th>
                                                <th>Jumlah</th>
    
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table><br>
                                </div>
                            </div>
                        </section>

        `;
    $("#tabelhead_sm").empty().html(dataTable);
};

function data_sameri(result){
    $("#tabel_sm").DataTable({
                    "ordering": false,
                    "destroy":true,
                    responsive: true,
                    columnDefs: [
                                    {
                                        targets:[0,1,2],
                                        className: 'board'}
                                    ],
                        fixedColumns:   {
                        // left: 1,
                            right: 1
                        },
                    "order":[[0,'desc']],
                    'rowCallback': function(row, data, index){
                        // $kategory =['OPEN','PROCESS','CLOSED'];
                        let status = data.status;
                    
                        if(status == "KELUHAN"){
                            $(row).find('td:eq(0)').css('color', '#0dcaf0');
                            $(row).find('td:eq(1)').css('color', '#0dcaf0');
                            $(row).find('td:eq(2)').css('color', '#0dcaf0');
                        }
                        if(status == "PERBAIKAN"){
                            $(row).find('td:eq(0)').css('color', '#20c997');
                            $(row).find('td:eq(1)').css('color', '#20c997');
                            $(row).find('td:eq(2)').css('color', '#20c997');
                        }
                        if(status == "SELESAI"){
                            $(row).find('td:eq(0)').css('color', '#6610f2');
                            $(row).find('td:eq(1)').css('color', '#6610f2');
                            $(row).find('td:eq(2)').css('color', '#6610f2');
                        }
                        if(status == "email"){
                            $(row).find('td:eq(0)').css('color', '#fd7e14');
                            $(row).find('td:eq(1)').css('color', '#fd7e14');
                            $(row).find('td:eq(2)').css('color', '#fd7e14');
                        }
                    
                    },
                        data: result,
                        pageLength: 5,
                        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
                            
                
                            columns: [
                            { data: 'tahun' },
                            { data: 'status'},
                            { data: 'jumlah',defaultContent:'',
								"render": function(data,type,row){
									
								  let html =``;
								 if(type === 'display'){
									 html = `<span type="button" style="cursor:pointer" id="detailtransaksi" data-tahun="${row.tahun}" data-status ="${row.status}">${data}</span>
									 
									 `;
								 }
								 return html;
								}
							},
                        
                            ]      
                
            });
        
}


//fungsi untuk menamilkan data detail
function data_detail(result){

 $("#tabeldetail").DataTable({
   responsive: true,

       "ordering": false,
       "destroy":true,
       //dom: 'Bfrtip',
       paging:true,
             autoWidth: false,
                           columnDefs: [
                           {
                               targets:[0,1,2,3,4,5,6,7],
                               className: 'nowrap'}
                           ],
                        
       "order":[[0,'desc']],
       
           data: result,
           pageLength: 5,
           lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
               columns: [
                 { 'data': 'TanggalInput' },
                 { data: 'KodeKeluhan',defaultContent:'',
					"render": function (data, type,row){
						let html =`<a target="_blank" href="<?=base_url?>/home/detail?KodeKeluhan=${row.KodeKeluhan}" >${data}<sup>${row.NoTransaksi}</sup></a>`;
						return html;
					}
				 },
                 { 'data': 'CustomerID' },
                 { 'data': 'Divisi' },
                 { 'data': 'Keluhan' },
                 { 'data': 'Penyebab' },
                 { 'data': 'tanggalperbaikan' },
				 {'data':'perbaikan'}
               ]      
   
 });
 
 
 
 
}
function goBack2() {
        $("#tabelhead_sm").show();
      $("#tabelhead").hide();
    
    }

</script>
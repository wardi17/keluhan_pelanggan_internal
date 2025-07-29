<style>





@media print {
    .vendorListHeading th {
      background-color:white !important;
      /* -webkit-print-color-adjust:exact; */
    }
}

@media print {
    .vendorListHeading th {
      color:white !important;
    }
    @page {
            margin: 10mm;
            size: auto;
            background-color: #FF0000; /* Ganti dengan warna latar belakang yang Anda inginkan */
        }
        .thead{
        background-color:#E7CEA6;
        /* font-size: 8px;
        font-weight: 100 !important; */
        color :#000000;
      }
}

.action {
	display: none;
}
.thead{
  background-color:#E7CEA6;
  /* font-size: 8px;
  font-weight: 100 !important; */
  color :#000000;
}
/* tr td {
  width: 20% !important;
} */
/* memberikan border pada tabel */
/* .table { border-right: 1px solid black; border-bottom: 1px solid black; }
.table th, .table td { border-left: 1px solid black; border-top: 1px solid black; padding: 3px; font-size: 12px} */
option{
  font-family: Helvetica !important;
  line-height: 1.0 !important;
  /* margin-bottom: 0;
  padding-bottom: calc(.375rem + 1px);
  padding-top: calc(.375rem + 1px); */
}
#tabelReport_filter{ 
  padding-bottom: 20px !important;
}
</style>

<script src="<?= base_url; ?>/assets/js/jquery.table2excel.js"></script>
<script src="<?= base_url; ?>/assets/js/jquery.table2excel.min.js"></script>

<script src="<?= base_url; ?>/assets/js/csvExport.js"></script>
<script src="<?= base_url; ?>/assets/js/jquery.PrintArea.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  

<main id="main" class="main">
  <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
    <section id="tampildata" class="section">
        <div class ="card">
            <div class="card-body">
            <div class=" mt-4">
              
                <form id="form_filter">
                <div class="text-start row col-md-12 mb-3">
                    <div class="row col-md-3 mb-3">
                                <label for="divisi" class="col-sm-4 col-form-label">Divisi</label>
                               <div class="col-sm-6">
                               <select class="form-control" id="divisi">
                                <option value="ALL">ALL</option>
                               <?php 
                               $cusdivisi = $data["divisi_cust"];
                               foreach($cusdivisi as $file):
                                          $nama = $file['divisi'];
                                      ?>
                                          <option value="<?= $nama ?>"><?= $nama ?></option>
                                  <?php endforeach;?> 
                                        </select>
                               </div> 
                      </div>
                          <div class="row col-md-3 mb-3">
                                    <label class="col-md-4 col-form-label">Tgl Awal:</label>
                                    <div class = "col-md-6">
                                       <input type="date" class=" form-control" id="tgl_from">
                                    </div>
                            </div>  
                            <div class="row col-md-3 mb-3">
                                    <label class="col-md-5 col-form-label">Tgl Akhir:</label>
                                    <div class = "col-md-6">
                                       <input type="date" class=" form-control" id="tgl_to">
                                    </div>
                            </div>
                            
                            <div class="row col-md-1 mb-3">
                              <button  type="sumbit" name="sumbit" id="filterdata"  class="btn btn-primary">Submit</button>
                            </div>
                    </div>
                    </form>
            <div id="printdata"></div>
            <div id="datalist">
                <div class="mains" id="tabelhead"></div>
            </div>
            </div>
        </div>
        </div>
     
    </section>
 

</main>
<script>
  $(document).ready(function(){
   /* $("#divisi").select2({
          containerCssClass: "form-control",
          theme: 'bootstrap-5'
        }); */
     //untuk tanggal awal
     var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
      let  output =  d.getFullYear()+ '-'+(month<10 ? '0' : '') + month + '-' +
                      (day<10 ? '0' : '') + day;
			gettanggalAwal();
          $("#tgl_to").val(output);
        

  

 //end show hiden user

 function  showhideuser(div_btn,use_btn){
  let nilai_12 = $(div_btn).val();

          if(nilai_12 == undefined){
            $(use_btn).hide();
          }else{
            $(use_btn).show();
          }
 }
   // untuk menamilkan data
   $(document).on("click","#filterdata",function(e){
        e.preventDefault();
        let tgl_awal = $("#tgl_from").val();
       let  start_date =tgl_awal;
       let  tgl_akhir = $("#tgl_to").val();
       let  end_date =tgl_akhir;
        
       let divisi = $("#divisi").find(":selected").val();
    
    
        get_data_User(start_date,end_date,divisi);
   })
   //end data
  });
// batas documenet ready

//untuk tanggal awal di awal bulan
	function gettanggalAwal(){
		 let currentDate = new Date();
		 currentDate.setDate(1);
		let formattedDate = currentDate.toISOString().slice(0,10);
		$("#tgl_from").val(formattedDate);
	}

//end tanggal awal bulan
  // untuk divisi 
 

  //end divisi

    function  get_buttonid(str_kode){
      let split_kode = str_kode.split(",");

      for(const id_kode of split_kode){
            let id_user = "#button_"+id_kode;
            let  oncheck = $("checkdivisi").val();
                // console.log(oncheck)
            $(document).on("change",id_user,function(){
                let div = $(this).val();  
                let kode = "#btnuser_"+div;
                getdataUser(div);
                getformtanggal();              
            });
      }
    }

    function  getdataUser(div){
      let kode = "#btnuser_"+div;
        $.ajax({
            url:"<?=base_url?>/user/getuser",
            method:'POST',
            dataType:'json',
            data :{divisi:div},    
            success:function(response){
              // if(response !== null){
             
                let dts =``;
                $.each(response,function(key,value){
                   let kode_div = value.divisi_user;
                      let nama = value.nama;
                             dts +=`
                                              <div class="form-check form-check-inline col-md-5">
                                                              <input class="form-check-input checknama" for ="" type="checkbox" id="namaUser"name="namauser[]" value="${nama}">
                                                              <label class="form-check-label">${nama}</label>
                                                  </div>
                                              `;
                                                //datause(kode_div,nama);
                });
       
                $(kode).empty().html(dts)
              }
            });
            
    }

// UNTUK MENAMILKAN DATA USER
function get_data_jenis(divisi){
  $.ajax({
        url:"<?=base_url?>/report/getuser",
        method:'POST',
        dataType:'json', 
        data:{kode_div:divisi},     
        success:function(response){
              let data =``;
            $.each(response,function(key,value){
              
              let jenis = value.nama_jenis_kon;
               $("#jenis").append($('<option/>').val(jenis).html(jenis));  
            });
        
      }

      });
}
//END DATA USER



  //fungsi format tanggal 
      function myformat(date){
      let d = date.split('/')[0];
    
      let m = date.split('/')[1];
      let y = date.split('/')[2];
      let format = y + "-" + m + "-" + d;
      return format;
    }
//end format tanggal


    function get_data_User(start_date,end_date,divisi){
       // get_header();
        $.ajax({
                url:'<?= base_url; ?>/reportviews/laporandata1',
                method:'POST',
                dataType:'json',
                data:{start_date:start_date,end_date:end_date,divisi},     
                success:function(response){

                        let dataTable =``;
                        // let  id =``;
                          dataTable +=`
                          <div  class="page-heading mb-3">
                              <div class="page-title">
                              <h4 class="text-center">Views</h4>
                              </div>
                          </div>`;
                          dataTable +=`
                                    <table id="tabelReport" class='display table-info' style='width:100%'>                    
                                                    <thead class="thead">
                                                    <tr>
                                                                <th >Tgl Keluhan</th>
                                                                <th>ID</th>  
                                                                <th>CustomerID</th>
                                                                <th>Divisi</th>
                                                                <th>Keluhan</th>
                                                                <th>Penyebab</th>  
                                                                <th >Tgl Perbaikan</th>
                                                                <th >Perbaikan</th>
																<th >Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>`;
                    $.each(response,function(key,b){
                              dataTable +=`
                                          <tr>
                                            <td style="min-width:8px !important;" width="8px">${b.TanggalInput}</td>
                                            <td style="min-width:11px !important;" width="11px"><a href="<?=base_url?>/reportviews/listtransaksiviews?KodeKeluhan=${b.KodeKeluhan}" >${b.KodeKeluhan}<sup>${b.NoTransaksi}</sup></a></td>
                                            <td  style="min-width:8px !important;"  width="10px">${b.CustomerID}</td>
                                            <td width="10px">${b.Divisi}</td>
                                            <td width="15px">${b.Keluhan}</td>
                                            <td width="15px">${b.Penyebab}</td>
                                            <td width="8px">${b.tanggalperbaikan}</td>
                                            <td width="15px">${b.perbaikan}</td>
											<td width="8px">
											 <form action="<?= base_url;?>/reportviews/allviewsdata" method="POST">
											   <input type="hidden" name="KodeKeluhan" value="${b.KodeKeluhan}">
											<button type="sumbit" class="btn btn-info">All</button>
											</form>
											</td>
                       `
                            dataTable+=`</tr>`;
                        });
                        dataTable+=`</tbody></table>`;
                     $("#tabelhead").empty().html(dataTable);
                //   let str_id = id.slice(0,-1);
                  datatabelUser()
                  //printdata();
                }
        });      
    } 

    function datatabelUser(){
       
                let id_tbl ="#tabelReport";
                $(id_tbl).DataTable({
        
                  rowReorder: {
                      selector: 'td:nth-child(2)'
                  },
                  
              responsive: true,
              "ordering": false,
                 "":true,
                  dom: 'Plfrtip',
                    scrollCollapse: true,
                    fixedColumns:   {
                       // left: 1,
                        right: 1
                    },
                pageLength: 5,
                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
                    style_cell:{'fontSize':5, 'font-family':'sans-serif'},
                    "order":[[0,'desc']],
            })
                 
    }



  

      function printdata(){
        tgl_awal = $("#tgl_from").val();
        start_date = myformat(tgl_awal);
        tgl_akhir = $("#tgl_to").val();
        end_date = myformat(tgl_akhir);
        
        let print =`
            <div class=" row text-end col-md-4"> 
              <div class="text-end col-md-2">
                  <button id="printExcel" class="btn btn-primary">Excel</button>
              </div>
              
           
          <div>
        `
        $("#printdata").empty().html(print);
        // <div class=" hidden text-end col-md-2">
        //       <form role="form" action="<?= base_url; ?>/exksporpdf" target="_blank" method="POST" enctype="multipart/form-data">
        //           <input type="hidden" class="form-control"name="start_date" value ="${start_date}">
        //           <input type="hidden" class="form-control"name="end_date" value ="${end_date}">
        //          <button type="submit" class="btn btn-primary">PDF</button>
        //       </form>
        //       </div>
      }

      // $(document).on("click","#printInvoice",function(){
      //   //$("#headerNo").hide();
      //  $('#tabelhead').printArea();

      //   });

   
    var form = $('#tabelhead'),  
    cache_width = form.width(),  
    a4 = [595.28, 841.89,295.28]; 



    $(document).on("click","#printInvoice",function(){   
      tgl_awal = $("#tgl_from").val();
        start_date = myformat(tgl_awal);
        tgl_akhir = $("#tgl_to").val();
        end_date = myformat(tgl_akhir);
        $.ajax({
                url:'<?= base_url; ?>/report/laporandata1',
                method:'POST',
                dataType:'json',
                data:{start_date:start_date,end_date:end_date},     
                success:function(response){
                }
              });

    });







    $(document).on("click","#printExcel",function(){
          $("#tabelhead").table2excel({
            // exclude CSS class
            exclude: ".noExl",
            name: "Transaski keluhan pelanggan",
            filename: "Transaski keluhan pelanggan", //do not include extension
            fileext: ".xls", // file extension
            exclude_img: true,
            exclude_links: true,
            preserveFont:true,
            exclude_inputs: true
          })
    })
</script>

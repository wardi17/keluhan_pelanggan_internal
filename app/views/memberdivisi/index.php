<?php 
$membedivisi = $data['memberdivisi'];
$kode_div = $data['kode_divisi'];
?>
<div class ="col-md-12 col-12">
        <div class="card">
            <div class="card-content">
            <button onclick="goBack()" type="button" class="btn btn-lg mt-4"><i class="fa-solid fa-chevron-left"></i></button>
            <div class="card-body">
            <div  class="page-heading mb-3">
                  <div class="page-title">
                  <h4 class="text-center">Member Divisi</h4>
                  </div>
                </div>
            <input type="hidden" class="form-control" id="data_id" value="<?=$kode_div?>">
                    <div class="col-md-12 text-end mb-3">
                        <button type="button" class="btn btn-lg " data-bs-toggle="modal" data-bs-target="#TambaModal_divisi">
                        <i class="fa-regular fa-file"></i>   
                    </div>
            <table id="tabel_mbr" class='display table-info' style='width:100%'>                    
                                        <thead  id='thead'class ='thead'>
                                        <tr>
                                                    <th style="width:0%">Kode Divisi</th>
                                                    <th style="width:0%">Nama Member</th>
                                                    <th style="width:0%">Email</th>
                                                    <th style="width:0%">Action</th>  
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($membedivisi as $item):?>
                                        <tr>
                                            <td><?=$item["kode_divisi"]?></td>
                                            <td><?=$item["nama"]?></td>
                                            <td><?=$item["email"]?></td>
                                            <td>
                                            <button type="button" data-div="<?=$item["kode_divisi"]?>" data-nama="<?=$item["nama"]?>" data-email ="<?=$item["email"]?>"  class=" open-Memberedit btn btn-lg btn-space" data-bs-toggle="modal" data-bs-target="#EditModal_Member"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button type="button" data-div="<?=$item["kode_divisi"]?>" data-nama="<?=$item["nama"]?>" data-email ="<?=$item["email"]?>"   class=" open-Memberdelete  btn  btn-lg" data-bs-toggle="modal" data-bs-target="#DeleteModal_Member"><i class="fa-regular fa-trash-can"></i></button>   
                                            </td>
                                        </tr>
                                        <?php endforeach;?>  
                                        </tbody>
                                    </table>
            
            </div>
                               
            </div>
            </div>
        </div>
<script>
    $(document).ready(function(){
        $("#tabel_mbr").DataTable({
                    response:true,
                    "ordering": false,
                    "destroy":true,
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
                                    
                });
    });

    function goBack(){
        window.location.replace("<?= base_url; ?>/divisi/index");
    }
</script>

<!-- <script>
    // fungsi untuk tampildata member divisi
    function getmember_divisi(kode){
        $.ajax({
                url:'models/member_divisi/tampildata.php',
                method:'POST',
                data :{kode:kode},
                dataType:'json',      
                success:function(response){

                header_mbr();
                tables_mbr();

                $("#tabel_mbr").DataTable({
                    response:true,
                    "ordering": false,
                    "destroy":true,
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
                            columns: [
                                { 'data': 'kode_divisi' },
                                { 'data': 'nama' },
                                { 'data': 'email' },

                                { "render": function ( data, type,row) { // Tampilkan kolom aksi
                                  let div = row.kode_divisi;
                                  let nama = row.nama;
                                  let email = row.email;
                                  let html  =`<button type="button" data-div="${div}" data-nama="${nama}" data-email ="${email}"  class=" open-Memberedit btn btn-lg btn-space" data-bs-toggle="modal" data-bs-target="#EditModal_Member"><i class="fa-regular fa-pen-to-square"></i></button>`
                                html += `<button type="button" data-div="${div}" data-nama="${nama}" data-email ="${email}"  class=" open-Memberdelete  btn  btn-lg" data-bs-toggle="modal" data-bs-target="#DeleteModal_Member"><i class="fa-regular fa-trash-can"></i></button>`

                                return html
                                }
                                },
                            ]      
                
                });
                }
        }); 
      }
      //end fungsi tampil divisi
      
      function header_mbr(){
        let data_headr =`

        <div  class="page-heading mb-3">
        <div class="page-title">
        <h4 class="text-center">Member Divisi </h4>
        </div></div>

        `;
        $("#header_member").html(data_headr);
    }

    function tables_mbr(){
        //   let id ="#"+tabel;
        //   let substr_bulan = bulan.substr(0,3);
            let dataTable =`
           
                        <table id="tabel_mbr" class='display table-info' style='width:100%'>                    
                                        <thead  id='thead'class ='thead'>
                                        <tr>
                                                    <th style="width:0%">Kode Divisi</th>
                                                    <th style="width:0%">Nama Member</th>
                                                    <th style="width:0%">Email</th>
                                                    <th style="width:0%">
                                                    <p class="text-center">Action</p></th>  
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                              

            `;
        $("#tables_mbr").empty().html(dataTable);
    };
</script> -->
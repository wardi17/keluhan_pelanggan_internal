<script>
    
    $(document).ready(function(){
        $("#customer").on("change",function(){
            let cs_id = $(this).val();
         
            $.ajax({
            url:'<?= base_url; ?>/customer/caricustomer',
            method:"POST",
            data:{id:cs_id},
            dataType: "json",
            beforeSend :function(){
            Swal.fire({
             // title: 'Sedang kirim Email...',
              html: 'Please wait...',
              allowEscapeKey: false,
              allowOutsideClick: false,
              didOpen: () => {
                Swal.showLoading()
            }
              });
          },
            success:function(result){
                let atten = result.CustCoName;
                let address = result.CustAddress;
                let CustTelpNo = result.CustTelpNo;
                Swal.fire({
                        position: 'top-center',
                      icon: 'success',
                      title: "data customer",
                     showConfirmButton: false,
					    timer:2000
                      }).then(function(){
						      $("#atten").val(atten),
							$("#address").val(address),
							$("#phone").val(CustTelpNo),
					  });
                    
          
            
            
            )
            }
         });
        });
    })
</script>

<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css"/>
<script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script language="javascript" type="text/javascript">
 $(document).ready(function() {
 
   $("#addDeliveryRow").click(function () {
			var newRow = '<tr><td><input type="text" name="invoiceItem" value="" id="" maxlength="" size="" style=""  /></td><td><input type="text" name="invoiceQty" value="" id="" maxlength="" size="" style=""  />		</td><td><input type="text" name="invoicePrice" value="" id="" maxlength="" size="" style=""  />		</td><td><input type="text" name="invoiceAmt" value="" id="" maxlength="" size="" style=""  />		</td><td><input type="text" name="invoiceAction" value="" id="" maxlength="" size="" style=""  />		</td></tr>';
			$('table#deliveryTable').append(newRow);
   });
   
   
   $("#outgoing").change(function(){
    $.ajax({
        url: '<?php echo base_url().'index.php/admin/goto_view_items_supplier';?>',
        data: {supplier_name: $(this).val()},
        type: "post",
        success: function(data){
			$('.invoiceItem').html(data);
		},
		error: function (xhr, ajaxOptions, thrownError) {

      }
	});
  });

  $('.invoiceItem').change(function(){
		var row = $(this).parent().parent();
		$.ajax({
        url: '<?php echo base_url().'index.php/admin/goto_view_items_byCode';?>',
        data: {item_code: $(this).val()},
        type: "post",
        success: function(data){
		var temp = JSON.parse(data);
		$("td:nth-child(3) input.invoicePrice", row).val(temp['cost']);
		},
		error: function (xhr, ajaxOptions, thrownError) {

      }
	});
  });
  
  
  //end of document ready
});  
  
</script>
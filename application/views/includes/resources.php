
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css"/>
<script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script language="javascript" type="text/javascript">
 $(document).ready(function() {
 
 /*
	Add new row to delivery table on button click
 */
   $("#addDeliveryRow").click(function () {
			var newRow = '<tr><td><select name="invoiceItem" class="invoiceItem" autocomplete="off" required><option value="" selected="selected">Select one</option></select></td><td><input type="number" name="invoiceQty" value="" id="" class="invoiceQty" maxlength="" size="" style="" autocomplete="off" required /></td><td><input type="text" name="invoicePrice" value="" id="" class="invoicePrice" maxlength="" size="" style="" autocomplete="off" readonly="readonly" required /></td><td><input type="text" name="invoiceAmt" value="" id="" class="invoiceAmt" maxlength="" size="" style="" autocomplete="off" readonly="readonly" required /></td><td><input type="button" value="Delete Row" onclick="DeleteRowFunction(this)" /></td></tr>';
			$('table#deliveryTable').append(newRow);
			$.ajax({
					url: '<?php echo base_url().'index.php/admin/goto_view_items_supplier';?>',
					data: {supplier_name: $('#outgoing').val()},
					type: "post",
					success: function(data){
					$('table#deliveryTable tr:last select.invoiceItem').html(data);
					},
					error: function (xhr, ajaxOptions, thrownError) {

					}
			});
   });
   
 /*
	change dropdown of items when suppliers change
 */  
   $("#outgoing").change(function(){
    $.ajax({
        url: '<?php echo base_url().'index.php/admin/goto_view_items_supplier';?>',
        data: {supplier_name: $(this).val()},
        type: "post",
        success: function(data){
			$('.invoiceItem').html(data);
			$('input.invoicePrice').val('');
			$('input.invoiceQty').val('');
			$('input.invoiceAmt').val('');
		},
		error: function (xhr, ajaxOptions, thrownError) {

      }
	});
  });

/*
	change price field when item value changes
*/
  $(document).on('change','.invoiceItem',function(){
		var row = $(this).parent().parent();
		$(this).parent().parent().find(":input[type='text'],:input[type='number']").val('');
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
 
/*
	udpate amount value when quantity price changes
*/ 
   $(document).on('keyup','.invoiceQty',function(){
		var row = $(this).parent().parent();
		var price = $("td:nth-child(3) input.invoicePrice", row).val();
		var total = 0;
		if(!isNaN(price) && price!="")$("td:nth-child(4) input.invoiceAmt", row).val($(this).val() * price);
		
		$('table#deliveryTable tr').each(function(){
			var s = $(this).find('input.invoiceAmt').val();
        //do your stuff, you can use $(this) to get current cell
			if(!isNaN(s) && s!="") total = total + parseFloat(s);
		});
		$('#totalPrice').val(total);
  });
  
  
  //end of document ready
});  

	//delete a table row
	function DeleteRowFunction(o) {
	
	var count = $('#deliveryTable tr').length;
		if(count>2){
			 var p=o.parentNode.parentNode;
			 p.parentNode.removeChild(p);
		}
	}
  
</script>
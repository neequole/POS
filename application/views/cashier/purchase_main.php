PURCHASE
<br>
<?php echo $message; ?>
<?php echo form_open('cashier/add_item') ?>	
	<label> Bar Code </label> <input type="search" name="search_item">
	<label> Quantity </label> <input type="number" name="quantity" value="1" min="1">
	<?php echo form_submit('enterItem_submit','Enter'); ?>
<?php echo form_close(); ?>

<?php $this->load->view('cashier/purchase_list'); ?>






	




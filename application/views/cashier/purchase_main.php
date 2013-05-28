PURCHASE
<br>
<?php echo form_open('cashier/trans') ?>
	ENTER ITEM <input type="search" name="search_item">
	<?php echo form_submit('purchase_submit','Enter'); ?>
<?php echo form_close(); ?>

<?php $this->load->view('cashier/purchase_list'); ?>	




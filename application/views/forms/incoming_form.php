<div id="incoming_form" class="forms">
	<?php 
		$options = array(
				'empty' => ' ',
				'warehouse' => 'Warehouse',
				'supplier' => 'Supplier' ,
				'other' => 'Others'
			);

		echo 'Incoming: '.form_dropdown('outgoing', $options).'<br>'; 
		echo 'Incoming Description <br>'.form_textarea(array('rows' => '5', 'cols'=>'20', 'name' => 'in_desc')).'<br>';
		echo anchor('', 'Enter Delivery').'<br>';
	?>
</div>
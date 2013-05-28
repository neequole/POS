<div id="outgoing_form" class="forms">
	<?php 
		$options = array(
				'empty' => ' ',
				'transfer' => 'Transfer',
				'return' => 'Return Product' ,
				'bad_order' => 'Bad Order' ,
				'other' => 'Others'
			);

		echo 'Outgoing: '.form_dropdown('outgoing', $options).'<br>';
		echo 'Item: '.form_input('outgoing_product', '').anchor('', 'Search').'<br>';
		echo 'Outgoing Description <br>'.form_textarea(array('rows' => '5', 'cols'=>'20', 'name' => 'out_desc'));
	?>
</div>
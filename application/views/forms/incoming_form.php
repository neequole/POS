<?php

echo validation_errors();
echo form_open('delivery/create');	//Controller -> Delivery, Action -> Create	

	echo '<label for="invoiceDate">Delivery date: </label>';	//delivery date
	$data = array(
              'name'        => 'invoiceDate',
              'id'          => '',
              'value'       => date('m/d/Y'),
              'maxlength'   => '',
              'size'        => '',
              'style'       => '',
			  'readonly'	=> 'readonly'
    );

	echo form_input($data).'<br/>';
	
	$data = array();
	$data['default'] = 'Please Select';
	foreach($supplier as $row){
		$data[$row->supplier_name] = $row->supplier_name;
	}
	
	echo 'Incoming from: '.form_dropdown('outgoing', $data,'default','id="outgoing" autocomplete="off"').'<br>'; 
	echo 'Incoming Description <br>'.form_textarea(array('rows' => '5', 'cols'=>'20', 'name' => 'in_desc')).'<br>';		//comments
		
?>
	<table id="deliveryTable">
	<tr><th>Item</th><th>Quantity</th><th>Price</th><th>Amount</th><th>Action</th></tr>
	<tr id='hellos'>
		<td>											
		<?php
		$options = array(
			'default' => 'Select one'
        );		//item
		echo form_dropdown('invoiceItem',$options,'default','class="invoiceItem" autocomplete="off"');
		?>
		</td>
		<td>
		<?php											//quantity
			$data = array(
				  'name'        => 'invoiceQty',
				  'id'          => '',
				  'value'       => '',
				  'maxlength'   => '',
				  'size'        => '',
				  'style'       => '',
		);

		echo form_input($data);
		?>
		</td>
		<td>
		<?php
			$data = array(								//price
				  'name'        => 'invoicePrice',
				  'id'          => '',
				  'class'		=> 'invoicePrice',
				  'value'       => '',
				  'maxlength'   => '',
				  'size'        => '',
				  'style'       => '',
				  'readonly'	=> 'readonly'
		);

		echo form_input($data);
		?>
		</td>
		<td>
		<?php
			$data = array(								//amount = qty * price
				  'name'        => 'invoiceAmt',
				  'id'          => '',
				  'value'       => '',
				  'maxlength'   => '',
				  'size'        => '',
				  'style'       => '',
				  'readonly'	=> 'readonly'
		);

		echo form_input($data);
		?>
		</td>
		<td>
		<?php
			$data = array(								//action{delete}
				  'name'        => 'invoiceAction',
				  'id'          => '',
				  'value'       => '',
				  'maxlength'   => '',
				  'size'        => '',
				  'style'       => '',
		);

		echo form_input($data);
		?>
		</td>
	</tr>
	</table>
	<?php
			$data = array(
			'name' => 'addDeliveryRow',
			'id' => 'addDeliveryRow',
			'value' => '',
			'type' => 'button',
			'content' => 'Add Row'
		);

		echo form_button($data);
	
	?>
	<br/>
	<label for="totalPrice">Total: </label><input type="input" name="totalPrice" readonly/><br/>
	<input type="submit" name="submit" value="Submit" />
</form>
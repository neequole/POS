<?php

echo validation_errors();
echo form_open('cashier/createDelivery');	//Controller -> Delivery, Action -> Create	

	echo '<label for="invoiceDate">Delivery date: </label>';	//delivery date
	$data = array(
              'name'        => 'invoiceDate',
              'id'          => '',
              'value'       => date('m/d/Y'),
              'maxlength'   => '',
              'size'        => '',
              'style'       => '',
			  'required'	=> 'required',
			  'readonly'	=> 'readonly'
    );

	echo form_input($data).'<br/>';
	
	$data = array();
	$data[''] = 'Please Select';
	foreach($supplier as $row){
		$data[$row->supplier_name] = $row->supplier_name;
	}
	
	echo 'Incoming from: '.form_dropdown('outgoing', $data,'','id="outgoing" autocomplete="off" required').'<br>'; 		//incoming from
	echo 'Incoming Description <br>'.form_textarea(array('rows' => '5', 'cols'=>'20', 'name' => 'in_desc', 'autocomplete' => 'off')).'<br>';		//comments
		
?>
	<table id="deliveryTable">
	<tr><th>Item</th><th>Quantity</th><th>Price</th><th>Amount</th><th>Action</th></tr>
	<tr>
		<td>											
		<?php											//item
		$options = array(
			'' => 'Select one'
        );		
		echo form_dropdown('invoiceItem',$options,'','class="invoiceItem" autocomplete="off" required');
		?>
		</td>
		<td>
		<?php											//quantity
			$data = array(
				  'name'        => 'invoiceQty',
				  'type'		=> 'number',
				  'id'          => '',
				  'class'		=> 'invoiceQty',
				  'value'       => '',
				  'maxlength'   => '',
				  'size'        => '',
				  'style'       => '',
				  'required'	=> 'required',
				  'autocomplete' => 'off'
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
				  'autocomplete' => 'off',
				  'required'	=> 'required',
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
				  'class'		=>	'invoiceAmt',
				  'value'       => '',
				  'maxlength'   => '',
				  'size'        => '',
				  'style'       => '',
				  'autocomplete' => 'off',
				  'required'	=> 'required',
				  'readonly'	=> 'readonly'
		);

		echo form_input($data);
		?>
		</td>
		<td>
			<input type="button" value="Delete Row" onclick="DeleteRowFunction(this)" />
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
	<label for="totalPrice">Total: </label><input type="input" name="totalPrice" id='totalPrice' autocomplete="off" readonly/><br/>
	<input type="submit" name="submit" value="Submit" />
</form>
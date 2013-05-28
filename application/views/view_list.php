<?php 
	if($list_id==1) { 	// items list
		echo '<h3> VIEW ITEMS </h3>';
		if($message) {
			echo $message;
		}
		else {
			echo '<div id="view_item" class="view">';

				echo '<table border="1px solid brown">
				<tr>
					<th> Bar Code </th>
					<th> Item Code</th>
					<th> Description 1 </th>
					<th> Description 2 </th>
					<th> Description 3 </th>
					<th> Description 4 </th>
					<th> Group </th>
					<th> Classification 1 </th>
					<th> Classification 2 </th>
					<th> Cost </th>
					<th> Retail Price </th>
					<th> Model Quantity </th>
					<th> Supplier Code </th>
					<th> Manufacturer </th>
					<th> Quantity </th>
					<th> Reorder Point </th>
					<th> Action </th>
				</tr>';
			
			
			foreach ($items as $r) {
				echo '<tr>';
				echo '<td>'.$r->bar_code.'</td>';
				echo '<td>'.$r->item_code.'</td>';
				echo '<td>'.$r->desc1.'</td>';
				echo '<td>'.$r->desc2.'</td>';
				echo '<td>'.$r->desc3.'</td>';
				echo '<td>'.$r->desc4.'</td>';
				echo '<td>'.$r->group.'</td>';
				echo '<td>'.$r->class1.'</td>';
				echo '<td>'.$r->class2.'</td>';
				echo '<td>'.$r->cost.'</td>';
				echo '<td>'.$r->retail_price.'</td>';
				echo '<td>'.$r->model_quantity.'</td>';
				echo '<td>'.$r->supplier_code.'</td>';
				echo '<td>'.$r->manufacturer.'</td>';
				echo '<td>'.$r->quantity.'</td>';
				echo '<td>'.$r->reorder_point.'</td>';
				echo '<td>'.anchor('admin/delete_item/'.$r->item_code,'Delete');
				echo ' '.anchor('', 'Edit').'</td>';
				echo '</tr>';
			}
			echo '</table></div>';
		}
	}
?>

<?php 
	if($list_id==2) {	//customer list 
		echo '<h3> VIEW CUSTOMERS </h3>';
		if($message) {
			echo $message;
		}
		else {
			echo '<div id="view_customer" class="view">';

			echo '<table border="1px solid brown">
				<tr>
					<th> Customer ID </th>
					<th> Customer Name</th>
					<th> Balance </th>
					<th> Transaction ID</th>
					<th> Transaction Date </th>
					<th> Item Code </th>
				</tr>';

			echo $message;
			foreach ($customers as $r) {
				echo '<tr>';
				echo '<td>'.$r->customer_id.'</td>';
				echo '<td>'.$r->customer_name.'</td>';
				echo '<td>'.$r->balance.'</td>';
				echo '<td>'.$r->trans_id.'</td>';
				echo '<td>'.$r->trans_date.'</td>';
				echo '<td>'.$r->item_code.'</td>';
				echo '</tr>';
			}

			echo '</table></div>';
		}
	}
?>

<?php 
	if($list_id==3) {	//delivery list 
		echo '<h3> VIEW DELIVERY </h3>';
		if($message) {
			echo $message;
		}
		else {
			echo '<div id="view_delivery" class="view">';

			echo '<table border="1px solid brown">
				<tr>
					<th> Supplier ID </th>
					<th> Supplier Name</th>
					<th> Delivery ID </th>
					<th> Delivery Date</th>
					<th> Delivered Item </th>
				</tr>';

			echo $message;
			foreach ($delivery as $r) {
				echo '<tr>';
				echo '<td>'.$r->supplier_id.'</td>';
				echo '<td>'.$r->supplier_name.'</td>';
				echo '<td>'.$r->delivery_id.'</td>';
				echo '<td>'.$r->date_delivered.'</td>';
				echo '<td>'.$r->item_code.'</td>';
				echo '</tr>';
			}

			echo '</table></div>';
		}
	}
?>



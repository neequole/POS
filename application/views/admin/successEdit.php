<?php 
	
		echo '<h3> ITEM UPDATED!</h3>';
	
			$myitem = $this->pos_model->get_edit_item($edit);

	foreach ($myitem as $r) {

  echo '
  		<b>Bar Code:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->bar_code.'<br />
		<b>Item Code:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->item_code.'<br>
		<b>Description 1 (brandm sub-brand):</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->desc1.'<br>
		<b>Description 2 (product_name):</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->desc2.'<br>
		<b>Description 3 (variant, flavor):</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->desc3.'<br>
		<b>Description 4 (size, packaging):</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->desc4.'<br>
		<b>Group:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->group.'<br>
		<b>Classification 1:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->class1.' <br>
		<b>Classification 2:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->class2.'<br>
		<b>Cost:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->cost.'<br>
		<b>Retail Price:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->retail_price.'<br>
		<b>Model Quantity:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->model_quantity.'<br>
		<b>Supplier Code:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->supplier_code.'<br>
		<b>Manufacturer:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->manufacturer.'<br>
		<b>Quantity:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->quantity.'<br>
		<b>Reorder Point:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$r->reorder_point.'<br>';

	
		}
		
	
?>
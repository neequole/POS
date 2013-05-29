<?php 
	
		echo '<h3> ITEM UPDATED!</h3>';
	
			$myitem = $this->pos_model->get_edit_item($edit);

	foreach ($myitem as $r) {

  echo 'Bar Code: '.$r->bar_code.'<br />
		Item Code: '.$r->item_code.'<br>
		Description 1 (brandm sub-brand): '.$r->desc1.'<br>
		Description 2 (product_name): '.$r->desc2.'<br>
		Description 3 (variant, flavor): '.$r->desc3.'<br>
		Description 4 (size, packaging): '.$r->desc4.'<br>
		Group: '.$r->group.'<br>
		Classification 1: '.$r->class1.' <br>
		Classification 2: '.$r->class2.'<br>
		Cost: '.$r->cost.'<br>
		Retail Price: '.$r->retail_price.'<br>
		Model Quantity: '.$r->model_quantity.'<br>
		Supplier Code: '.$r->supplier_code.'<br>
		Manufacturer: '.$r->manufacturer.'<br>
		Quantity:  '.$r->quantity.'<br>
		Reorder Point: '.$r->reorder_point.'<br>';

	
		}
		
	
?>
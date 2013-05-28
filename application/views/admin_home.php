
<div id="left_con">
	<ul>
	<?php
		echo '<li>'.anchor('admin/password', ' Password ').'</li>';
		echo '<li>'.anchor('admin/items', ' Items ').'</li>';
			echo '<ul>';
				echo '<li>'.anchor('admin/goto_add_item', ' Add Item ').'</li>';
				echo '<li>'.anchor('admin/goto_view_items', ' View Items ').'</li>';
			echo '</ul>';
		echo '<li>'.anchor('admin/reports', ' Reports ').'</li>';
		echo '<li>'.anchor('admin/inventory', ' Inventory ').'</li>';
		echo '<li>'.anchor('admin/customers', ' Customers ').'</li>';
		echo '<li>'.anchor('admin/delivery', ' Delivery ').'</li>';
		echo '<li>'.anchor('admin/logout', ' Log out ').'</li>';
	?>
	</ul>
</div>

<div id="right_con">
	<?php $this->load->view($subpage); ?>
</div>
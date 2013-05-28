
<div id="left_con">
	<ul>
	<?php
		echo '<li>'.anchor('cashier/purchase', ' Purchase ').'</li>';
		echo '<li>'.anchor('cashier/credit', ' Credit ').'</li>';
		echo '<li>'.anchor('cashier/outgoing', ' Outgoing ').'</li>';
		echo '<li>'.anchor('cashier/incoming', ' Incoming ').'</li>';
		echo '<li>'.anchor('cashier/expenses', ' Expenses ').'</li>';
		echo '<li>'.anchor('cashier/search', ' Search ').'</li>';
		echo '<li>'.anchor('cashier/inventory', ' Inventory ').'</li>';
		echo '<li>'.anchor('', 'Reports').'</li>';
		echo '<li>'.anchor('cashier/close', ' Close Store ').'</li>';
		echo '<li>'.anchor('cashier/logout', ' Log out ').'</li>';
	?>
	</ul>
</div>

<div id="right_con">
	<?php $this->load->view($subpage); ?>
</div>
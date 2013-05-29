SEARCH

<?php echo form_open('cashier/search'); ?>
	<input type="search" id="search" name="search" placeholder="Enter one word">
	
	<?php form_submit('search_item', 'Search'); ?>
<?php echo form_close(); ?>



<?php 
		if($results==false){

					echo '<br /><br /><hr /><center>No items Found</center>';
				//echo $results;
		}
		else {
		echo '<h3> VIEW ITEMS </h3>';
		
			echo '<div id="view_item" class="view">';

				echo '<table border="1px solid brown">
				<tr>
					<th> brand name</th>
					<th> product name </th>
					<th> variant/flavor </th>
					<th> size/packaging </th>
					<th> Cost </th>
					<th> Retail Price </th>
					<th> Manufacturer </th>
					<th> Quantity </th>
				</tr>';
			
			
			foreach ($results as $r) {
				echo '<tr>';
				echo '<td>'.$r->desc1.'</td>';
				echo '<td>'.$r->desc2.'</td>';
				echo '<td>'.$r->desc3.'</td>';
				echo '<td>'.$r->desc4.'</td>';
				echo '<td>'.$r->cost.'</td>';
				echo '<td><b>'.$r->retail_price.'</b></td>';
				echo '<td>'.$r->manufacturer.'</td>';
				echo '<td>'.$r->quantity.'</td>';
				echo '</tr>';
			}
			echo '</table></div>';
		}
	//}
?>
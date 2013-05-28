CREDIT <br>

<?php
	echo 'SORT BY: <br>';
	echo anchor('', ' Name ');
	echo anchor('', ' Date '); 
?>

<?php echo form_open(''); ?>
	<input type="search" value="Search Customer">
	<?php form_submit('search_customer', 'Search'); ?>
<?php echo form_close(); ?>

<br>
<table border="1px solid black">
	<tr>
		<th> Name </th>
		<th> Balance </th>
		<th> Products Credited</th>
		<th> Pay </th>
	</tr>	

	<tr>
		<td> Juan Dela Cruz</td>
		<td> P 250</td>
		<td> <?php echo anchor('', 'View Details'); ?> </td>
		<td> <?php echo anchor('', 'Pay'); ?> </td>
	</tr>
</table>





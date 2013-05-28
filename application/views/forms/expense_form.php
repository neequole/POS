<div id="expense_form" class="forms">
	<?php 
		$options = array(
				'empty' => ' ',
				'snack' => "Employee's Expenses",
				'salary' => "Employee's Salary",
				'remittance' => "Remitted Cash",
				'operationals' => "Operationals",
				'other' => 'Others'
			);

		echo 'Expense: '.form_dropdown('expenses', $options).'<br>';
		echo 'Amount: '.form_input('expense_amount', '').'<br>';
		echo 'Expense Description <br>'.form_textarea(array('rows' => '5', 'cols'=>'20', 'name' => 'exp_desc'));
	?>
</div>
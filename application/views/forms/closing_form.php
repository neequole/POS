
<div id="closing_form" class="forms">
<h1> CLOSING </h1>
	<?php echo form_open(''); ?>	
	BILLS <br>
	P 20 <input type="number" name="twenty">
	P 50 <input type="number" name="fifty"><br>
	P 100 <input type="number" name="hund">
	P 200 <input type="number" name="thund"><br>
	P 500 <input type="number" name="fhund">
	P1000<input type="number" name="thou"><br>
	<br>
	COINS <br>
	P1 <input type="number" name="one">
	P5 <input type="number" name="five">
	P10 <input type="number" name="ten"><br>
	<?php echo form_submit('register_bills', 'Register Closing Amount'); ?>
	<?php echo form_close(); ?>

	<br><br>
	Ending Bills: <span> to be commuted after register closing amount </span><br>
	Ending Coins: <span> to be commuted after register closing amount </span><br>
	Total: <span> to be commuted after register closing amount </span>
</div>
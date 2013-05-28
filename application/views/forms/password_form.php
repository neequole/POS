<div id="password_form" class="forms">
	<?php
		echo form_open('admin/change_password');
			echo 'Old Password: '.form_password('old_password', '').'<br>';
			echo 'New Password: '.form_password('new_password', '').'<br>';
			echo 'Confirm Password: '.form_password('conf_password', '').'<br>';
			echo form_submit('submit', 'Change Password');
		echo form_close();
	?>
</div>
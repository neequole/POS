<!DOCTYPE html>
<html>

<head>

	<title> POS </title>
	<?php $this->load->view('includes/resources'); ?>

</head>	

<body>

	<?php $this->load->view('includes/header'); ?>
	
	<div id="main_con">	
		<?php $this->load->view($page); ?>
	</div>

	<?php $this->load->view('includes/footer'); ?>

	<?php $this->load->view('includes/about'); ?> 
	
</body>
</html>
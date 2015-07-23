<?php
	$this->load->library('user_agent');
	$this->load->view('partials/layouts/_header');
	if ($this->agent->is_mobile()) {
		$dataRole = 'data-role="page"';
	} else {
		$dataRole = 'data-role="none"';
	}
?>
<body>
<?php $this->load->view('partials/layouts/_globalNavSideBar');?>
<div <?php echo $dataRole; ?> class="pages" id="<?php echo $id[0]; ?>">
<?php
	if ($this->agent->is_mobile()) {
		$this->load->view('partials/layouts/_globalNavMainBar');
	}
?>
<div id = 'partials'>
<?php
	if(isset($partials)) {
		foreach ($partials as $partial) {
			$this->load->view('partials/layouts/' . $partial);
		}
	}
	if(isset($forms)) {
		$submit = true;
		foreach ($forms as $form) {
			$this->load->view('partials/forms/' . $form);
		}
	}
?>
</div>
<?php
	if(isset($submit)) {
		$this->load->view('partials/forms/_submit');
	}
?>
</div>
<?php $this->load->view('partials/layouts/_footer'); ?>
</body>
</html>

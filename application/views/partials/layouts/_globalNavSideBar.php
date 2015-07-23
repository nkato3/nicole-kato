<div id="menu">

	<ul>
		<li><a href="<?php echo BASE_URL; ?>" target="_parent" class="contentLink">
			<?php
				if ($this->agent->is_mobile()) {
					echo "Home";
				} else {
					echo "<div id='desktopTitle'><span id='rocket'>&#xf135;</span>Home</div>";
				}
			?>
		    </a></li>
		<li><a href="<?php echo BASE_URL; ?>index.php/resume" target="_parent" class="contentLink">Resume</a></li>
		<li><a href="<?php echo BASE_URL; ?>index.php/projects" target="_parent" class="contentLink">Projects</a></li>
		<li><a href="<?php echo BASE_URL; ?>index.php/contact" target="_parent" class="contentLink">Contact</a></li>
	</ul>
</div>
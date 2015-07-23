<div id = "select">
<?php

	echo form_open('');

	$selectTypes = array(
		          ''  => 'Select Aero Tool',
		          //'jet'	=> 'Jet',
                  'std-atmos'  => 'Std. Atmosphere 1976',
                  'airspeed'    => 'Airspeed',
                );
	$selectAttr = array(
						'name' => 'type',
						'data-role' => 'none'
				);

	echo "<div id='selectType'>" . form_dropdown($selectAttr, $selectTypes,'') .'</div>';

	echo form_close();
?>
</div>

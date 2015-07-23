<div id = "std-atmos" class = 'equationForm'>
	<div class = "description">
		<div># input altitude (ft)</div>
		<div># outputs a list [pressure, temperature]</div>
		<div># check to see if input altitude is less than 1 and if so set it to 1 to prevent crash</div>
	</div>
	<div class = "error"></div>
<?php

	echo form_open('');
	
	$std_atmos = array(
	             	'name'        => 'std_atmos',
	              	'value'       => '',
	              	'maxlength'   => '100',
	              	'type'		  => 'number'
            	);	
	echo "<div id='stdAtmos'><span class = 'input'>Altitude - ft</span>" . form_input($std_atmos) .'</div>';

	echo form_close();
?>
	<div class = "answer"></div>
</div>

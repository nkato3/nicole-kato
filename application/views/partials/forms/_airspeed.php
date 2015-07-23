<div id = "airspeed" class = 'equationForm'>
	<div class = "description">
		<div># This is for airspeed</div>
	</div>
	<div class = "error"></div>
<?php

	echo form_open('');
	
	$speed = array(
	             	'name'        => 'speed',
	              	'value'       => '',
	              	'maxlength'   => '100',
	              	'type'		  => 'number',
	              	'data-role' => 'none'
            );	

	$speedType = array(
                  'KCAS'   => 'KCAS',
                  'KTAS'  => 'KTAS',
                  'MACH'    => 'MACH',
                );
	$speedTypeAttr = array(
						'name' => 'speedType',
						'data-role' => 'none'
				);
	$altitude = array(
	             	'name'        => 'altitude',
	              	'value'       => '',
	              	'maxlength'   => '15',
	              	'type'		  => 'number',
	              	'data-role' => 'none'
            	);	

	$deltatk = array(
	             	'name'        => 'deltatk',
	              	'value'       => '',
	              	'maxlength'   => '100',
	              	'type'		  => 'number',
	              	'data-role' => 'none'
            	);	

	echo "<div id='speedType'><span class = 'input'>Type</span>" . form_dropdown($speedTypeAttr, $speedType,'') .'</div>';
	echo "<div id='speed'><span class = 'input'>Speed</span>" . form_input($speed) .'</div>';
	echo "<div id='altitude'><span class = 'input'>Altitude - ft</span>" . form_input($altitude) .'</div>';
	echo "<div id='deltatk'><span class = 'input'>&Delta; std. day temp</span>" . form_input($deltatk) .'</div>';

	echo form_close();
?>
	<div class = "answer"></div>
</div>

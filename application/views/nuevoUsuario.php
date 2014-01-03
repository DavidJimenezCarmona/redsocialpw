<h1>FriendShipDiary</h1>
<img id="logo" src="<?= base_url();?>/img/logo2.png"/>

<? //Script para rellenar los municipios en tiempo real ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
	$( document ).ready(function() 
	{
	    cargarMunicipios($('#municipios'), 2);
	});

	function cargarMunicipios(field_dropdown, selected_value)
	{
	    var result = $.ajax(
	    {
	        'url' : '<?php echo site_url('controlador_actividad/municipios?id='); ?>' + selected_value,
	        'async' : false
	    }).responseText;
	    field_dropdown.replaceWith(result);
	}		
</script>


//Variables para rellenar las fechas
for($i=0;$i<31;$i++) $dia[$i]=($i+1);

for($i=0;$i<12;$i++) $mes[$i]=($i+1);

for($i=0;$i<100;$i++) $anyo[$i]=(2013-$i);


//Variables para escoger el sexo

$sexo[0] = "Mujer";
$sexo[1] = "Hombre";

?>

<div id="cajareg">
	<? echo form_open('welcome/nuevoUsuario'); ?>
	<p id="formulario_login">Alias: <?= form_input('alias'); ?>
	<br>Contraseña: <?= form_password('pass1'); ?>
	<br>Repita la contraseña: <?= form_password('pass2'); ?>
	<br>Nombre: <?= form_input('nombre'); ?>
	<br>Apellidos: <?= form_input('apellidos'); ?>
	<br>Sexo: <?= form_dropdown('sexo', $sexo); ?>
	<br>Fecha de nacimiento: <?= form_dropdown('dia', $dia); echo form_dropdown('mes', $mes); echo form_dropdown('anyo', $anyo); ?>
	<br>email: <?= form_input('email'); ?> 
	<br>Provincia de nacimiento: <?= form_dropdown('provincias', $provincias, 2, 'id="provincias" onchange="cargarMunicipios($(\'#municipios1\'), this.value)"'); ?>
	<br>Municipio de nacimiento: <?= form_dropdown('municipios1', array(), null, "id='municipios'"); ?>
	<br>Provincia de residencia: <?= form_dropdown('provincias', $provincias, 2, 'id="provincias" onchange="cargarMunicipios($(\'#municipios2\'), this.value)"'); ?>
	<br>Municipio de residencia: <?= form_dropdown('municipios2', array(), null, "id='municipios'"); ?>
	<br> </p>
	<p id="centrado"><?= form_submit('Registrarme', 'Registrarme'); ?></p>
	<p id="mensaje_error">
	<?
		if(isset($mensaje))
			echo $mensaje;
	?>
	</p>
</div>
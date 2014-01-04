<? //Script para rellenar los municipios en tiempo real ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
	$( document ).ready(function() 
	{
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
	function cargarMunicipios_r(field_dropdown, selected_value)
	{
	    var result = $.ajax(
	    {
	        'url' : '<?php echo site_url('controlador_actividad/municipiosR?id='); ?>' + selected_value,
	        'async' : false
	    }).responseText;
	    field_dropdown.replaceWith(result);
	}	
</script>

<div id="cajareg">
	<? echo form_open('welcome/actualizar_perfil'); ?>

	<p id="formulario_login">Provincia de nacimiento: <?= form_dropdown('provincias', $provincias, 2, 'id="provincias" onchange="cargarMunicipios($(\'#municipios\'), this.value)"'); ?>
	<br>Municipio de nacimiento: <?= form_dropdown('municipios', $municipiosIniciales, null, "id='municipios'"); ?>
	<br>Provincia de residencia: <?= form_dropdown('provincias', $provincias, 2, 'id="provincias" onchange="cargarMunicipios_r($(\'#municipio\'), this.value)"'); ?>
	<br>Municipio de residencia: <?= form_dropdown('municipio', $municipiosIniciales, null, "id='municipio'"); ?>
	<br>Ocupación: <?= form_input('ocupacion'); ?>
	<br>Centro donde realiza la actividad actual: <?= form_input('centro_actividad'); ?>
	<p id="centrado"><?= form_submit('Guardar cambios', 'Guardar cambios'); ?></p>
	<p id="mensaje_error">
	<?
		if(isset($mensaje))
			echo $mensaje;
	?>
	</p>
</div>
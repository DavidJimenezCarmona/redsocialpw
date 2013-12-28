
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

<?
//Variables para rellenar las fechas
for($i=0;$i<31;$i++) $dia[$i]=($i+1);

for($i=0;$i<12;$i++) $mes[$i]=($i+1);

for($i=0;$i<100;$i++) $anyo[$i]=($i+2013);
?>


<div id="cajaAct">
	<h2>Nueva actividad</h2>
	<? echo form_open('controlador_actividad/guardarActividad'); ?>
	<p id="formulario_login">
	<table>
		<tr>
			<td id="izda">Nombre de la actividad</td><td id="dcha"> <?= form_input('nombre'); ?></td>
		</tr>
		<tr>
			<td id="izda">Tipo:</td><td id="dcha"><?= form_dropdown('tipo', $tipo); ?></td>
		</tr>
		<tr>
			<td id="izda">Fecha de inicio:</td><td id="dcha"><?= form_dropdown('diaini', $dia); echo form_dropdown('mesini', $mes); echo form_dropdown('anyoini', $anyo);?></td>
		</tr>
		<tr>
			<td id="izda">Fecha de fin:</td><td id="dcha"><?= form_dropdown('diafin', $dia); echo form_dropdown('mesfin', $mes); echo form_dropdown('anyofin', $anyo);?></td>
		</tr>
		<tr>
			<td id="izda">Provincia:</td><td id="dcha"><?= form_dropdown('provincias', $provincias, 2, 'id="provincias" onchange="cargarMunicipios($(\'#municipios\'), this.value)"'); ?></td>
		</tr>
		<tr>
			<td id="izda">Municipio:</td><td id="dcha"><?= form_dropdown('municipios', array(), null, "id='municipios'"); ?></td>
		</tr>
		<tr>
			<td id="izda">Lugar:</td><td id="dcha"><?= form_input('lugar'); ?></td>
		</tr>
		<tr>
			<td id="izda">Descripción:</td><td id="dcha"><?= form_textarea('descripcion'); ?></td>
		</tr>
		<tr>
			<td id="izda">Plazas:</td><td id="dcha"><?= form_input_numeric('plazas'); ?></td>
		</tr>
		<tr>
			<td colspan=2><p id="centrado"><?= form_submit('Crear', 'Crear actividad'); ?></p></td>
		</tr>
		<tr>
			<p id="mensaje_error">
			<?
				if(isset($mensaje_error))
					echo $mensaje_error;
			?>
			<p id="mensaje">
			<?
				if(isset($mensaje))
					echo $mensaje;
			?>
		</p>
		</tr>
	</table>
</div>
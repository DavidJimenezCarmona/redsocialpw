<div id="cajareg">
	<? echo form_open('welcome/nuevos_datos_perfil'); ?>
	<p id="formulario_login">Ciudad de residencia: <?= form_input('id_ciudad_residencia'); ?>
	<br>Ciudad de nacimiento: <?= form_input('id_ciudad_nacimiento'); ?>
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
<div id="cajaAct">
	Nueva actividad
	<? echo form_open('controlador_actividad/guardarActividad'); ?>
	<p id="formulario_login">
	Nombre de la actividad <?= form_input('nombre'); ?>
	<br>Tipo: <?= form_input('tipo'); ?>
	<br>Fecha de inicio: <?= form_input('fecha_ini'); ?>
	<br>Fecha de fin: <?= form_input('fecha_fin'); ?>
	<br>Ciudad: <?= form_input('ciudad'); ?>
	<br>Lugar: <?= form_input('lugar'); ?>
	<br>Descripción: <?= form_input('descripcion'); ?>
	<br>plazas: <?= form_input('plazas'); ?> <br> </p>
	<p id="centrado"><?= form_submit('Crear', 'Crear'); ?></p>
	<p id="mensaje_error">
	<?
		if(isset($mensaje))
			echo $mensaje;
	?>
	</p>
</div>
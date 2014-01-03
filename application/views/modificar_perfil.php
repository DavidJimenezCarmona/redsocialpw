<? //Script para rellenar los municipios en tiempo real ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<div id="cajareg">
	<? echo form_open('welcome/actualizar_perfil'); ?>

	<p id="formulario_login">Ciudad de nacimiento: <?= form_dropdown('id_ciudad_nacimiento', $provincias, 2, 'id="ciudad_nacimiento", this.value)"'); ?>
	<br>Ciudad de residencia: <?= form_dropdown('id_ciudad_residencia', $provincias, 2, 'id="ciudad_residencia", this.value)"'); ?>
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
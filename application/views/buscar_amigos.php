<h1 id='tituloActividad'>Buscar amigos</h1>
<div id="actividad">
	<? echo form_open('controlador_amigos/filtrar_usuarios'); ?>
	<p id="formulario_busqueda">Nombre: <?= form_input('nombre'); ?>
	<p id="centrado"><?= form_submit('Buscar usuarios', 'Buscar usuarios'); ?></p>
	<p id="mensaje_error">
	<?
		if(isset($mensaje))
			echo $mensaje;
	?>
	</p>
</div>
<br>
<div class="derecha">
	<? echo '<p id="saludo"> Bienvenido ' .$usuario. '</p>' ?>
	<p><?= form_submit('Mi Cuenta', 'Mi Cuenta'); ?></p>
</div>

<div id="avatar">
	<img id="logo" src="<?= base_url();?>/img/avatar.jpg"/>
</div>

<div id="primera_accion">
	<?= form_submit('Amigos', 'Amigos'); ?>
</div>

<div id="segunda_accion">
	<?= form_submit('Nueva actividad', 'Nueva actividad'); ?>
</div>

<div id="tercera_accion">
	<?= form_submit('Mis mensajes', 'Mis Mensajes'); ?>
</div>

<div id="cuarta_accion">
	<?= form_submit('Mis actividades', 'Mis actividades'); ?>
</div>


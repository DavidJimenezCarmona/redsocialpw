<br><br><br><br><br><br>
<h1>FriendShipDiary</h1>
<img id="logo" src="<?php base_url();?>img/logo2.png"/>
<br>

<div id="cajalog">
	<? echo form_open('welcome/registro'); ?>
	<p id="formulario_login">Alias:<br> <?= form_input('alias'); ?><br>
	<br>Contraseña:<br> <?= form_password('pass'); ?>
	<br>Repita la contraseña:<br> <?= form_password('pass'); ?>
	<br>Nombre:<br> <?= form_password('nombre'); ?>
	<br>Apellidos:<br> <?= form_password('apellidos'); ?>
	<br>Sexo:<br> <?= form_password('sexo'); ?>
	<br>Fecha de nacimiento:<br> <?= form_password('fecha_nacimiento'); ?>
	<br>Repita la contraseña:<br> <?= form_password('email'); ?></p>
	<? echo form_submit('Registrarme', 'Registrarme'); ?><br>
	<br>
	<a id="enlace" href=/redsocialpw/>¿Has olvidado tu contraseña?</a>
</div>
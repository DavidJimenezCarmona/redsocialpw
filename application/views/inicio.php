<h1>FriendShipDiary</h1>
<img id="logo" src="<?php base_url();?>img/logo2.png"/>
<br>

<div id="cajalog">
	<? echo form_open('welcome/login'); ?>
	<p id="formulario_login">Usuario:<br> <?= form_input('usuario'); ?><br>
	<br>Contraseña:<br> <?= form_password('pass'); ?></p>
	<? echo form_submit('Entrar', 'Entrar'); ?><br>
	<br>
	<a id="enlace" href=/redsocialpw/>¿Has olvidado tu contraseña?</a>
	<p id="texto_registro"> ¿Aún no formas parte de FSD?
	<? echo form_submit('registrate', 'Regístrate'); ?>
</div>

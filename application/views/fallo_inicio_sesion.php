<br>
<div id="registro">
	<p id="texto_registro"> ¿Aún no formas parte de FSD?<br><br>
	<a id="enlace_registro" id="enlace_registro" href="application/views/nuevoUsuario.php">Registrarme</a></p>
</div>
<br><br><br><br><br><br>
<h1>FriendShipDiary</h1>
<img id="logo" src="../../img/logo2.png"/>
<br>

<div id="cajalog">
	<? echo form_open('welcome/login'); ?>
	<p id="formulario_login">Usuario:<br> <?= form_input('usuario'); ?><br>
	<br>Contraseña:<br> <?= form_password('pass'); ?></p>
	<? echo form_submit('Entrar', 'Entrar'); ?><br>
	<br>
	<p id="mensaje_error"> Usuario y/o contraseña incorrectos.</p>
	<a id="enlace" href=/redsocialpw/>¿Has olvidado tu contraseña?</a>
</div>
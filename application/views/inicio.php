<h1>FriendShipDiary</h1>
<img id="logo" src="<?= base_url();?>img/logo2.png"/>
<br>

<div id="cajalog">
	<? echo form_open('welcome/login'); ?>
	<p id="formulario_login">Usuario:<br> <?= form_input('usuario'); ?><br>
	<br>Contraseña:<br> <?= form_password('pass'); ?></p>
	<? echo form_submit('Entrar', 'Entrar'); ?><br>
	<br>
	<a class="enlace" href='<?= base_url(); ?>index.php/welcome/recuperarContrasenya'>¿Has olvidado tu contraseña?</a>
	<p id="texto_registro"> ¿Aún no formas parte de FSD?</p>
	<p id="centrado"><?= form_submit('registrate', 'Regístrate'); ?></p>
	<? if(isset($mensaje)) {
		echo "<p id=\"mensaje_error\">". $mensaje . "</p>"; } ?>
	</div>
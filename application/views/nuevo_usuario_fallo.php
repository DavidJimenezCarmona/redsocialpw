<h1>FriendShipDiary</h1>
<img id="logo" src="<?= base_url();?>/img/logo2.png"/>

<div id="cajareg">
	<? echo form_open('welcome/nuevoUsuario'); ?>
	<p id="formulario_login">Alias: <?= form_input('alias'); ?>
	<br>Contraseña: <?= form_password('pass'); ?>
	<br>Repita la contraseña: <?= form_password('pass'); ?>
	<br>Nombre: <?= form_input('nombre'); ?>
	<br>Apellidos: <?= form_input('apellidos'); ?>
	<br>Sexo: <?= form_input('sexo'); ?>
	<br>Fecha de nacimiento: <?= form_input('fecha_nacimiento'); ?>
	<br>email: <?= form_input('email'); ?> <br> </p>
	<p id="centrado"><?= form_submit('Registrarme', 'Registrarme'); ?></p>
	<p id="mensaje_error"> Alguno de los datos introducidos no es valido.</p>
</div>
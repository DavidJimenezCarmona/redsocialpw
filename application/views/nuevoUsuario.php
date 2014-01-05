<h1>FriendShipDiary</h1>
<img id="logo" src="<?= base_url();?>/img/logo2.png"/>


<?
//Variables para rellenar las fechas
for($i=0;$i<31;$i++) 	$dia[$i]=($i+1);

for($i=0;$i<12;$i++) $mes[$i]=($i+1);

for($i=0;$i<100;$i++) $anyo[$i]=(2013-$i);

//Variables para escoger el sexo
$sexo[0] = "Mujer";
$sexo[1] = "Hombre";

?>

<div id="cajareg">
	<? echo form_open('welcome/nuevoUsuario'); ?>
	<p id="formulario_login">Alias: <?= form_input('alias'); ?>
	<br>Contraseña: <?= form_password('pass1'); ?>
	<br>Repita la contraseña: <?= form_password('pass2'); ?>
	<br>Nombre: <?= form_input('nombre'); ?>
	<br>Apellidos: <?= form_input('apellidos'); ?>
	<br>Sexo: <?= form_dropdown('sexo', $sexo, 0,"style='width: 11.6em	'"); ?>
	<br>Fecha de nacimiento: <?= form_dropdown('dia', $dia); echo form_dropdown('mes', $mes); echo form_dropdown('anyo', $anyo); ?>
	<br>email: <?= form_input('email'); ?> 
	<br> </p>
	<p id="centrado"><?= form_submit('Registrarme', 'Registrarme'); ?></p>
	<p id="mensaje_error">
	<?
		if(isset($mensaje))
			echo $mensaje;
	?>
	</p>
</div>
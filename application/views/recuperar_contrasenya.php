<html>
	<html lang="es">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/redsocialpw/css/estilos.css">
		<link href='http://fonts.googleapis.com/css?family=Bowlby+One+SC' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Chau+Philomene+One' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href='<?= base_url(); ?>/img/logo.png' />
		<title>FriendShipDiary</title>
</head>
<body id="body_interior_cuenta">

	<? 
		if(!isset($codigo) && !isset($cambiar))
		{
			echo "<h1 id='tituloActividad'> Recuperar contraseña </h1>";
			echo "<div id='actividad'><br>";
			echo form_open('welcome/recuperarContrasenya'); 
			echo form_label('Introduce tu alias');
			echo form_input('alias')."<br>";
			echo form_submit('Recuperar','Recuperar contraseña');
			echo form_close();
			echo "</div><br>";
		}
	?>


<?
	if(isset($codigo) && !isset($cambiar))
	{
		echo "<div id='actividad'><br>";
		echo form_open('welcome/confirmarCodigo'); 
		echo form_label('Introduce el código que te hemos mandado a tu email');
		echo form_input('code')."<br>";
		echo form_submit('Recuperar','Recuperar contraseña');
		echo form_close();
		echo "</div><br>";	
	}


?>



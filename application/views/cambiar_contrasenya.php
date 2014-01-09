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
	echo "<h1 id='tituloActividad'> Recuperar contraseña </h1>";
	echo "<div id='actividad'><br>";
	echo form_open('welcome/cambiarContrasenya'); 
	echo form_label('Introduce la nueva contraseña');
	echo form_input('nueva')."<br>";
	echo form_submit('Recuperar','Recuperar contraseña');
	echo form_close();
	echo "</div><br>";
?>
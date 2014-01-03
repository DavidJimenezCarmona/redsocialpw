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

   <div id='cssmenu'>
<ul>
   <li class='active'><a href='<?= base_url(); ?>index.php/welcome/home'><span>Home</span></a></li>
   <li class='has-sub'><a href='#'><span>Usuarios</span></a>
      <ul>
         <li class='has-sub'><a href='<?= base_url(); ?>index.php/controlador_amigos/buscar_amigos'><span>Buscar usuario</span></a>
         </li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Actividades</span></a>
      <ul>
         <li class='has-sub'><a href='<?= base_url(); ?>index.php/controlador_actividad/verActividades'><span>Ver actividades</span></a>
         </li>
         <li class='has-sub'><a href='<?= base_url(); ?>index.php/controlador_actividad/buscarActividades'><span>Buscar actividades</span></a>
         </li>

      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Mensajes</span></a>
      <ul>
         <li class='has-sub'><a href='<?= base_url(); ?>index.php/controlador_mensajes/bandejaEntrada'><span>Bandeja de entrada</span></a>
         </li>
         <li class='has-sub'><a href='<?= base_url(); ?>index.php/controlador_mensajes/nuevoMensaje'><span>Nuevo</span></a>
         </li>
      </ul>
   </li>
   <li><a href='<?= base_url(); ?>index.php/controlador_acercade/sobre_nosotros'><span>Acerca de...</span></a></li>
   <li class='last'><a href='<?= base_url(); ?>index.php/controlador_contacto/contacta'><span>Contacta con nosotros</span></a></li>
   <li class='last'><a href='<?= base_url(); ?>index.php/welcome/salir'><span>Salir</span></a></li>


<? if (isset($notificaciones) && $notificaciones == 0) {
   echo "<li class=\"derecha\"><a href='".base_url()."index.php/controlador_amigos/mostrar_peticiones'><img class=\"imagen_peque\" src=".base_url()."img/notificaciones.png></a></li>
   </ul>
   </div>
   <br><br>";
}

else {
   echo "<li class=\"derecha\"><a href='".base_url()."index.php/controlador_amigos/mostrar_peticiones''><img class=\"imagen_peque\" src=".base_url()."img/sin_notificaciones.png></a></li>
   </ul>
   </div>
   <br><br>";  
}

?>

<body id="body_interior_cuenta">
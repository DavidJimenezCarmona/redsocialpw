<html>
	<html lang="es">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="/redsocialpw/css/estilos.css">
		<link href='http://fonts.googleapis.com/css?family=Bowlby+One+SC' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Chau+Philomene+One' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href='<?= base_url(); ?>/img/logo.png' />
		<title>FriendShipDiary</title>

   <div id='cssmenu'>
<ul>
   <li class='active'><a href='<?= base_url(); ?>index.php/welcome/home'><span>Home</span></a></li>
   <li class='has-sub'><a href='#'><span>Amigos</span></a>
      <ul>
         <li class='has-sub'><a href='<?= base_url(); ?>index.php/controlador_amigos/mostrar_amigos'><span>Ver amigos</span></a>
         </li>
         <li class='has-sub'><a href='<?= base_url(); ?>index.php/controlador_amigos/buscar_amigos'><span>Buscar amigos</span></a>
         </li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Actividades</span></a>
      <ul>
         <li class='has-sub'><a href='<?= base_url(); ?>index.php/controlador_actividad/nuevaActividad'><span>Crear nueva actividad</span></a>
         </li>
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
         <li class='has-sub'><a href='<?= base_url(); ?>index.php/controlador_mensajes/bandejaSalida'><span>Bandeja de salida</span></a>
         </li>
         <li class='has-sub'><a href='<?= base_url(); ?>index.php/controlador_mensajes/nuevoMensaje'><span>Nuevo</span></a>
         </li>
      </ul>
   </li>
   <li><a href='<?= base_url(); ?>index.php/controlador_acercade/sobre_nosotros'><span>Acerca de...</span></a></li>
   <li class='last'><a href='<?= base_url(); ?>index.php/controlador_contacto/contacta'><span>Contacta con nosotros</span></a></li>
   <li class='last'><a href='<?= base_url(); ?>index.php/welcome/salir'><span>Salir</span></a></li>


<? 

//*****************************************************************************************************************************************
//***************************************************-PETICIONES AMISTAD-******************************************************************
//*****************************************************************************************************************************************


//Si hay peticiones de amistad
if (isset($_SESSION['notificaciones']) && $_SESSION['notificaciones'] == 1) 
{
   echo "<li class=\"last\"><a href='".base_url()."index.php/controlador_amigos/mostrar_peticiones'><img class=\"imagen_peque\" src=".base_url()."img/notificaciones.png></a></li>";
}
else //Si no las hay 
{
   echo "<li class=\"last\"><a href='".base_url()."index.php/controlador_amigos/mostrar_peticiones''><img class=\"imagen_peque\" src=".base_url()."img/sin_notificaciones.png></a></li>";  
}

//*****************************************************************************************************************************************
//***************************************************-NOTIFICACIONES ADMINISTRACIÓN-*******************************************************
//*****************************************************************************************************************************************

//Si el usuario es administrador
if($_SESSION['usuario']->permisos == 1)
{
   //Si tiene nuevos reportes
   if(isset($_SESSION['reportes']) &&  $_SESSION['reportes']==1)
   {
      echo "<li class=\"last\"><a href='".base_url()."index.php/controlador_reporte/mostrar_reportes''><span><img class=\"imagen_reporte\" src=".base_url()."img/Si_Reportes.png></spam></a></li>
      </ul>
      </div>
      <br><br>
      </head>";
   }
   else //Si no los tiene
   {
      echo "<li class=\"last\"><a href='".base_url()."index.php/controlador_reporte/mostrar_reportes''><spam><img class=\"imagen_reporte\" src=".base_url()."img/No_Reportes.png></spam></a></li>
      </ul>
      </div>
      <br><br>
      </head>";
   }
}
else //Si no lo es
{
   echo "</ul>
   </div>
   <br><br>
   </head>";
}

?>
<body id="body_interior_cuenta">
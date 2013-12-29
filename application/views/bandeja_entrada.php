<h1 id="tituloActividad"> Bandeja de entrada </h1>

<div id='divTablaMensajes'>
<table id='tablaMensajes'>
<tr id='cabeceraTablaMensajes'>
	<td>Fecha</td>
	<td>Emisor</td>
	<td>Asunto</td>
	<td>Ver</td>
	<td>Borrar</td>
</tr>
<?
	foreach ($mensajes as $mensaje) 
	{
		if($mensaje['visto']==0)//No visto
			echo "<tr id='filaTablaMensajesNoVisto'>";
		else
			echo "<tr id='filaTablaMensajes'>";
				echo "<td>".$mensaje['fecha']."</td>";
				echo "<td>".$mensaje['alias_emisor']."</td>";
				echo "<td>".$mensaje['titulo']."</td>";
				echo "<td><a id='botonMensaje' href='".base_url()."index.php/controlador_mensajes/verMensaje/".$mensaje['id']."'> Ver </A></td>";
				echo "<td><a id='botonMensaje' href='asistir'> Borrar </A></td>";
			echo "</tr>";
	}
?>
</table>
<?
//Si se ha seleccionado, mostramos el mensaje
	if(isset($mensajeAbierto))
	{
		echo "<div id='divMensaje'>";
			echo "<h2 id='tituloMensaje'>".$mensajeAbierto->titulo."</h2>";
			echo "<div id='cajaMensaje'>";
				echo $mensajeAbierto->contenido;
			echo "<div>";
		echo "<div>";
	}
?>
</div>










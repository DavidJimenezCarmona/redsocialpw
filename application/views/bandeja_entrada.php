<h1 id="tituloActividad"> Bandeja de entrada </h1>

<div class='divTablaMensajes'>
<table class='tablaMensajes'>
<tr class='cabeceraTablaMensajes'>
	<td>Fecha</td>
	<td>Emisor</td>
	<td>Asunto</td>
	<td>Ver</td>
	<td>Borrar</td>
	<td>Reportar</td>
</tr>
<?
	if (is_array($mensajes))
	{
		foreach ($mensajes as $mensaje) 
		{
			if($mensaje['visto']==0)//No visto
				echo "<tr class='filaTablaMensajesNoVisto'>";
			else
				echo "<tr class='filaTablaMensajes'>";
					echo "<td>".$mensaje['fecha']."</td>";
					echo "<td>".$mensaje['alias_emisor']."</td>";
					echo "<td>".$mensaje['titulo']."</td>";
					echo "<td><a id='botonMensaje' href='".base_url()."index.php/controlador_mensajes/verMensaje/".$mensaje['id']."'> Ver </A></td>";
					echo "<td><a id='botonMensaje' href='".base_url()."index.php/controlador_mensajes/borrarMensaje/".$mensaje['id']."'> Borrar </A></td>";
					echo "<td><a id='botonMensaje' href='".base_url()."index.php/controlador_mensajes/reportarMensaje/".$mensaje['id']."'> Reportar </A></td>";				
				echo "</tr>";
		}
	}
?>
</table>

<p id="mensaje_error">
	<?
		if(isset($confirmacion))
			echo $confirmacion;
	?>
</p>

<?
//Si se ha seleccionado, mostramos el mensaje
	if(isset($mensajeAbierto))
	{
		echo "<div class='divMensaje'>";	
			echo "<h2 class='tituloMensaje'>".$mensajeAbierto->titulo."</h2>";
			echo "<div class='cajaMensaje'>";
				echo $mensajeAbierto->contenido;
			echo "<div>";
		echo "<div>";
	}
?>
</div>











<h1 id="tituloActividad"> Nuevo mensaje </h1>
<p id="mensaje"><? if(isset($mensaje)) echo $mensaje; ?></p>
<div class='divNuevoMensaje'>
<?
	echo form_open('controlador_mensajes/enviarMensaje'); 
	echo "<p id='centradoNuevoMensaje'>Destinatario ".form_dropdown('amigos', $amigos)."</p><br>";
?>

	<h2 class='tituloMensaje'>Título</h2>
	<div class='cajaNuevoMensaje'>
		<?= form_input('titulo','',"size='50'"); ?>
	</div><br>
	<h2 class='tituloMensaje'>Mensaje</h2>
	<div class='cajaNuevoMensaje'>
		<?= form_textarea('contenido'); ?>
	</div><br>
	<?	
		echo form_submit('Enviar','Enviar', "style='width:250px; height:25px'");
		echo form_close();

	?>
</div>
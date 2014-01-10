<h1 id="tituloActividad"> Actividades activas </h1>

	<p id="mensaje_error">
		<?
			if(isset($mensaje))
				echo $mensaje;
		?>
	</p>

<?
	$base = base_url();
	foreach ($actividades as $actividad) 
	{
		echo "<div id=actividad>";
			echo "<img id='imagenActividadHome' src='" . $base . "img/tipo/" . $actividad->tipo->id .  ".jpg'\">";
			echo "<h2>".$actividad->nombre."</h2><br>";
			echo "Fecha: ".$actividad->fecha_inicio."<br>";
			echo "Ciudad del evento: ".$actividad->ciudad->nombre. "<br>";
			echo "Lugar del evento: ".$actividad->lugar. "<br>";
			echo "Plazas libres: ".$actividad->plazas."<br>";
			echo "Descripción: ".$actividad->descripcion;
			echo "<a id='botonNoir' href='noAsistir?actividad=".$actividad->id."'> No asistir </A>";
		echo "</div><br>";
	}
?>

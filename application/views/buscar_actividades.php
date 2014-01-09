<h1 id="tituloActividad"> Buscar actividades </h1>

<div id='actividad'><br>
	<? 
		echo form_open('controlador_actividad/buscarPorProvincia'); 
		echo form_label('Buscar por provincia');
		echo form_dropdown('provincias', $provincias, 2)."<br>";
		echo form_submit('Buscar','Buscar');
		echo form_close();
	?>
</div><br>

<?
	$base = base_url();
	if(isset($actividadesNoActivas))
	{
		foreach ($actividadesNoActivas as $actividad) 
		{
			echo "<div id=actividad>";
				echo "<img id='imagenActividadHome' src='" . $base . "img/tipo/" . $actividad->tipo->id .  ".jpg'\">";
				echo "<h2>".$actividad->nombre."</h2><br>";
				echo "Fecha: ".$actividad->fecha_inicio."<br>";
				echo "Ciudad del evento: ".$actividad->ciudad->nombre. "<br>";
				echo "Lugar del evento: ".$actividad->lugar. "<br>";
				echo "Plazas libres: ".$actividad->plazas."<br>";
				echo "Descripción: ".$actividad->descripcion;
				echo "<a id='botonNoir' href='asistir?actividad=".$actividad->id."'> Asistir </A>";
			echo "</div><br>";
		}
	}
?>
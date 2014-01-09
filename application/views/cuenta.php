<div class="derecha">
	<? 
	    //Creamos el objeto usuario
		$usuario=$_SESSION['usuario'];

		//Comprobamos si es Hombre (1) o Mujer (0)
		if($usuario->sexo==0) 
			echo '<p id="saludo"> Bienvenida ' . $usuario->alias . '</p>' ;
		else
			echo '<p id="saludo"> Bienvenido ' . $usuario->alias . '</p>' ;
	?>

	<a id='botonNoir' href='modificar_perfil'> Modificar perfil </A>
</div>

<? 
	if($_SESSION['perfil']->foto==0)
	{ ?>
		<div id="avatar"> 
			<img id="logo" src="<?= base_url();?>img/avatar.jpg"/>
			<br>
<?	}
	else
	{?>
		<div id="avatar"> 
			<img id="logo" src="<?= base_url();?>img/fotos_perfil/<?= $_SESSION['usuario']->alias ?>.jpg"/>
			<br>
<?	}	?>
	<?=form_open_multipart('welcome/subirFoto'); ?>
		<input type="file" name="userfile" size="20" />
		<br /><br />
	<input type="submit" value="upload" />

		</div>

<?
if(isset($actividades))
{
	echo "<h1 id='tituloActividad'>Actividades de tus amigos</h1>";

	foreach ($actividades as $amigo) 
	{
		foreach ($amigo as $actividad) 
		{
			echo "<div id=actividad>";
			echo "<img id='imagenActividadHome' src=\"../../img/tipo/".$actividad->tipo->id."\">";
			echo "<h2>".$actividad->nombre."</h2><br>";
			echo "Fecha: ".$actividad->fecha_inicio."<br>";
			echo "Ciudad del evento: ".$actividad->ciudad->nombre. "<br>";
			echo "Lugar del evento: ".$actividad->lugar. "<br>";
			echo "Plazas libres: ".$actividad->plazas."<br>";
			echo "Descripción: ".$actividad->descripcion;
		echo "</div><br>";
		}
	}
}
?>
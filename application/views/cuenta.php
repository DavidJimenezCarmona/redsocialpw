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
if(isset($perfil)) {

	echo "<div class=\"ficha\"
		<p class=\"titulo_perfil\"> Datos del perfil del usuario </p>";
		if(isset ($_SESSION['perfil']->ciudad_nacimiento->nombre))
			echo "<p class=\"texto_perfil\">".$_SESSION['perfil']->ciudad_nacimiento->nombre."</p>";
		if(isset ($_SESSION['perfil']->ciudad_residencia->nombre))
			echo "<p class=\"texto_perfil\">".$_SESSION['perfil']->ciudad_residencia->nombre."</p>";
		
		echo "<p class=\"texto_perfil\">".$_SESSION['perfil']->ocupacion."</p>
		<p class=\"texto_perfil\">".$_SESSION['perfil']->centro_actividad."</p>
		</div>";
				

}
?>
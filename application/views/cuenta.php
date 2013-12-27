<div class="derecha">
	<? 
		//Propagamos la sesión
		if(!isset($_SESSION)) 
	        session_start(); 

	    //Creamos el objeto usuario
		$usuario=$_SESSION['usuario'];

		//Comprobamos si es Hombre (1) o Mujer (0)
		if($usuario->sexo==0) 
			echo '<p id="saludo"> Bienvenida ' . $usuario->alias . '</p>' ;
		else
			echo '<p id="saludo"> Bienvenido ' . $usuario->alias . '</p>' ;
	?>
	<p><?= form_submit('Mi Cuenta', 'Mi Cuenta'); ?></p>
</div>

<div id="avatar"> <? //Si no tiene foto (Hay que comprobarlo en su perfil), se carga una por defecto ?>
	<img id="logo" src="<?= base_url();?>img/avatar.jpg"/>
</div>

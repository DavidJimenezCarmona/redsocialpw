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
	<? echo form_open('welcome/modificar_perfil'); ?>
	<p><?= form_submit('Modificar perfil', 'Modificar perfil'); ?></p>
</div>

<div id="avatar"> <? //Si no tiene foto (Hay que comprobarlo en su perfil), se carga una por defecto ?>
	<img id="logo" src="<?= base_url();?>img/avatar.jpg"/>
</div>

<?
if(isset($perfil)) {

	foreach ($perfil as $perfil_aux) {

		echo "<div class=\"ficha\">
			<p class=\"titulo_perfil\"> Datos del perfil del usuario </p>
			<p class=\"texto_perfil\">".$perfil_aux["id_ciudad_nacimiento"]["ciudad"]["nombre"]."</p>
			<p class=\"texto_perfil\">".$perfil_aux["id_ciudad_residencia"]["ciudad"]["nombre"]."</p>
			<p class=\"texto_perfil\">".$perfil_aux["ocupacion"]."</p>
			<p class=\"texto_perfil\">".$perfil_aux["centro_actividad"]."</p>
			</div>";
				
	}

}
?>
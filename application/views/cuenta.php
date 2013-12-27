<div class="derecha">
	<? 
		//COMENTARIO DE PAPARRUCHAS
		if($sexo==0	) //Comprobamos si es Hombre (1) o Mujer (0)
			echo '<p id="saludo"> Bienvenida ' . $alias . '</p>' ;
		else
			echo '<p id="saludo"> Bienvenido ' . $alias . '</p>' ;
	?>
	<p><?= form_submit('Mi Cuenta', 'Mi Cuenta'); ?></p>
</div>

<div id="avatar"> <? //Si no tiene foto (Hay que comprobarlo en su perfil), se carga una por defecto ?>
	<img id="logo" src="<?= base_url();?>img/avatar.jpg"/>
</div>

<div id="primera_accion">
	<?= form_submit('amigos', 'Amigos'); ?>
</div>

<div id="segunda_accion">
	<?= form_submit('actividad', 'Nueva actividad'); ?>
</div>

<div id="tercera_accion">
	<?= form_submit('mensajes', 'Mis Mensajes'); ?>
</div>

<div id="cuarta_accion">
	<?= form_submit('actividades', 'Mis actividades'); ?>
</div>


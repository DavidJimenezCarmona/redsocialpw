<? 

if(isset($mensaje)) {
	echo $mensaje;
}

if(isset($peticiones)) {
	foreach ($peticiones as $peticion) {
		if($peticion["sexo"] == 1) {
			$sexo = "Hombre";
		}
		else {
			$sexo = "Mujer";
		}
		echo "<div class=\"ficha\">
				<p class=\"texto_ficha\">".$peticion["alias"]."</p>
				<p class=\"texto_ficha\">".$peticion["nombre"]."</p>
				<p class=\"texto_ficha\">".$peticion["apellidos"]."</p>
				<p class=\"texto_ficha\">".$sexo."</p>
				<p class=\"texto_ficha\">".$peticion["fecha_nacimiento"]."</p>
				<a href='".base_url()."index.php/controlador_amigos/aceptar_peticion/".$peticion["id"]."/".$_SESSION['usuario']->id."'><span>Aceptar peticion de amistad</span></a>

				</div>";
	}
}

?>
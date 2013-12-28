<? 

if(isset($mensaje)) {
	echo $mensaje;
}

if(isset($amigos)) {
	foreach ($amigos as $amigo) {
		if($amigo["sexo"] == 1) {
			$sexo = "Hombre";
		}
		else {
			$sexo = "Mujer";
		}
		echo "<div class=\"ficha\">
				<p class=\"texto_ficha\">".$amigo["alias"]."</p>
				<p class=\"texto_ficha\">".$amigo["nombre"]."</p>
				<p class=\"texto_ficha\">".$amigo["apellidos"]."</p>
				<p class=\"texto_ficha\">".$sexo."</p>
				<p class=\"texto_ficha\">".$amigo["fecha_nacimiento"]."</p>
				<a href='#'><span>Ver perfil</span></a>

				</div>";
	}
}

?>
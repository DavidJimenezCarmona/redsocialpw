<?

if(isset($amigo)) {
	foreach ($amigo as $amigo_aux) {
		if($amigo_aux["sexo"] == 1) {
			$sexo = "Hombre";
		}
		else {
			$sexo = "Mujer";
		}
		echo "<div id=\"perfil_datos_usuario\">
				<p class=\"titulo_perfil\"> Datos del usuario </p>
				<p class=\"texto_perfil\">".$amigo_aux["alias"]."</p>
				<p class=\"texto_perfil\">".$amigo_aux["nombre"]."</p>
				<p class=\"texto_perfil\">".$amigo_aux["apellidos"]."</p>
				<p class=\"texto_perfil\">".$sexo."</p>
				<p class=\"texto_perfil\">".$amigo_aux["fecha_nacimiento"]."</p>

				</div>";
	}

	echo "<div id=\"perfil_actividades_usuario\">
	<p class=\"titulo_perfil\"> Actividades creadas por el usuario </p>
	</div>";

	echo "<div id=\"perfil_amigos_usuario\">
	<p class=\"titulo_perfil\"> Amigos del usuario </p>
	</div>";

	echo "<div id=\"perfil_datos_usuario\">
	<p class=\"titulo_perfil\"> Datos del perfil del usuario </p>
	</div>";
}

?>
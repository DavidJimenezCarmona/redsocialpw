<?

if(isset($amigo)) {
	foreach ($amigo as $amigo_aux) {
		if($amigo_aux["sexo"] == 1) {
			$sexo = "Hombre";
		}
		else {
			$sexo = "Mujer";
		}
		echo "<div class=\"ficha\">
				<p class=\"titulo_perfil\"> Datos del usuario </p>
				<p class=\"texto_perfil\">".$amigo_aux["alias"]."</p>
				<p class=\"texto_perfil\">".$amigo_aux["nombre"]."</p>
				<p class=\"texto_perfil\">".$amigo_aux["apellidos"]."</p>
				<p class=\"texto_perfil\">".$sexo."</p>
				<p class=\"texto_perfil\">".$amigo_aux["fecha_nacimiento"]."</p>
				</div>";

		if(isset($perfil)) {

			foreach ($perfil as $perfil_aux) {

				echo "<div class=\"ficha\">
				<p class=\"titulo_perfil\"> Datos del perfil del usuario </p>
				<p class=\"texto_perfil\">".$perfil_aux["ocupacion"]."</p>
				<p class=\"texto_perfil\">".$perfil_aux["centro_actividad"]."</p>
				</div>";
				
			}

		}
	}

}

?>
<?

if(isset($amigo)) {
		if($amigo->sexo == 1) {
			$sexo = "Hombre";
		}
		else {
			$sexo = "Mujer";
		}
		echo "<div class=\"ficha\">
				<p class=\"titulo_perfil\"> Datos del usuario </p>
				<p class=\"texto_perfil\">".$amigo->alias."</p>
				<p class=\"texto_perfil\">".$amigo->nombre."</p>
				<p class=\"texto_perfil\">".$amigo->apellidos."</p>
				<p class=\"texto_perfil\">".$sexo."</p>
				<p class=\"texto_perfil\">".$amigo->fecha_nacimiento."</p>
				</div>";

		if(isset($perfil)) {

			echo "<div class=\"ficha\">
			<p class=\"titulo_perfil\"> Datos del perfil del usuario </p>
			<p class=\"texto_perfil\">".$perfil->ciudad_nacimiento->nombre."</p>
			<p class=\"texto_perfil\">".$perfil->ciudad_residencia->nombre."</p>
			<p class=\"texto_perfil\">".$perfil->ocupacion."</p>
			<p class=\"texto_perfil\">".$perfil->centro_actividad."</p>
			</div>";
				

		}

}

?>
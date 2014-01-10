<h1 id='tituloActividad'>Amigos</h1>
<? 

if(isset($mensaje)) {
	echo $mensaje;
}
$base = base_url();

if(isset($amigos)) {	
	foreach ($amigos as $amigo) {
		if($amigo->sexo == 1) {
			$sexo = "Hombre";
		}
		else {
			$sexo = "Mujer";
		}
		echo "<div class=\"ficha\">";

				if($amigo->perfil->foto==1)
					echo "<img id='logoam' src='". $base . "img/fotos_perfil/". $amigo->alias .".jpg'/>";				else 	
					echo "<div id='avatar'> <img id='logo' src='". base_url() ."img/avatar.jpg'/><br></div>";


				echo "<p class=\"texto_ficha\">".$amigo->alias."</p>
				<p class=\"texto_ficha\">".$amigo->nombre."</p>
				<p class=\"texto_ficha\">".$amigo->apellidos."</p>
				<p class=\"texto_ficha\">".$sexo."</p>
				<p class=\"texto_ficha\">".$amigo->fecha_nacimiento."</p>
				<a class=\"enlace\" href='".base_url()."index.php/controlador_amigos/mostrar_perfil/".$amigo->id."'><span>Ver perfil</span></a><br><br>";

				if($_SESSION['usuario']->permisos == 1 && $amigo->activo == 1) { //Es administrador y el usuario no esta baneado aún
					echo "<a class=\"enlace\" href='".base_url()."index.php/controlador_reporte/crear_reporte_admin/".$amigo->id."'><span>Banear usuario</span></a>";	
				}

				else if($_SESSION['usuario']->permisos == 1 && $amigo->activo == 0) {//Es administrador y el usuario esta baneado.
					echo "<a class=\"enlace\" href='".base_url()."index.php/controlador_reporte/eliminar_reporte_admin/".$amigo->id."'><span>Eliminar baneo</span></a>";	
				}
				
				echo "</div>";
	}
}

?>
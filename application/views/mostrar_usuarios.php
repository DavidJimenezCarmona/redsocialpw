<? 

if(isset($mensaje)) {
	echo $mensaje;
}

if(isset($amigos)) 
{
	if($amigos->alias != $_SESSION['usuario']->alias) {
		if($amigos->sexo == 1) {
			$sexo = "Hombre";
		}
		else {
			$sexo = "Mujer";
		}
		echo "<div class=\"ficha\">
			<p class=\"texto_ficha\">".$amigos->alias."</p>
			<p class=\"texto_ficha\">".$amigos->nombre."</p>
			<p class=\"texto_ficha\">".$amigos->apellidos."</p>
			<p class=\"texto_ficha\">".$sexo."</p>
			<p class=\"texto_ficha\">".$amigos->fecha_nacimiento."</p>
			<a class=\"enlace\" href='".base_url()."index.php/controlador_amigos/agregar_amigo/".$amigos->id."'><span>Agregar como amigo</span></a><br><br>";
				
			if($_SESSION['usuario']->permisos == 1 && $amigo->activo == 1) { //Es administrador y el usuario no esta baneado aún
				echo "<a class=\"enlace\" href='".base_url()."index.php/controlador_reporte/crear_reporte_admin/".$amigos->id."'><span>Reportar usuario</span></a>";	
			}

			else if($_SESSION['usuario']->permisos == 1) {//Es administrador y el usuario esta baneado.
				echo "<a class=\"enlace\" href='".base_url()."index.php/controlador_reporte/eliminar_reporte_admin/".$amigos->id."'><span>Eliminar reporte</span></a>";	
			}
		echo "</div>";
	}
	
}
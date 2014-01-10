<h1 id='tituloActividad'>Buscar amigos</h1>

<? 

if(isset($mensaje)) {
	echo $mensaje;
}

if(isset($amigos)) 
{
	$unico = 0;
	foreach($amigos as $amigo)
	{
		if(is_object($amigo)) //Varios registros
		{
			if($amigo->alias != $_SESSION['usuario']->alias) 
			{
				if($amigo->sexo == 1) {
					$sexo = "Hombre";
				}
				else {
					$sexo = "Mujer";
				}
				echo "<div class=\"ficha\">
					<p class=\"texto_ficha\">".$amigo->alias."</p>
					<p class=\"texto_ficha\">".$amigo->nombre."</p>
					<p class=\"texto_ficha\">".$amigo->apellidos."</p>
					<p class=\"texto_ficha\">".$sexo."</p>
					<p class=\"texto_ficha\">".$amigo->fecha_nacimiento."</p>
					<a class=\"enlace\" href='".base_url()."index.php/controlador_amigos/agregar_amigo/".$amigo->id."'><span>Agregar como amigo</span></a><br><br>";
						
					if($_SESSION['usuario']->permisos == 1 && $amigo->activo == 1) { //Es administrador y el usuario no esta baneado aún
						echo "<a class=\"enlace\" href='".base_url()."index.php/controlador_reporte/banear_usuario_admin/".$amigo->id."'><span>Banear usuario</span></a>";		
					}

					else if($_SESSION['usuario']->permisos == 1) {//Es administrador y el usuario esta baneado.
						echo "<a class=\"enlace\" href='".base_url()."index.php/controlador_reporte/desbanear_usuario_admin/".$amigo->id."'><span>Eliminar baneo</span></a>";	
					}
				echo "</div>";
			}
		}
		else //Único registro
		{
			$unico=1;
		}
	}
	$base = base_url();
	if ($unico==1)
	{
		if($amigos->alias != $_SESSION['usuario']->alias) 
			{
				if($amigos->sexo == 1) {
					$sexo = "Hombre";
				}
				else {
					$sexo = "Mujer";
				}
				echo "<div class=\"ficha\">";

				if($amigos->perfil[0]->foto==1)
					echo "<img id='logoam' src='". $base . "img/fotos_perfil/". $amigos->alias .".jpg'/>";
				else 	
					echo "<div id='avatar'> <img id='logo' src='". base_url() ."img/avatar.jpg'/><br></div>";

					echo "<p class=\"texto_ficha\">".$amigos->alias."</p>
					<p class=\"texto_ficha\">".$amigos->nombre."</p>
					<p class=\"texto_ficha\">".$amigos->apellidos."</p>
					<p class=\"texto_ficha\">".$sexo."</p>
					<p class=\"texto_ficha\">".$amigos->fecha_nacimiento."</p>
					<a class=\"enlace\" href='".base_url()."index.php/controlador_amigos/agregar_amigo/".$amigos->id."'><span>Agregar como amigo</span></a><br><br>";
						
					if($_SESSION['usuario']->permisos == 1 && $amigos->activo == 1) { //Es administrador y el usuario no esta baneado aún
						echo "<a class=\"enlace\" href='".base_url()."index.php/controlador_reporte/crear_reporte_admin/".$amigos->id."'><span>Banear usuario</span></a>";	
					}

					else if($_SESSION['usuario']->permisos == 1) {//Es administrador y el usuario esta baneado.
						echo "<a class=\"enlace\" href='".base_url()."index.php/controlador_reporte/eliminar_reporte_admin/".$amigos->id."'><span>Eliminar baneo</span></a>";	
					}
				echo "</div>";
			}
	}

	
}
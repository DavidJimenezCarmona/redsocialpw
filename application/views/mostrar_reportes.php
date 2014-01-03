<? 

if(isset($mensaje)) {
	echo $mensaje;
}

if(isset($reportes_nuevos)) {
	foreach ($reportes_nuevos as $reporte) {
		echo "<div class=\"ficha\">
				<p class=\"texto_ficha\">".$reporte->motivo."</p>
				<a href='".base_url()."index.php/controlador_reporte/banear_usuario/".$reporte->id."/".$reporte->id_usuario_reportado."'><span>Banear usuario</span></a><br><br>
				<a href='".base_url()."index.php/controlador_reporte/eliminar_reporte/".$reporte->id."''><span>Ignorar reporte</span></a>
				</div>";
	}
}

?>
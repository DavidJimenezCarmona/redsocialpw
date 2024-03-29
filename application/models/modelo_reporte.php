<?
class modelo_reporte extends CI_Model {

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();

        $id_usuario_reportado="";
        $id_usuario_reportador="";
        $motivo="";
        $estado= 1; //Predeterminado es 1 según la BD (Antes ponía 0)
    }
    
    function get_reportes()
    {
        $this->db->select(); 
        $this->db->where('estado',1);
        $query = $this->db->get('reporte');

        return $query->result();
    }

    function insertar_reporte($reporte)
    {
        $this->db->insert('reporte', $reporte);
    }

    function modificar_reporte($idReporte)
    {
        $this->estado = 0; //Ya lo ha visto un administrador
        $this->db->update('reporte', $this, array('id' => $idReporte)); 
    }

    function borrar_reporte($idUser)
    {
        $this->db->delete('reporte', array('id_usuario_reportado' => $idUser)); //Se borra el reporte de ese usuario.
        $this->load->model('modelo_usuario');
        $this->modelo_usuario->desbanear_usuario($idUser); //Se elimina el baneo del usuario
    }

    function borrar_reporte_id($idReporte) {

        $this->db->delete('reporte', array('id' => $idReporte)); //Se borra el reporte con esa id
    }

    function notificaciones_pendientes() {
        $this->db->select(); 
        $this->db->where('estado',1);
        $query = $this->db->get('reporte');

        if ($query->num_rows() > 0)
        {
            return 1;
        }
        return 0;
    }

    function esta_reportado($idUser) {
        $this->db->select(); 
        $this->db->where('id_usuario_reportado',$idUser);
        $query = $this->db->get('reporte');

        if ($query->num_rows() > 0)
        {
            return 1;
        }
        return 0;
    }

}
?>
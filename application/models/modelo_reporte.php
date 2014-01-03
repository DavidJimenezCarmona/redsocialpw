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
        $query = $this->db->get('reporte');
        return $query->result();
    }

    function insertar_reporte($idReportador, $idReportado)
    {
        $this->id_usuario_reportador = $idReportador;
        $this->id_usuario_reportado = $idReportado;
        $this->motivo = "Este usuario ha sido reportado automáticamente por un admin por algún comportamiento indebido.";
        $this->estado = 0; //No tiene que llegar notificación porque ha sido reportado por un admin
        $this->db->insert('reporte', $this);
        $this->load->model('modelo_usuario');
        $this->modelo_usuario->banear_usuario($idReportado); //Se banea directamente al usuario por ser petición de un admin.
    }

    function modificar_reporte()
    {
        $this->id_usuario_reportador=$_POST['id_usuario_reportador'];
        $this->id_usuario_reportado=$_POST['id_usuario_reportado'];
        $this->motivo=$_POST['motivo'];
        $this->estado=$_POST['estado'];
        $this->db->update('reporte', $this, array('id' => $_POST['id']));
    }

    function borrar_reporte()
    {
        $this->db->delete('reporte', $this, array('id' => $_POST['id']));
    }

    function notificaciones_pendientes($idUser) {
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
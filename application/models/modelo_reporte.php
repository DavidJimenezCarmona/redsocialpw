<?
class modelo_reporte extends CI_Model {

    $id_usuario_reportado="";
    $id_usuario_reportador="";
    $motivo="";
    $estado=0;

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();
    }
    
    function get_reportes()
    {
        $query = $this->db->get('reporte');
        return $query->result();
    }

    function insertar_reporte()
    {
        $this->id_usuario_reportador=$_POST['id_usuario_reportador'];
        $this->id_usuario_reportado=$_POST['id_usuario_reportado'];
        $this->motivo=$_POST['motivo'];
        $this->estado=$_POST['estado'];
    
        $this->db->insert('reporte', $this);
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

}
?>
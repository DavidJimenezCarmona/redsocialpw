<?
class modelo_tipo extends CI_Model {

    $nombre="";

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();
    }
    
    function get_tipos()
    {
        $query = $this->db->get('tipo');
        return $query->result();
    }

    function insertar_tipo()
    {
        $this->nombre=$_POST['nombre'];

        $this->db->insert('tipo', $this);
    }

    function modificar_tipo()
    {
        $this->nombre=$_POST['nombre'];

        $this->db->update('tipo', $this, array('id' => $_POST['id']));
    }

    function borrar_tipo()
    {
        $this->db->delete('tipo', $this, array('id' => $_POST['id']));
    }

}
?>
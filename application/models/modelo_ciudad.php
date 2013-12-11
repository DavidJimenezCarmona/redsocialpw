<?
class modelo_ciudad extends CI_Model {

    $nombre="";

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();
    }
    
    function get_ciudades()
    {
        $query = $this->db->get('ciudad');
        return $query->result();
    }

    function insertar_ciudad()
    {
        $this->nombre=$_POST['nombre'];

        $this->db->insert('ciudad', $this);
    }

    function modificar_ciudad()
    {
        $this->nombre=$_POST['nombre'];

        $this->db->update('ciudad', $this, array('id' => $_POST['id']));
    }

    function borrar_ciudad()
    {
        $this->db->delete('ciudad', $this, array('id' => $_POST['id']));
    }

}
?>
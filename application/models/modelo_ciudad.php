<?
class modelo_ciudad extends CI_Model {



    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();
        $nombre="";
    }

    function get_provincias()
    {
        $query = $this->db->get('provincias');
        return $query->result();
    }
    
    function get_ciudades()
    {
        $query = $this->db->get('municipios');
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
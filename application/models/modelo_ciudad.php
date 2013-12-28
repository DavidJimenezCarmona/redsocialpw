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
        $query = $this->db->query("SELECT id_provincia, provincia FROM provincias");
        foreach ($query->result() as $reg) 
        {
            $data[$reg->id_provincia] = $reg->provincia;
        }
        return $data;
    }
    
    function get_ciudades($codprov)
    {
        $query = $this->db->select('id_municipio,nombre')
                          ->where('id_provincia', $codprov)
                          ->get('municipios');                 

        foreach ($query->result() as $reg) 
        {
            $data[$reg->id_municipio] = $reg->nombre;
        }
        return $data;
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
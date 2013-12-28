<?
class modelo_tipo extends CI_Model {

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();
    }
    
    function get_tipos()
    {
        $query = $this->db->get('tipo');
        foreach ($query->result() as $reg) 
        {
            $data[$reg->id] = $reg->nombre;
        }
        return $data;
    }

    function get_tipo($id)
    {
        $query = $this->db->select()
                          ->where('id',$id)
                          ->get('tipo');
        return $query->row();    
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
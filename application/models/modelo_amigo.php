<?
class modelo_amigo extends CI_Model {

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();


        $id_usuario1="";
        $id_usuario2="";
        $aceptado=0;
    }

    function get_amigos($id) {
        $this->db->select('amigo');
        $this->db->where('id', $id); 
        $query = $this->db->get('amigo');

        return $query->row();  
    }
    
    function get_todos_amigos()
    {
        $query = $this->db->get('amigo');
        return $query->result();
    }

    function insertar_amigo()
    {
        $this->id_usuario1=$_POST['id_usuario1'];
        $this->id_usuario2=$_POST['id_usuario2'];
        $this->aceptado=$_POST['aceptado'];
    }

    function modificar_amigo()
    {
        $this->id_usuario1=$_POST['id_usuario1'];
        $this->id_usuario2=$_POST['id_usuario2'];
        $this->aceptado=$_POST['aceptado'];

        $this->db->update('amigo', $this, array('id' => $_POST['id']));
    }

    function borrar_amigo()
    {
        $this->db->delete('amigo', $this, array('id' => $_POST['id']));
    }

}
?>
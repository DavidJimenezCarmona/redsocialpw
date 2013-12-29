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

    function es_amigo($id1, $id2) {
        $this->db->select();
        $this->db->where('id_usuario1',$id1);
        $this->db->where('id_usuario2',$id2);
        $query = $this->db->get('amigo');

        if ($query->num_rows() == 0)
        {
            $this->db->select();
            $this->db->where('id_usuario1',$id2);
            $this->db->where('id_usuario2',$id1);
            $query = $this->db->get('amigo');
            
        }

        if($query->num_rows() == 0) {
            return 1; //Es falso
        }

        else {
            return 0; //Es verdad
        }
    }

    function get_amigos($id) {

        $query = $this->db->query("SELECT * FROM usuario WHERE id IN (SELECT id_usuario1 FROM amigo WHERE id_usuario2 = '$id' AND aceptado = 0) OR id IN (SELECT id_usuario2 FROM amigo WHERE id_usuario1 = '$id' AND aceptado = 0)");

        return $query->result_array();  
    }

    function get_peticiones($id) {
        $query = $this->db->query("SELECT * FROM usuario WHERE id IN (SELECT id_usuario1 FROM amigo WHERE id_usuario2 = '$id' AND aceptado = 1)");

        return $query->result_array();  
    }
    
    function get_todos_amigos()
    {
        $query = $this->db->get('amigo');
        return $query->result();
    }

    function insertar_amigo($id1, $id2)
    {
        $this->id_usuario1=$id1;
        $this->id_usuario2=$id2;
        $this->aceptado=1; //1 es FALSO que no te ha aceptado

        $this->db->insert('amigo', $this);
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

    function notificaciones_pendientes($id) {
        $this->db->select(); 
        $this->db->where('id_usuario2', $id); //Es receptor de la petición
        $this->db->where('aceptado',1);
        $query = $this->db->get('amigo');

        if ($query->num_rows() > 0)
        {
            return 0;
        }
        return 1;
    }

    function aceptar_peticion($id1, $id2) {

        $this->db->query("UPDATE amigo SET aceptado = 0 WHERE (aceptado = 1 AND id_usuario1 = '$id1' AND id_usuario2 = '$id2') ");
    }

}
?>
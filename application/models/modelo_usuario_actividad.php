<?
class modelo_usuario_actividad extends CI_Model {

    $id_actividad;
    $id_usuario;

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();
    }
    
    function get_usuarios_actividades()
    {
        $query = $this->db->get('usuario_actividad');
        return $query->result();
    }

    function insertar_usuario_actividad()
    {
        $this->id_actividad=$_POST['id_actividad'];
        $this->id_usuario=$_POST['id_usuario'];

        $this->db->insert('usuario_actividad', $this);
    }

    function modificar_usuario_actividad()
    {
        $this->id_actividad=$_POST['id_actividad'];
        $this->id_usuario=$_POST['id_usuario'];

        $this->db->update('usuario_actividad', $this, array('id' => $_POST['id']));
    }

    function borrar_usuario_actividad()
    {
        $this->db->delete('usuario_actividad', $this, array('id' => $_POST['id']));
    }

}
?>
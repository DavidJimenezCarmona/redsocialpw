<?
class modelo_usuario_actividad extends CI_Model {

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();

        $id_actividad;
        $id_usuario;
    }
    
    function get_usuarios_actividades()
    {
        $query = $this->db->get('usuario_actividad');
        return $query->result();
    }

    function get_actividades($id)
    {
        $query = $this->db->select('id_actividad')
                          ->where('id_usuario',$id)
                          ->get('usuario_actividad');

        $this->load->model('modelo_actividad');

        foreach ($query->result() as $id_actividad) 
            $data[$id_actividad->id_actividad] = $this->modelo_actividad->get_actividad($id_actividad->id_actividad);

        return $data;
    }

    function insertar_usuario_actividad($data)
    {
        $this->id_actividad=$data['id_actividad'];
        $this->id_usuario=$data['id_usuario'];

        $this->db->insert('usuario_actividad', $this);
    }

    function modificar_usuario_actividad()
    {
        $this->id_actividad=$_POST['id_actividad'];
        $this->id_usuario=$_POST['id_usuario'];

        $this->db->update('usuario_actividad', $this, array('id' => $_POST['id']));
    }

    function borrar_usuario_actividad($id_usuario, $id_actividad)
    {   
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('id_actividad', $id_actividad);  
        $this->db->delete('usuario_actividad'); 
    }

}
?>
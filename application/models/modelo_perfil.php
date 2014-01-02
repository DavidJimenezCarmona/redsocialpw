<?
class modelo_perfil extends CI_Model {

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();

        $id_usuario="";
        $id_ciudad_residencia="";
        $id_ciudad_nacimiento="";
        $ocupacion="";
        $centro_actividad="";
        $foto="";
    }

    function get_perfil($id)
    {
        $this->db->select();
        $this->db->where('id_usuario', $id); 
        $query = $this->db->get('perfil');

        return $query->result_array();
    }

    function modificar_perfil($idUser, $perfil) {

        $this->id_ciudad_residencia = $perfil['id_ciudad_residencia'];
        $this->id_ciudad_nacimiento = $perfil['id_ciudad_nacimiento'];
        $this->ocupacion = $perfil['ocupacion'];
        $this->centro_actividad = $perfil['centro_actividad'];

        $this->db->update('perfil', $this, array('id_usuario' => $idUser));
    }


    function get_perfiles()
    {
        $query = $this->db->get('perfil');
        return $query->result();
    }

    function insertar_perfil($data)
    {
        $this->id_usuario = $data['id_usuario'];

        $this->db->insert('perfil', $this);
    }

    function borrar_perfil()
    {
        $this->db->delete('perfil', $this, array('id' => $_POST['id']));
    }

}
?>
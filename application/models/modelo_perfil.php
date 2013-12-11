<?
class modelo_perfil extends CI_Model {

    $id_usuario="";
    $id_ciudad_residencia="";
    $id_ciudad_nacimiento="";
    $ocupacion="";
    $centro_actividad="";
    $foto="";

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();
    }
    
    function get_perfiles()
    {
        $query = $this->db->get('perfil');
        return $query->result();
    }

    function insertar_perfil()
    {
        $this->id_usuario=$_POST['id_usuario'];
        $this->id_ciudad_residencia=$_POST['id_ciudad_residencia'];
        $this->id_ciudad_nacimiento=$_POST['id_ciudad_nacimiento'];
        $this->ocupacion=$_POST['ocupacion'];
        $this->centro_actividad=$_POST['centro_actividad'];
        $this->foto=$_POST['foto'];


        $this->db->insert('perfil', $this);
    }

    function modificar_perfil()
    {
        $this->id_usuario=$_POST['id_usuario'];
        $this->id_ciudad_residencia=$_POST['id_ciudad_residencia'];
        $this->id_ciudad_nacimiento=$_POST['id_ciudad_nacimiento'];
        $this->ocupacion=$_POST['ocupacion'];
        $this->centro_actividad=$_POST['centro_actividad'];
        $this->foto=$_POST['foto'];

        $this->db->update('perfil', $this, array('id' => $_POST['id']));
    }

    function borrar_perfil()
    {
        $this->db->delete('perfil', $this, array('id' => $_POST['id']));
    }

}
?>
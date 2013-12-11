<?
class modelo_usuario extends CI_Model {

    $alias="";
    $pass="";
    $nombre="";
    $apellidos="";
    $sexo="";
    $fecha_nacimiento="";
    $email="";
    $activo=0;

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();
    }
    
    function get_usuarios()
    {
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function insertar_usuario()
    {
        $this->alias=$_POST['alias'];
        $this->pass=$_POST['pass'];
        $this->nombre=$_POST['nombre'];
        $this->apellidos=$_POST['apellidos'];
        $this->sexo=$_POST['sexo'];
        $this->fecha_nacimiento=$_POST['fecha_nacimiento'];
        $this->email=$_POST['email'];
        $this->activo=$_POST['activo'];

        $this->db->insert('usuario', $this);
    }

    function modificar_usuario()
    {
        $this->alias=$_POST['alias'];
        $this->pass=$_POST['pass'];
        $this->nombre=$_POST['nombre'];
        $this->apellidos=$_POST['apellidos'];
        $this->sexo=$_POST['sexo'];
        $this->fecha_nacimiento=$_POST['fecha_nacimiento'];
        $this->email=$_POST['email'];
        $this->activo=$_POST['activo'];

        $this->db->update('usuario', $this, array('id' => $_POST['id']));
    }

    function borrar_usuario()
    {
        $this->db->delete('usuario', $this, array('id' => $_POST['id']));
    }

}
?>
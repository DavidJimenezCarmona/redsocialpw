<?
class modelo_usuario extends CI_Model {

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();

        $alias=" ";
        $pass=" ";
        $nombre=" ";
        $apellidos=" ";
        $sexo=" ";
        $fecha_nacimiento=" ";
        $email=" ";
        $activo=0;
    }
    
    function get_usuarios()
    {
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function get_usuario($id)
    {
        $this->db->select('usuario');
        $this->db->where('id', $id);    
        $query = $this->db->get('usuario');

        return $query->row();
    }

    function get_usuario_alias($alias)
    {
        $this->db->select();
        $this->db->where('alias', $alias); 
        $query = $this->db->get('usuario');

        $result = $query->result();
        //return new modelo_usuario($row->nombre, $row->sexo, $row->alias);
        return $result;
    }

    function login($alias, $pass)
    {
        $this->db->select();
        $this->db->where('alias', $alias); 
        $this->db->where('pass', md5($pass));
        $query = $this->db->get('usuario');

        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        return 0;
    }

    function insertar_usuario($usuario)
    {
        $this->alias=$usuario['alias'];
        $this->pass=md5($usuario['pass']);
        $this->nombre=$usuario['nombre'];
        $this->apellidos=$usuario['apellidos'];
        if ($usuario['sexo']=='Hombre' || 'hombre' || 'HOMBRE')
            $this->sexo=1; 
        else
            $this->sexo=0;
        $this->fecha_nacimiento=$usuario['fecha_nacimiento'];
        $this->email=$usuario['email'];
        $this->activo=1; //1 activo, 0 inactivo

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
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

    function unicidad_alias($alias) {
        $this->db->select('alias');
        $this->db->where('alias', $alias);    
        $query = $this->db->get('usuario');

        if($query->row() == null) {
            return 1;
        }

        else {
            return 0;
        }
    }
    
    function get_usuarios()
    {
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function get_alias($id)
    {
        $this->db->select('alias');
        $this->db->where('id', $id);    
        $query = $this->db->get('usuario');

        return $query->row();
    }

    function get_usuario($id)
    {
        $this->db->select();
        $this->db->where('id', $id);    
        $query = $this->db->get('usuario');

        return $query->row();
    }

    function get_usuario_alias($alias)
    {
        $this->db->select();
        $this->db->where('alias', $alias); 
        $query = $this->db->get('usuario');
        return $query->row();
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
        $this->sexo=$usuario['sexo'];
        $this->fecha_nacimiento=$usuario['fecha_nacimiento'];
        $this->email=$usuario['email'];
        $this->activo=1; //1 activo, 0 inactivo

        $this->db->insert('usuario', $this);
    }


    function modificar_usuario($usuario)
    {
        $this->alias=$usuario->alias;
        $this->pass=$usuario->pass;
        $this->nombre=$usuario->nombre;
        $this->apellidos=$usuario->apellidos;
        $this->sexo=$usuario->sexo;
        $this->fecha_nacimiento=$usuario->fecha_nacimiento;
        $this->email=$usuario->email;
        $this->activo=$usuario->activo;

        $this->db->update('usuario', $this, array('id' => $usuario->id));
    }

    function borrar_usuario()
    {
        $this->db->delete('usuario', $this, array('id' => $_POST['id']));
    }

    function banear_usuario($idUser) {
        $this->activo = 0;
        $this->db->update('usuario', $this, array('id' => $idUser));
    }

    function desbanear_usuario($idUser) {
        $this->activo = 1;
        $this->db->update('usuario', $this, array('id' => $idUser));
    }

}
?>
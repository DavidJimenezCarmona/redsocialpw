<?
class modelo_mensaje extends CI_Model {

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();

        $id;
        $id_usuario_emisor;
        $id_usuario_receptor;
        $titulo;
        $contenido;
        $fecha;
        $visto=0;

        $this->load->model('modelo_usuario');
    }

    function get_mensaje($id)
    {
        $query = $this->db->select()
                          ->where('id', $id)
                          ->get('mensaje');
        return $query->row();
    }
    
    function get_mensajes($id)
    {
        $query = $this->db->select()
                          ->where('id_usuario_receptor', $id)
                          ->where('borrado_receptor', 0)
                          ->get('mensaje');
        
        foreach ($query->result() as $row) 
        {
            $data[$row->id]['id']=$row->id;
            $data[$row->id]['id_usuario_emisor']=$row->id_usuario_emisor;
            $data[$row->id]['alias_emisor']=$this->modelo_usuario->get_alias($row->id_usuario_emisor)->alias;
            $data[$row->id]['id_usuario_receptor']=$row->id_usuario_receptor;
            $data[$row->id]['titulo']=$row->titulo;
            $data[$row->id]['contenido']=$row->contenido;
            $data[$row->id]['fecha']=$row->fecha;
            $data[$row->id]['visto']=$row->visto;
        }

        if (isset($data))
            return $data;
    }

    function get_mensajes_enviados($id)
    {
        $query = $this->db->select()
                          ->where('id_usuario_emisor', $id)
                          ->where('borrado_emisor', 0)
                          ->get('mensaje');
        
        foreach ($query->result() as $row) 
        {
            $data[$row->id]['id']=$row->id;
            $data[$row->id]['id_usuario_emisor']=$row->id_usuario_emisor;
            $data[$row->id]['alias_emisor']=$this->modelo_usuario->get_alias($row->id_usuario_emisor)->alias;
            $data[$row->id]['id_usuario_receptor']=$row->id_usuario_receptor;
            $data[$row->id]['titulo']=$row->titulo;
            $data[$row->id]['contenido']=$row->contenido;
            $data[$row->id]['fecha']=$row->fecha;
            $data[$row->id]['visto']=$row->visto;
        }

        if (isset($data))
            return $data;
    }

    function insertar_mensaje($mensaje)
    {
        $this->db->insert('mensaje', $mensaje);
    }

    function modificar_mensaje($mensaje)
    {
        $this->db->update('mensaje', $mensaje, array('id' => $mensaje->id));
    }

    function borrar_ciudad()
    {
        $this->db->delete('mensaje', $this, array('id' => $_POST['id']));
    }

}
?>
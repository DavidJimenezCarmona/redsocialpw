<?
class modelo_mensaje extends CI_Model {

    $id_usuario_emisor;
    $id_usuario_receptor;
    $contenido;
    $visto=0;

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();
    }
    
    function get_mensajes()
    {
        $query = $this->db->get('mensaje');
        return $query->result();
    }

    function insertar_mensaje()
    {
        
        $this->id_usuario_emisor=$_POST['id_usuario_emisor'];
        $this->id_usuario_receptor=$_POST['id_usuario_receptor'];
        $this->contenido=$_POST['contenido'];
        $this->visto=$_POST['visto'];

        $this->db->insert('mensaje', $this);
    }

    function modificar_mensaje()
    {
        $this->id_usuario_emisor=$_POST['id_usuario_emisor'];
        $this->id_usuario_receptor=$_POST['id_usuario_receptor'];
        $this->contenido=$_POST['contenido'];
        $this->visto=$_POST['visto'];

        $this->db->update('mensaje', $this, array('id' => $_POST['id']));
    }

    function borrar_ciudad()
    {
        $this->db->delete('mensaje', $this, array('id' => $_POST['id']));
    }

}
?>
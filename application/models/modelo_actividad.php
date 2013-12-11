<?
class modelo_actividad extends CI_Model {

    $nombre="";
    $id_tipo;
    $fecha_inicio;
    $fecha_fin;
    $id_ciudad;
    $lugar;
    $descripcion;
    $plazas;

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();
    }
    
    function get_actidades()
    {
        $query = $this->db->get('actividad');
        return $query->result();
    }

    function insertar_actividad()
    {
        $this->nombre=$_POST['nombre'];
        $this->id_tipo=$_POST['id_tipo'];
        $this->fecha_inicio=$_POST['fecha_inicio'];
        $this->fecha_fin=$_POST['fecha_fin'];
        $this->id_ciudad=$_POST['id_ciudad'];
        $this->lugar=$_POST['lugar'];
        $this->descripcion=$_POST['descripcion'];
        $this->plazas=$_POST['plazas'];

        $this->db->insert('actividad', $this);
    }

    function modificar_actividad()
    {
        $this->nombre=$_POST['nombre'];
        $this->id_tipo=$_POST['id_tipo'];
        $this->fecha_inicio=$_POST['fecha_inicio'];
        $this->fecha_fin=$_POST['fecha_fin'];
        $this->id_ciudad=$_POST['id_ciudad'];
        $this->lugar=$_POST['lugar'];
        $this->descripcion=$_POST['descripcion'];
        $this->plazas=$_POST['plazas'];

        $this->db->update('actividad', $this, array('id' => $_POST['id']));
    }

    function borrar_actividad()
    {
        $this->db->delete('actividad', $this, array('id' => $_POST['id']));
    }

}
?>
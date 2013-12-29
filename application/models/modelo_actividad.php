<?
class modelo_actividad extends CI_Model {

    function __construct()
    {
        // Llama al constructor de modelo
        parent::__construct();

        $nombre="";
        $id_tipo;
        $fecha_inicio;
        $fecha_fin;
        $id_ciudad;
        $lugar;
        $descripcion;
        $plazas;
    }
    
    function get_actividades()
    {
        $query = $this->db->get('actividad');
        return $query->result();
    }

    function get_actividades_provincia($id)
    {
        $query = $this->db->query("SELECT DISTINCT a.*
                                    FROM provincias as p, municipios as m, actividad as a 
                                    WHERE p.id_provincia=m.id_provincia AND m.id_municipio=a.id_ciudad AND p.id_provincia=".$id." AND a.plazas > 0" );
        $data=$query->result();

        $this->load->model('modelo_tipo');
        $this->load->model('modelo_ciudad');

        foreach ($data as $row) 
        {    
            //print_r($row);
            $tipo=$this->modelo_tipo->get_tipo($row->id_tipo);
            $row->tipo=$tipo;
            
            $ciudad=$this->modelo_ciudad->get_ciudad($row->id_ciudad);
            $row->ciudad=$ciudad;
        }

        return $data;
    }

    function get_actividad($id)
    {
        $query = $this->db->select()
                          ->where('id',$id)  
                          ->get('actividad');
        $data = $query->row();

        $this->load->model('modelo_tipo');
        $tipo=$this->modelo_tipo->get_tipo($data->id_tipo);
        $data->tipo=$tipo;

        $this->load->model('modelo_ciudad');
        $ciudad=$this->modelo_ciudad->get_ciudad($data->id_ciudad);
        $data->ciudad=$ciudad;

        return $data;
    }

    function insertar_actividad($data)
    {
        $this->nombre=$data['nombre'];
        $this->id_tipo=$data['id_tipo'];
        $this->fecha_inicio=$data['fecha_inicio'];
        $this->fecha_fin=$data['fecha_fin'];
        $this->id_ciudad=$data['id_ciudad'];
        $this->lugar=$data['lugar'];
        $this->descripcion=$data['descripcion'];
        $this->plazas=$data['plazas'];

        $this->db->insert('actividad', $this);
    }

    function modificar_actividad($data)
    {
        $this->nombre=$data->nombre;
        $this->id_tipo=$data->id_tipo;
        $this->fecha_inicio=$data->fecha_inicio;
        $this->fecha_fin=$data->fecha_fin;
        $this->id_ciudad=$data->id_ciudad;
        $this->lugar=$data->lugar;
        $this->descripcion=$data->descripcion;
        $this->plazas=$data->plazas;

        $this->db->update('actividad', $this, array('id' => $data->id));
    }

    function borrar_actividad()
    {
        $this->db->delete('actividad', $this, array('id' => $_POST['id']));
    }

}
?>
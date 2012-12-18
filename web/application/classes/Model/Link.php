<?php
/**
 * Description of Link
 *
 * @author gerardo
 */
class Model_Link extends ORM {
    protected $_table_name = "LINK";
    
    public function ObtenerLinks($usuario)
    {
        $links = new Model_Link();
        $links->where("ID_TIPO_USUARIO", "=", $usuario->ID_TIPO_USUARIO);
        return $links->find_all();
    }
    
}

?>

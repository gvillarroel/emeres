<?php
/**
 * Description of Link
 *
 * @author gerardo
 */
class Model_Link extends ORM {
    protected $_table_name = "Link";
    
    public function ObtenerLinks($usuario)
    {
        $links = new Model_Link();
        $links->where("idTipoUsuario", "=", $usuario->idTipoUsuario);
        return $links->find_all();
    }
    
}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoUsuario
 *
 * @author Felipe González Alfaro
 */
class Model_TipoUsuario extends ORM{
    protected $_table_name = "TipoUsuario";

    public function getAllTipo(){
        
        return $this->find_all();
        
    }
}

?>

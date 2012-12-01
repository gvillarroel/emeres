<?php defined('SYSPATH') or die('No direct script access.');

class Model_Usuario extends ORM {
    
    protected $_table_name = "Usuario";
    //put your code here
    public $id;
    public $nombre;
    public $clave;
    public $correoElectronico;
}

?>

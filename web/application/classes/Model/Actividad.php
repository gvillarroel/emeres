<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Actividad extends ORM {
     protected $_table_name = "actividad";
	 protected $_primary_key = 'CORREL_ACTIVIDAD';
	 protected $_foreign_key =  array('proyecto' => 'ID_PROYECTO');
}
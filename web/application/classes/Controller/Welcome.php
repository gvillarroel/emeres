<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
                $model = new Model_Usuario();
                echo "aaaaaaa";
                $model->nombre = "NombreEjemplo";
                $model->apellido = "ApellidoEjemplo";
                
                $view = View::factory("home/index");
                
                $view->set("usuario", $model);
                
                $this->response->body($view);
	}
        

} // End Welcome

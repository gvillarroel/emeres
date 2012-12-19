<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Actividad extends Controller {
		
	public $scripts = array(
        				'http://code.jquery.com/jquery-1.8.3.js',
        				'http://code.jquery.com/ui/1.9.2/jquery-ui.js',
        				'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js',
        				'application/classes/Controller/js/validaciones.js'
        				);
						
	public $styles = array(
        				'http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css'
        				);
						
	public function action_inicio() {
		if(!Session::instance()->GetUsuario())
        	return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/defecto");
		$template->body = View::factory("actividad/inicio");
		$template->body->set("actividades", $this->getActividades($this->request->param('id')));
		$template->body->set("ID_PROYECTO", $this->request->param('id'));
		$this->response->body($template);
	}
	
	public function action_update() {
		$actividad = ORM::factory('actividad', $this->request->post('CORREL_ACTIVIDAD'));
        $actividad->values($_POST); 
        $actividad->save();
        return $this->redirect("proyecto/ver/".$this->request->post('ID_PROYECTO'));
    }
	
	public function action_delete() {
		$actividad = ORM::factory('actividad', $this->request->post('CORREL_ACTIVIDAD'));
        $actividad->values($_POST); 
        $actividad->delete();
        return $this->redirect("proyecto/ver/".$this->request->post('ID_PROYECTO'));
    }
	
	public function action_nuevo(){
		if(!Session::instance()->GetUsuario())
        	return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
		$template->body = View::factory("actividad/nuevo");
		$template->set("scripts", $this->scripts);
	   	$template->set("styles", $this->styles);
		$template->body->set("ID_PROYECTO", $this->request->param('id'));
		$this->response->body($template);		
	}
	
    public function action_post() {
        $actividad = new Model_Actividad();
        $actividad->values($_POST); 
        $actividad->save(); 
        return $this->redirect("proyecto/ver/".$this->request->post('ID_PROYECTO'));
    }
	
    public function action_editar() {
    	/****Session, menu usuario y lateral ****/
    	if(!Session::instance()->GetUsuario())
            return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
		/***************************************/
        $actividad = new Model_Actividad();
        $template->body = View::factory("actividad/editar");
		$CORREL_ACTIVIDAD = $this->request->post('CORREL_ACTIVIDAD');
		$actividad = new Model_Actividad($CORREL_ACTIVIDAD);
		$template->body->set("actividad", $actividad);
		$ID_PROYECTO = $this->request->post('ID_PROYECTO');
		$template->body->set("ID_PROYECTO", $ID_PROYECTO);
		$template->set("scripts", $this->scripts);
	   	$template->set("styles", $this->styles);
		$this->response->body($template);
	}
	
	public function action_borrar() {
    	/****Session, menu usuario y lateral ****/
    	if(!Session::instance()->GetUsuario())
            return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
		/***************************************/
        $actividad = new Model_Actividad();
        $template->body = View::factory("actividad/borrar");
		$CORREL_ACTIVIDAD = $this->request->post('CORREL_ACTIVIDAD');
		$actividad = new Model_Actividad($CORREL_ACTIVIDAD);
		$template->body->set("actividad", $actividad);
		$ID_PROYECTO = $this->request->post('ID_PROYECTO');
		$template->body->set("ID_PROYECTO", $ID_PROYECTO);
		$this->response->body($template);
	}
	
	
	private function getActividades($ID_PROYECTO){
		$actividades = new Model_Actividad(); //instancia el modelo
		$actividades = $actividades->where("ID_PROYECTO", "=", $ID_PROYECTO); //Crea la consulta
		$actividades = $actividades->find_all(); //exige que devuelva todos los valores encontrados

		$result = array();
		foreach($actividades as $actividad){
			$result[] = $actividad;
		}
		return $result;
	}
}
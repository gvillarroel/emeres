<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Proyecto extends Controller {
    
	public $scripts = array(
        				'http://code.jquery.com/jquery-1.8.3.js',
        				'http://code.jquery.com/ui/1.9.2/jquery-ui.js',
        				'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js',
        				'application/classes/Controller/js/validaciones.js'
        				);
						
	public $styles = array(
        				'http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css'
        				);
						
    public function action_guardar() {
    	if(!Session::instance()->GetUsuario())
            return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        $proyecto = new Model_Proyecto();
        $template->body = View::factory("proyecto/guardar");
        $template->body->set("proyecto", $proyecto);
			
        $template->set("scripts", $this->scripts);
	   	$template->set("styles", $this->styles);
		
        $this->response->body($template);
    }
	
	    // loads the new proyecto form
    public function action_buscar() {
    	if(!Session::instance()->GetUsuario())
            return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        //$proyecto = new Model_Proyecto();
        $proyecto_id= $this->request->param('ID_PROYECTO');
		$proyecto = ORM::factory('Proyecto',$proyecto_id);
		
        $template->body = View::factory("proyecto/buscar");
		$template->body->set("proyecto", $proyecto);
		$template->body->set("proyectos", $this->getProyectos());
		
		$criterios = array('Nombre Proyecto', 'Plan Estrategico', 'Responsable', 'Descripcion', 'Fecha Inicio Proy', 'Fecha Fin Proy');
        $template->body->set("criterios", $criterios);
		
        $template->set("scripts", $this->scripts);
	   	$template->set("styles", $this->styles);
		
        $this->response->body($template);
    }
	
    public function action_multiple() {
		if(!Session::instance()->GetUsuario())
        	return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
		$template->body = View::factory("proyecto/multiple");
		
		if($this->request->post("criterio")==0){
			$culumna="NOMBRE_PROYECTO";
			$buscar=$this->request->post("palabraBusqueda");
			$cual="Nombre del Proyecto";
		}
		if($this->request->post("criterio")==1){
			$culumna="ID_PLAN";
			$buscar=$this->request->post("palabraBusqueda");
			$cual="Responsable";
		}
		if($this->request->post("criterio")==2){
			$culumna="ID_USUARIO";
			$buscar=$this->request->post("palabraBusqueda");
			$cual="Responsable";
		}
		if($this->request->post("criterio")==3){
			$culumna="DESCRIPCION_PROYECTO";
			$buscar=$this->request->post("palabraBusqueda");
			$cual="Descripcion del Proyecto";
		}
		if($this->request->post("criterio")==4){
			$culumna="FECHA_INICIO_PROYECTO";
			$buscar=$this->request->post("palabraBusqueda");
			$cual="Fecha Inicio del Proyecto";
		}
		if($this->request->post("criterio")==5){
			$culumna="FECHA_TERMINO_PROYECTO";
			$buscar=$this->request->post("palabraBusqueda");
			$cual="Fecha Termino del Proyecto";
		}
		$template->body->set("que", $buscar);
		$template->body->set("cual", $cual);
		$template->body->set("proyectoBuscado", $this->getProyectosByColumn($culumna,$buscar));
		$this->response->body($template);
    }

	public function action_editar() {
		if(!Session::instance()->GetUsuario())
        	return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
		$template->body = View::factory("proyecto/editar");
		
		$ID_PROYECTO = $this->request->param('id');
		$proyecto = new Model_Proyecto($ID_PROYECTO);
		$template->body->set("proyecto", $proyecto);
			
        $template->set("scripts", $this->scripts);
		$this->response->body($template);
	}
	
	public function action_borrar() {
		if(!Session::instance()->GetUsuario())
        	return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
		$template->body = View::factory("proyecto/borrar");
		
		$ID_PROYECTO = $this->request->param('id');
		$proyecto = new Model_Proyecto($ID_PROYECTO);
		$template->body->set("proyecto", $proyecto);
			
        $template->set("scripts", $this->scripts);
		$this->response->body($template);
	}
	
	public function action_ver() {
		if(!Session::instance()->GetUsuario())
        	return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
		
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
		
		$template->body = View::factory("proyecto/ver");
		
		$proyectoId = $this->request->param('id');
		$proyecto = new Model_Proyecto($proyectoId);
		$template->body->set("proyecto", $proyecto);
		$this->response->body($template);
	}
	
	private function getProyectos(){
		$proyectos = ORM::factory('proyecto')->find_all();
		$result = array();
		foreach($proyectos as $proyecto){
			$result[] = $proyecto;
		}
		return $result;
	}
			
	private function getProyectosByColumn($columna,$busqueda){
		$proyectos = new Model_Proyecto(); //instancia el modelo
		$proyectos = $proyectos->where($columna, "=", $busqueda); //Crea la consulta
		$proyectos = $proyectos->find_all(); //exige que devuelva todos los valores encontrados
		$result = array();
	    foreach($proyectos as $proy){
			$result[] = $proy;
		}
		return $result;
	}

	//TO DO	
	public function getResponsables(){
		$usuarios = ORM::factory('usuario')->find_all();
		$result = array();
		
		foreach($usuarios as $usuario){
			$result[] = $usuario;
		}
	}
	
    public function action_index() {
        $view = new View('proyecto/index');
        $this->response->body($view);
    }
 
    // Guarda
    public function action_post() {
        //$proyecto_id = $this->request->param('id');
        $proyecto = new Model_Proyecto();
        $proyecto->values($_POST); // populate $proyecto object from $_POST array
        $proyecto->save(); // saves proyecto to database
        return $this->redirect("proyecto/buscar");
    }
	
   	public function action_update() {
   		$proyecto = ORM::factory('proyecto', $this->request->post('ID_PROYECTO'));
        $proyecto->values($_POST); // populate $proyecto object from $_POST array
        $proyecto->save(); // saves proyecto to database
        return $this->redirect("proyecto/buscar");
    }
	
   	public function action_delete() {
   		$proyecto = ORM::factory('proyecto', $this->request->post('ID_PROYECTO'));
        $proyecto->values($_POST);
        $proyecto->delete(); // saves proyecto to database
        return $this->redirect("proyecto/buscar");
    }
 
}
?>

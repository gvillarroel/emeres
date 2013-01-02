<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Compromiso extends Controller {
		
	public $scripts = array(
        				'http://code.jquery.com/jquery-1.8.3.js',
        				'http://code.jquery.com/ui/1.9.2/jquery-ui.js',
        				'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js',
        				'application/classes/Controller/js/validaciones.js'
        				);
						
	public $styles = array(
        				'http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css'
        				);
        				
	public function action_index() {
        $view = new View('compromiso/buscar');
        $this->response->body($view);
    }
	
    public function action_post() {
        $compromiso = new Model_Compromiso();
        $compromiso->values($_POST); 
        $compromiso->save(); 
        return $this->redirect("compromiso/buscar");
    }
	
   	public function action_update() {
   		$compromiso = ORM::factory('compromiso', $this->request->post('ID_COMPROMISO'));
        $compromiso->values($_POST); 
        $compromiso->save();
        return $this->redirect("compromiso/buscar");
    }
    public function action_nuevo() {
    	/****Session, menu usuario y lateral ****/
    	if(!Session::instance()->GetUsuario())
            return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
		/***************************************/
        $compromiso = new Model_Compromiso();
        $template->body = View::factory("compromiso/nuevo");
        $template->body->set("compromiso", $compromiso);
		$template->set("scripts", $this->scripts);
	   	$template->set("styles", $this->styles);
		
        $this->response->body($template);
    }
	
    public function action_buscar() {
    	/****Session, menu usuario y lateral ****/
    	if(!Session::instance()->GetUsuario())
            return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        /***************************************/
        $compromiso_id= $this->request->param('ID_COMPROMISO');
		$compromiso = ORM::factory('Compromiso',$compromiso_id);
		
        $template->body = View::factory("compromiso/buscar");
		$template->body->set("compromiso", $compromiso);
		$template->body->set("compromisos", $this->getCompromisos());
		
		$criterios = array('Nombre Compromiso', 'Estado', 'Iniciativa', 'Descripcion', 'Fecha Inicio', 'Fecha Fin');
        $template->body->set("criterios", $criterios);
		
		$template->set("scripts", $this->scripts);
	   	$template->set("styles", $this->styles);
		
        $this->response->body($template);
    }
	
    public function action_multiple() {
    	/****Session, menu usuario y lateral ****/
		if(!Session::instance()->GetUsuario())
        	return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        /***************************************/
		$template->body = View::factory("compromiso/multiple");
		
		if($this->request->post("criterio")==0){
			$culumna="NOMBRE_COMPROMISO";
			$buscar=$this->request->post("palabraBusqueda");
			$cual="Nombre del Compromiso";
		}
		if($this->request->post("criterio")==1){
			$culumna="ESTADO_COMPROMISO";
			$buscar=$this->request->post("palabraBusqueda");
			$cual="Estado";
		}
		if($this->request->post("criterio")==2){
			$culumna="CORREL_INICIA";
			$buscar=$this->request->post("palabraBusqueda");
			$cual="Iniciativa";
		}
		if($this->request->post("criterio")==3){
			$culumna="DESCRIPCION_COMPROMISO";
			$buscar=$this->request->post("palabraBusqueda");
			$cual="Descripcion del Compromiso";
		}
		if($this->request->post("criterio")==4){
			$culumna="FECHA_INICIO_COMPROMISO";
			$buscar=$this->request->post("palabraBusqueda");
			$cual="Fecha Inicio del Compromiso";
		}
		if($this->request->post("criterio")==5){
			$culumna="FECHA_FIN_COMPROMISO";
			$buscar=$this->request->post("palabraBusqueda");
			$cual="Fecha Termino del Compromiso";
		}
		$template->body->set("que", $buscar);
		$template->body->set("cual", $cual);
		$template->body->set("compromisoBuscado", $this->getCompromisosByColumn($culumna,$buscar));
		$this->response->body($template);
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
		$template->body = View::factory("compromiso/editar");
		
		$compromisoId = $this->request->param('id');
		$compromiso = new Model_Compromiso($compromisoId);
		$template->body->set("compromiso", $compromiso);
		$template->set("scripts", $this->scripts);
	   	$template->set("styles", $this->styles);
		
		$this->response->body($template);
	}
	public function action_ver() {
		/****Session, menu usuario y lateral ****/
		if(!Session::instance()->GetUsuario())
        	return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
		/***************************************/
		
		$template->body = View::factory("compromiso/ver");
		$compromisoId = $this->request->param('id');
		$compromiso = new Model_Compromiso($compromisoId);
		$template->body->set("compromiso", $compromiso);
		$this->response->body($template);
	}
	private function getCompromisos(){
		$compromisos = ORM::factory('compromiso')->find_all();
		$result = array();
		foreach($compromisos as $compromiso){
			$result[] = $compromiso;
		}
		return $result;
	}
			
	private function getCompromisosByColumn($columna,$busqueda)
	{
		$compromisos = new Model_Compromiso(); //instancia el modelo
		$compromisos = $compromisos->where($columna, "=", $busqueda); //Crea la consulta
		$compromisos = $compromisos->find_all(); //exige que devuelva todos los valores encontrados
		$result = array();
	    foreach($compromisos as $proy){
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
	

 
}
?>

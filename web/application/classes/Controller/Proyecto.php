<?php

class Controller_Proyecto extends Controller {
    
    public function action_buscar()
    {
        if(!Session::instance()->GetUsuario())
            return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        
        $template->body = View::factory("proyecto/buscar");
        
        $this->response->body($template);
    }
    
}

?>

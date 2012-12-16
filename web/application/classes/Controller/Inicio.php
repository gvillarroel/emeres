<?php

/**
 * Description of Inicio
 *
 * @author gerardo
 */
class Controller_Inicio extends Controller {
    //put your code here
    
    public function action_sesion()
    {
        if(Session::instance()->GetUsuario())
            return $this->redirect("Inicio/Principal");
        $template = View::factory("base/defecto");
        $template->body = View::factory("inicio/sesion");
        
        $usuario = new Model_Usuario();
        
        if($this->request->post("nick") != null)
                $usuario = $usuario->where ("NICK", "=", $this->request->post("nick"))->find();
        
        if($this->request->post("clave") != null)
           if($usuario->EsClave($this->request->post("clave")))
           {
               Session::instance()->SetUsuario($usuario);
               return $this->redirect("inicio/principal");
           }
           else
           {
               //$template->set("errors",array(I18n::get("inicio.sesion.errorClave")));
               $template->set("errors",array($usuario->CLAVE));
               
           }
           
        $template->body->set("usuario", $usuario);
        $this->response->body($template);
    }
    
    public function action_cerrarSesion()
    {
        Session::instance()->SetUsuario(NULL);
        return $this->redirect("/");
    }
    
    public function action_principal(){
        if(!Session::instance()->GetUsuario())
            return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        
        
        $this->response->body($template);
    }
    
}

?>

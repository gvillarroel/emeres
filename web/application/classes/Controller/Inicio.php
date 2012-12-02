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
        
        if($this->request->post("correoElectronico") != null)
                $usuario = $usuario->where ("correoElectronico", "=", $this->request->post("correoElectronico"))->find();
        
        if($this->request->post("clave") != null)
           if($usuario->EsClave($this->request->post("clave")))
           {
               Session::instance()->SetUsuario($usuario->id);
               return $this->redirect("inicio/principal");
           }
           else
           {
               $template->set("errors",array(I18n::get("inicio.sesion.errorClave")));
           }
           
        $template->body->set("usuario", $usuario);
        $this->response->body($template);
    }
    
    public function action_principal(){
        if(!Session::instance()->GetUsuario())
            return $this->redirect("/");
    }
    
}

?>

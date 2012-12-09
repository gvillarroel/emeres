<?php

/**
 * Description of Usuario
 *
 * @author gerardo
 */
class Controller_Usuario extends Controller {

    public function action_recuperarClave() {
        $template = View::factory("base/defecto");
        $template->body = View::factory("usuario/recuperarClave");

        $usuario = new Model_Usuario();

        if ($this->request->post("correoElectronico") != NULL) {
            if ($usuario->
                            where("correoElectronico", "=", $this->request->post("correoElectronico"))
                            ->count_all() > 0) {
                $usuario->find();
                $mensaje = View::factory("usuario/recuperarClaveMensaje")->set("usuario", $usuario)->render();
                $usuario->RecuperarClave($mensaje);
                $template->body = View::factory("usuario/correoEnviado");
            }
        }
        $template->body->set("usuario", $usuario);
        $this->response->body($template);
    }

    public function action_cambiarClave() {
        $template = View::factory("base/defecto");
        $template->body = View::factory("usuario/cambiarClave");

        $usuario = new Model_Usuario();

        if ($this->request->query("id") != NULL AND $this->request->query("codigo") != NULL) {
            $id = $this->request->query("id");
            $codigo = $this->request->query("codigo");

            if ($usuario->
                            where("id", "=", $id)->
                            where("codigoActivacion", "=", $codigo)->
                            count_all() > 0) {
                $usuario->find();

                if ($this->request->post("clave") != NULL AND $this->request->post("claveRevision") != NULL) {
                    if ($this->request->post("clave") == $this->request->post("claveRevision"))
                        if (strlen($this->request->post("clave")) > 5) {
                            $usuario->CambiarClave($this->request->post("clave"));
                            Session::instance()->SetUsuario($usuario->id);
                            return $this->redirect('/');
                        }
                        else
                            $template->set("errors", array(I18n::get("La clave debe poseer por lo menos 6 caracteres")));
                    else
                        $template->set("errors", array(I18n::get("Las claves deben ser iguales")));
                }
            }
        }
        else {
            //TODO: Mensaje de error
        }
        $template->body->set("usuario", $usuario);
        $this->response->body($template);
    }

    public function action_editarUsuario() {
        
        $editar = View::factory("usuario/editarUsuario");

        $usuarioModel = new Model_Usuario();
        $tipoUsuarioModel = new Model_TipoUsuario;
        $logger = Log::instance();
        $detalleUsuario = $usuarioModel->getUsuarioById($this->request->param("id"));
        $detalleTipoUsuario = $tipoUsuarioModel->getAllTipo();
        $editar->set("detalleUsuario", $detalleUsuario->nombre);
        $editar->set("detalleCorreo", $detalleUsuario->correoElectronico);
        
        foreach ($detalleTipoUsuario as $tipo){
            $arreglo[] = array($tipo->id =>$tipo->nombre);
        }
        $logger->write();
        $editar->set("detalleTipoUsuario", $detalleTipoUsuario );

        
        $template = View::factory("base/menu");
        $template->body = $editar;
        $links = new Model_Link();

        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        $this->response->body($template);
    }

    public function action_buscar() {
        
        $editar = View::factory("usuario/BuscarUsuario");
        

        
        
        
        
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        $template->body = $editar;
        $this->response->body($template);
    }
    
    public function action_guardarUsuario(){
        
        
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        $template->body = $editar;
        $this->response->body($template);
    }

}

?>

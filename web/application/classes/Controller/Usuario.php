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

        if ($this->request->post("MAIL") != NULL) {
            if ($usuario->
                            where("MAIL", "=", $this->request->post("MAIL"))
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
                            where("ID_USUARIO", "=", $id)->
                            where("CODIGO_ACTIVACION", "=", $codigo)->
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

        $detalleUsuario = $usuarioModel->getUsuarioById($this->request->param("id"));
        $detalleTipoUsuario = $tipoUsuarioModel->getAllTipo();
        $editar->set("detalleUsuario", $detalleUsuario->NICK);
        $editar->set("detalleCorreo", $detalleUsuario->MAIL);


        $editar->set("detalleTipoUsuario", $detalleTipoUsuario);


        $template = View::factory("base/menu");
        $template->body = $editar;
        $links = new Model_Link();

        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        $this->response->body($template);
    }

    public function action_buscar() {
        
        $editar = View::factory("usuario/buscarUsuario");
        
//        $data = ORM::factory('user')->find_all();
        
//        $usuarioModel = new Model_Usuario();
//        $usuarios = $usuarioModel->getAllUsuariosAndTipos();
        
//        $query = DB::select('Usuario.*', 'TipoUsuario.nombre')
//            ->from('Usuario')
//            ->join('TipoUsuario')
//            ->on('Usuario.idTipoUsuario', '=', 'TipoUsuario.id')
//            ->execute();
        $usuarioModel = new Model_Usuario();
        $logger = Log::instance();
        $usuarios = $usuarioModel->getAllUsuariosAndTipos();
//        $detalleUsuario = $usuarioModel->getUsuarioById($this->request->param("id"));
//        $detalleTipoUsuario = $tipoUsuarioModel->getAllTipo();

        $editar->set("usuario", $usuarios->NICK);
        $editar->set("MAIL", $usuarios->MAIL);
        $editar->set("idTipoUsuario", $usuarios->ID_TIPO_USUARIO);
        
//        $editar->set("detalleCorreo", $detalleUsuario->MAIL);
        
//        foreach ($detalleTipoUsuario as $tipo){
//            $arreglo[] = array($tipo->id =>$tipo->nombre);
//        }
        $logger->write();
        $editar->set("usuarios", $usuarios);
        
//        $query = DB::select()->from('Usuario');

        
//        Table::factory()
//	->set_body_data($query)
//	->render(TRUE);
        
        
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        $template->set("usuarios", $usuarios);
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

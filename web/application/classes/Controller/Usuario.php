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
                            Session::instance()->SetUsuario($usuario);
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

        $idParam = $this->request->param("id");
        $detalleUsuario = $usuarioModel->getUsuarioById($idParam);
        $sesion = Session::instance();
        $sesion->set("id_usurio_editar", $idParam);

        $editar->set("detalleNick", $detalleUsuario->NICK);
        $editar->set("detalleNombre", $detalleUsuario->NOMBRES_USUARIO);
        $editar->set("detalleApellido", $detalleUsuario->APELLIDOS_USUARIO);
        $editar->set("detalleFono", $detalleUsuario->FONO);
        $editar->set("detallePertenencia", $detalleUsuario->PERTENENCIA);
        $editar->set("detalleCorreo", $detalleUsuario->MAIL);

        $tipoUsuarioModel = new Model_TipoUsuario;
        $detalleTipoUsuario = $tipoUsuarioModel->getAllTipo();
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

        $usuarioModel = new Model_Usuario();


        $username = $this->request->post('username');
        $tipo = $this->request->post("tipo");
        if (isset($username) && isset($tipo)) {
            $log = Log::instance();
            $resultado = $usuarioModel->buscarUsuario($username, $tipo);
            //$log->add(Log::ERROR, $resultado);
            $editar->set("usuarios", $resultado);
            $log->write();
            $tipoUsuarioModel = new Model_TipoUsuario;
            $detalleTipoUsuario = $tipoUsuarioModel->getAllTipo();
            $editar->set("detalleTipoUsuario", $detalleTipoUsuario);
        } else {
            $usuarios = $usuarioModel->getAllUsuarios();
            $editar->set("usuarios", $usuarios);

            $tipoUsuarioModel = new Model_TipoUsuario;
            $detalleTipoUsuario = $tipoUsuarioModel->getAllTipo();
            $editar->set("detalleTipoUsuario", $detalleTipoUsuario);
        }
        $template = View::factory("base/menu");
        $template->body = $editar;
        $links = new Model_Link();

        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        $this->response->body($template);
    }

    public function action_guardarUsuario() {
        $editar = View::factory("usuario/guardarUsuario");


        $usuarioModel = new Model_Usuario();
        $validar = Validation::factory($_POST);
        $validar->rule("nick", array($usuarioModel, "nickUnico"));

        if ($validar->check()) {

            $nick = $this->request->post("nick");
            $mail = $this->request->post("mail");
            $tipo = $this->request->post("tipo");
            $nombre = $this->request->post("nombre");
            $apellido = $this->request->post("apellido");
            $pertenencia = $this->request->post("pertenencia");
            $telefono = $this->request->post("fono");

            $sesion = Session::instance();
            $usuarioModel->updateUsuario($sesion->get("id_usurio_editar"), $nombre, $tipo, $mail, $apellido, $nick, $telefono, $pertenencia);
            $sesion->delete("id_usurio_editar");
        } else {
            $editar->set("error", $validar->errors());
        }
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        $template->body = $editar;
        $this->response->body($template);
    }

    public function action_listado() {
        $links = new Model_Link();
        $usuarios = new Model_Usuario();
        $template = View::factory("base/menu", array(
                    "usuario" => Session::instance()->GetUsuario(),
                    "links" => $links->ObtenerLinks(Session::instance()->GetUsuario())
                ));
        $idTipoUsuario = $this->request->query("tipo") ? $this->request->query("tipo") : "2";
        $usuarios->where("ID_TIPO_USUARIO", "=", $idTipoUsuario);
        $template->body = View::factory("usuario/listado", array(
                    "usuarios" => $usuarios->find_all()->as_array()
                ));
        $this->response->body($template);
    }

    public function action_nuevoUsuario() {
        $nuevo = View::factory("usuario/nuevoUsuario");
        $tipoUsuarioModel = new Model_TipoUsuario;
        $detalleTipoUsuario = $tipoUsuarioModel->getAllTipo();
        $nuevo->set("detalleTipoUsuario", $detalleTipoUsuario);

        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        $template->body = $nuevo;
        $this->response->body($template);
    }

    public function action_insertarUsuario() {
        $editar = View::factory("usuario/insertarUsuario");


        $usuarioModel = new Model_Usuario();
        $validar = Validation::factory($_POST);
        $validar->rule("nick", array($usuarioModel, "nickUnico"));

        if ($validar->check()) {

            $nick = $this->request->post("nick");
            $clave = $this->request->post("clave");
            $mail = $this->request->post("mail");
            $tipo = $this->request->post("tipo");
            $nombre = $this->request->post("nombre");
            $apellido = $this->request->post("apellido");
            $pertenencia = $this->request->post("pertenencia");
            $telefono = $this->request->post("telefono");

            $sesion = Session::instance();
            $usuarioModel->nuevoUsuario($nombre, $tipo, $mail, $apellido, $nick, $telefono, $pertenencia, $clave);
            $sesion->delete("id_usurio_editar");
        } else {
            $editar->set("error", $validar->errors());
        }
        $links = new Model_Link();
        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        $template->body = $editar;
        $this->response->body($template);
    }

}

?>

<?php

/**
 * Description of Session
 *
 * @author gerardo
 */
class Session extends Kohana_Session {
    //put your code here
    public function GetUsuario()
    {
        $session = Session::instance();
        if($session->get("usuario")== null)
            return false;
        else
            return $session->get("usuario");
    }
    public function SetUsuario($usuario)
    {
        $session = Session::instance();
        $session->set("usuario", $usuario);
    }
    protected function _read($id = NULL)
    {
        parent::_read($id);
    }
    protected function _regenerate() {
        parent::_regenerate();
    }
    protected function _write(){
        parent::_write();
    }
    protected function _destroy() {
        parent::_destroy();
    }
    protected function _restart() {
        parent::_restart();
    }
}

?>

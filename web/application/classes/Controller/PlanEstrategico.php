<?php


class Controller_PlanEstrategico extends Controller {
    
    public function action_Documentos ()
    {
        if(!Session::instance()->GetUsuario())
            return $this->redirect("/");
        $links = new Model_Link();
        $template = View::factory("base/menu", array(
            "usuario" => Session::instance()->GetUsuario(),
            "links" => $links->ObtenerLinks(Session::instance()->GetUsuario())
        ));
        $documentos = new Model_DocumentoPlanEstrategico();
        $template->body = View::factory("plan/documentos", array(
            "documentos" => $documentos->find_all()->as_array()
        ));
        $this->response->body($template);
    }
    
}

?>

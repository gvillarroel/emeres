<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author gerardo
 */
class View extends Kohana_View {
    
    public static function factoryIn($file, $fileTemplate, array $data=NULL)
    {
        $view = View::factory($file, $data);
        $template = View::factory($fileTemplate);
        $template->body = $view;
        return $template;
    }
    
}

?>

<?php defined('SYSPATH') or die('No direct script access.');

class Model_Usuario extends ORM {
    protected $_table_name = "Usuario";
    protected $_ignored_columns = array("clave");
    protected static $_rand_char = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";

    public function EsClave($clave)
    {
        return $this->clave == md5($clave);
    }
    
    public function CambiarClave($clave)
    {
        if($this->id != NULL)
        {
            $this->clave = md5($clave);
            $this->codigoActivacion = NULL;
            $this->save();
        }
    }

    public function RecuperarClave($mensaje)
    {
        if($this->codigoActivacion == NULL)
        {
            // Creo c�digo de activaci�n
            $this->codigoActivacion = "";
            while(strlen($this->codigoActivacion) < 19)
            { $this->codigoActivacion.=substr(Model_Usuario::$_rand_char,rand(0, 62),1); }
            // Lo guardo
            $this->save();
        }
        
        $to = $this->correoElectronico;
        $subject = I18n::get("Usuario.RecuperarClave.Asunto");
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $cabeceras .= "Organization: Emeres\r\n";
        $cabeceras .= "From: contacto@emeres.cl\r\n";
        
        mail($to, $subject, $mensaje, $cabeceras);
    }
    
    public function getUsuarioById($id){
        $this->where("id", "=", $id);
        
        return $this->find();
    }

    public function getAllUsuariosAndTipos(){
//        $this->where("id", "=", $id);
        
//        $films = DB::select()
//            ->from('Usuario')
////            ->where('title', '=', $my_title)
////            ->and_where($category_name, 'IN', DB::select()->from('categories')->execute()->as_array('id', 'name'))
//            ->where('idTipoUsuario', 'IN', DB::select()
//                                                ->from('TipoUsuario')
//                                                ->execute()
//                                                ->as_array('id', 'name'))
//            ->execute();
        
//        $films = ORM::factory('Usuario')
//            ->join('films_categories')->on('films_categories.film_id', '=', 'film.id')
//            ->join(array('categories', 'category'))->on('category.id', '=', 'films_categories.category_id')
//            ->where('film.title', '=', $film_title)
//            ->where('category.name', '=', $category_name)
//            ->find_all();   
        
//        $query = DB::select('authors.name', 'posts.content')
//        $query = DB::select('Usuario.*', 'TipoUsuario.nombre')
//                ->from('Usuario')
//                ->join('TipoUsuario')
//                ->on('Usuario.idTipoUsuario', '=', 'TipoUsuario.id')
////                ->where('authors.name', '=', 'smith')
//                ->execute();

        
        
        
        
//        return $query->as_array();
        return $this->find();
    }    
    
}

?>

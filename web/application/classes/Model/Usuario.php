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
            // Creo código de activación
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
    
}

?>

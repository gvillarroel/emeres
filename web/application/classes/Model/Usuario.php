<?php

defined('SYSPATH') or die('No direct script access.');

class Model_Usuario extends ORM {

    protected $_table_name = "USUARIO";
    protected $_primary_key = "ID_USUARIO";
    protected $_belongs_to = array('TIPO' => array(
            'model' => 'TipoUsuario',
            'foreign_key' => 'ID_TIPO_USUARIO'
            ));
    protected static $_rand_char = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";

    public function EsClave($clave) {
        return $this->CLAVE == md5($clave);
    }

    public function CambiarClave($clave) {
        if ($this->ID_USUARIO != NULL) {
            $this->CLAVE = md5($clave);
            $this->CODIGO_ACTIVACION = NULL;
            $this->save();
        }
    }

    public function RecuperarClave($mensaje) {
        if ($this->CODIGO_ACTIVACION == NULL) {
            // Creo c�digo de activaci�n
            $this->CODIGO_ACTIVACION = "";
            while (strlen($this->CODIGO_ACTIVACION) < 19) {
                $this->CODIGO_ACTIVACION.=substr(Model_Usuario::$_rand_char, rand(0, 62), 1);
            }
            // Lo guardo
            $this->save();
        }

        $to = $this->MAIL;
        $subject = I18n::get("Usuario.RecuperarClave.Asunto");
        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $cabeceras .= "Organization: Emeres\r\n";
        $cabeceras .= "From: contacto@emeres.cl\r\n";

        mail($to, $subject, $mensaje, $cabeceras);
    }

    public function getUsuarioById($id) {
        $this->where("ID_USUARIO", "=", $id);

        return $this->find();
    }

    public function getAllUsuarios() {
//        return $this->find();
        $query = DB::select()->from("USUARIO");
        return $query->execute();
    }

    public function updateUsuario($id, $nombre, $tipo, $mail, $apellido, $nick, $telefono, $pertenencia) {


        DB::update('USUARIO')
                ->set(array("nombres_usuario" => $nombre, "id_tipo_usuario" => $tipo, "mail" => $mail, "apellidos_usuario" => $apellido, "nick" => $nick, "fono" => $telefono, "pertenencia" => $pertenencia))
                ->where('id_usuario', '=', $id)
                ->execute();
    }

    public function nickUnico($nick) {
        $this->where('nick', '=', $nick);

        $var = $this->find_all();
        $cant = count($var->as_array());
        if ($cant >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function nuevoUsuario($nombre, $tipo, $mail, $apellido, $nick, $telefono, $pertenencia,$clave){
    DB::insert("USUARIO", array("id_tipo_usuario", "nombres_usuario", "mail", "apellidos_usuario", "nick", "fono", "pertenencia", "clave"))
            ->values(array( $tipo, $nombre, $mail, $apellido, $nick, $telefono, $pertenencia, md5($clave)))
            ->execute();
    }
    
    public function buscarUsuario($name, $tipo){
        
        $query = DB::select()->from("USUARIO")->where("NOMBRES_USUARIO", "=", $name)->and_where("ID_TIPO_USUARIO", "=", $tipo);
        
        return $query->execute();
        
    }

}

?>

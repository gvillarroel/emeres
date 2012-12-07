<?php


class Model_ArrayFilter extends Model {
    private $key;
    private $value;
    function Model_ArrayFilter($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
    public function filter($arr){
        if(is_array($arr))
            return ($arr[$this->key] == $this->value);
        else
        {            
            $ref = new ReflectionClass($arr);
            return ($arr->get("idLinkPadre") != $this->value);
        }
    }
};

?>

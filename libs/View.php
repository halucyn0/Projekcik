<?php
abstract class View{
    public function loadModel($name, $path='models/') {
        $path=$path.$name.'Model.php';
        $name=$name.'Model';
        try {
            if(is_file($path)) {
                require $path;
                $ob=new $name();
            } else {
                throw new Exception('Can not open model '.$name.' in: '.$path);
            }
        }
        catch(Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return $ob;
    }

    public function render($name, $path='templates/') {
        $path=$path.$name.'.php';
        try {
            if(is_file($path)) {
                require $path;
            } else {
                throw new Exception('Can not open template '.$name.' in: '.$path);
            }
        }
        catch(Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function set($name, $value) {
        $this->$name=$value;
    }

    public function get($name) {
        return $this->$name;
    }
}
?>
<?php
if(!function_exists('add_action')){
    echo "Vui lòng quay lại!"; exit;
}
class Atopiclair{
    protected static $instance;
    public static function get_instance(){
        if(self::$instance === null){
            self::$instance = new Atopiclair();
        }
        return self::$instance;
    }
    public static function run(){
        AtopiclairDoctor::run();
    }
     public static function plugin_activation(){
        
    }
    
    public static function plugin_deactivation(){
        
    }
}
<?php
require_once RAIZ.'Config.php';
require_once RAIZ.'resources/controlador/ControladorGenerico.php';

abstract class ControladorAccion extends ControladorGenerico {
    
    //variables globales opcioneles para las opciones
   // protected static $todos="todos";
   // protected static $admin="admin";
    
   //  protected $configuracion;
   //  protected $permisos; //array que almacena los permisos de los usuarios para cada pagina
     //protected $redireccion; //pagina para redireccionar;
     
     abstract function setPermisos(); //ingresar los permisos de loa pagina
     abstract function ejecutar(); //funcion que ejecutar las acciones necesarias
     abstract function getRedireccion(); //funcion que obtiene la pagina para redireccion
     
     function __construct() {
       //  $this->configuracion=Config::getInstance();
       //  $this->setPermisos();
         parent::__construct();
     }
     

     
    public function renderizar()
    {
              
        if($this->verificarSession())
        {
            $this->ejecutar();
            //$direccion = 'Location:';
            //$direccion = $direccion . $this->configuracion->sitename . $this->getRedireccion();
            //header($direccion);
        }
        else
        {
             //echo 
             $direccion='Location:';
             $direccion=$direccion.$this->configuracion->sitename."index.html";
             //$direccion=  $this->configuracion->$sitename;
             header($direccion);
             //echo "redireccionando ...";
        }                
        
    }    
    
   public function setVarSession($clave,$obj)
   {
       if (session_status() == PHP_SESSION_NONE) 
       {
            session_start();
       }
       $_SESSION[$clave]=$obj;
       return true;
   }
   
   public function getVarSession($clave)
   {
       if (session_status() == PHP_SESSION_NONE) 
       {
            session_start();
       }
       if(isset($_SESSION[$clave]))
       {
           return $_SESSION[$clave];
       }
       else
       {
           return null;
       }
       
   }

}

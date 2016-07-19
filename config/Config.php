<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author Carlos
 */
class Config 
{
        private static $instancia;
        
    	public $host = 'localhost';
	public $user = 'root';
	public $password = '1234';
	public $db = 'virtualmalldb';
        private $siteName='http://localhost/';
        private $subSite='virtualmall/';
        
        public function getSitePath()
        {
           return $this->siteName.$this->subSite; 
        }
        
        public function getSubSite()
        {
            return $this->subSite;
        }
        
        public static function getInstance()
        {
           if (  !self::$instancia instanceof self)
           {
              self::$instancia = new self;
           }
           return self::$instancia;
        }
}


//definir constantes para configurar el sitio con todos los rutas relativas y absolutas
   $config=  Config::getInstance();
   $subDir=$config->getSubSite();
   $path=$config->getSitePath();
   if(strlen($subDir)==0)
   {
       define('RAIZ',$_SERVER['DOCUMENT_ROOT']."/");
   }
   else 
   {
       define('RAIZ',$_SERVER['DOCUMENT_ROOT']."/$subDir/");
   }
   
   //define('RAIZ',$_SERVER['DOCUMENT_ROOT']."/$config->siteName/");
   define('CONTROLADOR_ACCION',RAIZ."resources/controlador/ControladorAccion.php"); 
   define('CONTROLADOR_SET',RAIZ."resources/controlador/ControladorSet.php"); 
   
   define('CONEXION',RAIZ."resources/modelo/conexion/Conexion.php"); 
   define('COLUMNSTABLE',RAIZ."resources/modelo/conexion/ColumnsTable.php"); 
   define('ESTRUCTURA',RAIZ."resources/modelo/conexion/Estructura.php"); 
   define('COLUMNA',RAIZ."resources/modelo/conexion/Columna.php"); 
   define('ABSTRACTDB',RAIZ."resources/modelo/conexion/AbstractDb.php"); 
   
   define('SERVICIOS',RAIZ."resources/modelo/servicios/"); 
   define('ENTITY',RAIZ."resources/modelo/vo/"); 
   define('FACADE',RAIZ."resources/modelo/facade/");
   define('IMAGENES',$path."images/pages/"); 
   
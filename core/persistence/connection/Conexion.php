<?php

//require_once '../../VariablesGlobales.php';
require_once RAIZ.'Config.php';

class Conexion {
   private static $instancia;
   
   private $hostName;
   private $dataBase;
   private $userName;
   private $password;
   private $conexion; //variable para mantener una conexion
   
   public static function getInstance()
   {
      if (  !self::$instancia instanceof self)
      {
         self::$instancia = new self;
      }
      return self::$instancia;
   }
   
   function __construct() 
   {
       $configuracion=  Config::getInstance();
       $this->hostName = $configuracion->host;
       $this->dataBase = $configuracion->db;
       $this->userName = $configuracion->user;
       $this->password = $configuracion->password;
       $this->conectar();
       
   }
   
   public function conectar()
   {
       $this->conexion=mysql_pconnect($this->hostName,  $this->userName,  $this->password) or trigger_error(mysql_error(),E_USER_ERROR); 
       //$this->seleccionarDB();
       mysql_select_db($this->dataBase,  $this->conexion);        
      // echo "conexion ejecutada";
   }
   
   public function ejecutar($query)
   {
       $Result1 = mysql_query($query,$this->conexion) or die(mysql_error()); 
      // echo "-->ejecutar";
       return $Result1;
       
   }
   
   public function consulta($query)
   {
       $consulta=mysql_query($query,$this->conexion) or die(mysql_error());
       $fila=mysql_fetch_array($consulta);
      // echo "-->consultar";
       return $fila;
   }
   
   public function getConexion()
   {
       return $this->conexion;      
   }
   
}

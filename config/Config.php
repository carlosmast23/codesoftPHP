<?php

/**
 * Clase que contiene la configuracion inicial de tu aplicativo
 *
 * @author Carlos
 */
class Config {

    private static $instancia;

    /**
     * Nombre del host o direccion ip donde va a correr
     * la aplicacion php, si es local es: localhost
     * @var String  
     */
    public $host = 'localhost';

    /**
     * Nombre del usuario de la base de datos
     * @var String
     */
    public $user = 'root';

    /**
     * Clave de la base de datos
     * @var String
     */
    public $password = '1234';

    /**
     * Nombre de la base de datos que se va a utilizar
     * @var String
     */
    public $db = 'virtualmalldb';

    /**
     * Nombre del sitio web que contiene el host
     * Ejemlo:
     * http://localhost/ -> cuando ejecutas de forma local
     * http://hostinazo/ -> cuando tienes creado un sitio en algun host gratuito         * 
     * @var String
     */
    private $siteName = 'http://localhost/';

    /**
     * Nombre del directorio principal que contiene tu sitio web
     * Ejemplo:
     * virtualmall/
     * deberesfaciles/
     * codesoft/
     * @var String 
     */
    private $subSite = 'virtualmall/';

    /**
     * Retorna la direccion completa del sitio web
     * @return String
     */
    public function getSitePath() {
        return $this->siteName . $this->subSite;
    }

    /**
     * Retorna sola la direccion principla del sitio web
     * @return type
     */
    public function getSubSite() {
        return $this->subSite;
    }

    /**
     * Patron Singleton que me permite tener una sola instancia
     * de las configuraciones del sitio para acceder en cualquier
     * momento desde la aplicacion
     * @return type
     */
    public static function getInstance() {
        if (!self::$instancia instanceof self) {
            self::$instancia = new self;
        }
        return self::$instancia;
    }

}

///////////////////////////////////////////////////////////////////////
//// PROCESO PARA ESTABLECER EL PATH RELATIVO Y ABSOLUTO DEL SITIO WEB
///////////////////////////////////////////////////////////////////////

$config = Config::getInstance();
$subDir = $config->getSubSite();
$path = $config->getSitePath();

if (strlen($subDir) == 0) {
    define('RAIZ', $_SERVER['DOCUMENT_ROOT'] . "/");
} else {
    define('RAIZ', $_SERVER['DOCUMENT_ROOT'] . "/$subDir/");
}

/////////////////////////////////////////////////////////////////////////////////////////
// DECLARACION DE LAS VARIABLES NECESARIAS PARA DEFINIR RUTAS REALTIVAS Y ABSOLUTAS
// PARA ACCEDER POR EL USUARIO.
//////////////////////////////////////////////////////////////////////////////////////////

define('CONTROLADOR_ACCION', RAIZ . "resources/controlador/ControladorAccion.php");
define('CONTROLADOR_SET', RAIZ . "resources/controlador/ControladorSet.php");
define('CONEXION', RAIZ . "resources/modelo/conexion/Conexion.php");
define('COLUMNSTABLE', RAIZ . "resources/modelo/conexion/ColumnsTable.php");
define('ESTRUCTURA', RAIZ . "resources/modelo/conexion/Estructura.php");
define('COLUMNA', RAIZ . "resources/modelo/conexion/Columna.php");
define('ABSTRACTDB', RAIZ . "resources/modelo/conexion/AbstractDb.php");
define('SERVICIOS', RAIZ . "resources/modelo/servicios/");
define('ENTITY', RAIZ . "resources/modelo/vo/");
define('FACADE', RAIZ . "resources/modelo/facade/");
define('IMAGENES', $path . "images/pages/");

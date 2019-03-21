<?php
//require_once("../4_Utils/Utils.php");
//require_once("4_Utils/Utils.php");
define('__ROOT__', dirname(dirname(__FILE__))); 
require_once(__ROOT__.'/4_Utils/Utils.php'); 

class CapaDatos{
	public static $_db;
	public $_datos;
	
    public function __construct(){
		//si ya esta abierta la conexion no abrirla nuevamente
		if(!self::$_db ) {
				self::$_db=new mysqli("localhost", "pensemos_gestionelo", "psi2018*", "pensemos_gestionelo");
				self::$_db->query("SET NAMES 'utf8'");
			}  
		
    }
	
    public function execute_array($sqlGroup, $sqlName, $arrFiltros, $modo)
    {
		if ( ! session_id() ) session_start();
		
    	$_resultado=array
    		(
    			"estado" => -1,
    			"mensaje" => "(sin mensaje4)",
    			"detalle" => "",
    			"info" => "",
    			"datos" => array()
    		);


        		//Leer archivo donde se encuentran los SQL a ejecutar
        		$strSQL = "";
        
                $xml= simplexml_load_file(__DIR__."/".$sqlGroup.".xml");
                
                if ($xml === FALSE)
                {
                    $_resultado["mensaje"] = "Error cargando xml";
                    return $_resultado;
                };
                

$sqls = $xml->xpath("//SQL[@id='".$sqlName."']"); 
$strSQL = "".$sqls[0]; 

        		
        
                        if ($strSQL =="" or $strSQL == null)
                        {
                          utils_debugfile( "SQL No encontrado", $sqlGroup."-->".$sqlName);  
                        };
                       
                        //Reemplazar variables globales del usuario
                        if (isset($_SESSION['Email']))
                        {
                            $strSQL = str_replace ( '@@Email' , $_SESSION['Email'], $strSQL );
                            $strSQL = str_replace ( '@@IdUserNet' , $_SESSION['IdUserNet'], $strSQL );
                            $strSQL = str_replace ( '@@IdEmpresa' , $_SESSION['IdEmpresa'], $strSQL );
                            $strSQL = str_replace ( '@@IdUsuario' , $_SESSION['IdUsuario'], $strSQL );
                            $strSQL = str_replace ( '@@Alias' , $_SESSION['Alias'], $strSQL );
                            $strSQL = str_replace ( '@@NivelAdmin' , $_SESSION['NivelAdmin'], $strSQL );
                        }                
                        //Reemplazar parÃ¡metros
        		foreach ($arrFiltros as $variable)  //=> $valor
        		{
                                utils_debugfile( "CapaDatosId", $variable->Id);
                                utils_debugfile( "CapaDatosValue", $variable->Value);
        			//$strSQL = str_replace ( '@'.$variable , $valor_formateado, $strSQL );
                                $strSQL = str_replace ( '@'.$variable->Id , $variable->Value, $strSQL );
        		};
                        
                        //log ultimo sql ejecutado
                        utils_debugfile( "SQL traducido->", $strSQL);
        
        
        
        		//Ejecutar SQL
  $_resultado["mensaje"] =   $strSQL;

  if (true)
   {     
      		$consulta= self::$_db->query($strSQL);   
          
        		if (!$consulta)
        		{
        			 $_resultado["estado"] = 0;
        			 $_resultado["mensaje"] = "Error en la ejecuciÃ³n de la consulta ";
        			 $_resultado["detalle"] =  $strSQL;
        			 $_resultado["info"] =  "";
        			 $_resultado["datos"][] =  array();
        
        		}
        		else
        		{
        			 $_resultado["estado"] = 1;
        			 $_resultado["mensaje"] = "Ok";
        			 $_resultado["detalle"] =  "";
        			 $_resultado["info"] =  "";
                                 if ($modo == "Consulta")
                                 {
                                    while($filas=$consulta->fetch_assoc())
                					{
                					 $_resultado["datos"][] = $filas;
                					}
                                 }
        		}
        	
   }    		
    return $_resultado; //retornar resultado
	} // funci¨®n execute_array
 } // capa de datos clase
?>
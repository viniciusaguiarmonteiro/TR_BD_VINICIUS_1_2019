<?php
/** @package    Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * LogLoginMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the LogLoginDAO to the log_login datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Coral::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class LogLoginMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["IdLogin"] = new FieldMap("IdLogin","log_login","Id_Login",true,FM_TYPE_INT,11,null,true);
			self::$FM["DataInicioLogin"] = new FieldMap("DataInicioLogin","log_login","Data_Inicio_Login",false,FM_TYPE_DATETIME,null,null,false);
			self::$FM["LocalLogin"] = new FieldMap("LocalLogin","log_login","Local_Login",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["PlataformaLogin"] = new FieldMap("PlataformaLogin","log_login","Plataforma_Login",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["TimeZoneLogin"] = new FieldMap("TimeZoneLogin","log_login","Time_Zone_Login",false,FM_TYPE_TIMESTAMP,false);
			self::$FM["DataFimLogin"] = new FieldMap("DataFimLogin","log_login","Data_Fim_Login",false,FM_TYPE_DATETIME,null,null,false);
			self::$FM["usuarioCpfUsuario"] = new FieldMap("UsuarioCpfUsuario","log_login","usuario_CPF_Usuario",true,FM_TYPE_INT,11,null,false);
			self::$FM["BrowserLogin"] = new FieldMap("BrowserLogin","log_login","Browser_Login",false,FM_TYPE_VARCHAR,45,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
			self::$KM["fk_LOG_LOGIN_USUARIO1"] = new KeyMap("fk_LOG_LOGIN_USUARIO1", "usuarioCpfUsuario", "Usuario", "CpfUsuario", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>
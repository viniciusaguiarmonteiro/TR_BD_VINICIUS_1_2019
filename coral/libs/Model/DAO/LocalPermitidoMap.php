<?php
/** @package    Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * LocalPermitidoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the LocalPermitidoDAO to the local_permitido datastore.
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
class LocalPermitidoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdLocal"] = new FieldMap("IdLocal","local_permitido","Id_Local",true,FM_TYPE_INT,11,null,false);
			self::$FM["AdicionadoEmLocal"] = new FieldMap("AdicionadoEmLocal","local_permitido","Adicionado_Em_Local",false,FM_TYPE_DATETIME,null,null,false);
			self::$FM["Latitude1Local"] = new FieldMap("Latitude1Local","local_permitido","Latitude1_Local",false,FM_TYPE_INT,45,null,false);
			self::$FM["Longitude1Local"] = new FieldMap("Longitude1Local","local_permitido","Longitude1_Local",false,FM_TYPE_INT,45,null,false);
			self::$FM["Latitude2Local"] = new FieldMap("Latitude2Local","local_permitido","Latitude2_Local",false,FM_TYPE_INT,45,null,false);
			self::$FM["Longitude2Local"] = new FieldMap("Longitude2Local","local_permitido","Longitude2_Local",false,FM_TYPE_INT,45,null,false);
			self::$FM["NomeLocal"] = new FieldMap("NomeLocal","local_permitido","Nome_Local",false,FM_TYPE_VARCHAR,100,null,false);
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
			self::$KM["fk_RELATO_LOCAL_PERMITIDO1"] = new KeyMap("fk_RELATO_LOCAL_PERMITIDO1", "IdLocal", "Relato", "LocalPermitidoIdLocal", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>
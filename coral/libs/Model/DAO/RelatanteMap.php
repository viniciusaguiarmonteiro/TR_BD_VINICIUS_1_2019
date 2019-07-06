<?php
/** @package    Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * RelatanteMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the RelatanteDAO to the relatante datastore.
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
class RelatanteMap implements IDaoMap, IDaoMap2
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
			self::$FM["CadastradoEmRelatante"] = new FieldMap("CadastradoEmRelatante","relatante","Cadastrado_Em_Relatante",false,FM_TYPE_DATETIME,null,null,false);
			self::$FM["UsuarioCpfUsuario"] = new FieldMap("UsuarioCpfUsuario","relatante","usuario_CPF_Usuario",true,FM_TYPE_INT,11,null,false);
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
			self::$KM["fk_usuario_relato_relatante1"] = new KeyMap("fk_usuario_relato_relatante1", "UsuarioCpfUsuario", "UsuarioRelato", "RelatanteUsuarioCpfUsuario", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_relatante_usuario1"] = new KeyMap("fk_relatante_usuario1", "UsuarioCpfUsuario", "Usuario", "CpfUsuario", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>
<?php
/** @package    Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * UsuarioRelatoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the UsuarioRelatoDAO to the usuario_relato datastore.
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
class UsuarioRelatoMap implements IDaoMap, IDaoMap2
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
			self::$FM["DataUsuarioRelato"] = new FieldMap("DataUsuarioRelato","usuario_relato","Data_Usuario_Relato",true,FM_TYPE_DATETIME,null,null,false);
			self::$FM["RelatoIdRelato"] = new FieldMap("RelatoIdRelato","usuario_relato","RELATO_Id_Relato",true,FM_TYPE_INT,11,null,false);
			self::$FM["RelatanteUsuarioCpfUsuario"] = new FieldMap("RelatanteUsuarioCpfUsuario","usuario_relato","relatante_usuario_CPF_Usuario",true,FM_TYPE_INT,11,null,false);
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
			self::$KM["fk_USUARIO_RELATO_RELATO1"] = new KeyMap("fk_USUARIO_RELATO_RELATO1", "RelatoIdRelato", "Relato", "IdRelato", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_usuario_relato_relatante1"] = new KeyMap("fk_usuario_relato_relatante1", "RelatanteUsuarioCpfUsuario", "Relatante", "UsuarioCpfUsuario", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>
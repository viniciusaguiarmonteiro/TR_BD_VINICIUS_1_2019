<?php
/** @package    Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * TipoUsuarioMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the TipoUsuarioDAO to the tipo_usuario datastore.
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
class TipoUsuarioMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdTipoUsuario"] = new FieldMap("IdTipoUsuario","tipo_usuario","Id_Tipo_Usuario",true,FM_TYPE_INT,11,null,false);
			self::$FM["TituloTipoUsuario"] = new FieldMap("TituloTipoUsuario","tipo_usuario","Titulo_Tipo_Usuario",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["DescricaoTipoUsuario"] = new FieldMap("DescricaoTipoUsuario","tipo_usuario","Descricao_Tipo_Usuario",false,FM_TYPE_VARCHAR,10000,null,false);
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
			self::$KM["fk_USUARIO_TIPO_USUARIO"] = new KeyMap("fk_USUARIO_TIPO_USUARIO", "IdTipoUsuario", "Usuario", "TipoUsuarioIdTipoUsuario", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>
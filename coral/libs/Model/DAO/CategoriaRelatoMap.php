<?php
/** @package    Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * CategoriaRelatoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the CategoriaRelatoDAO to the categoria_relato datastore.
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
class CategoriaRelatoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdCategoria"] = new FieldMap("IdCategoria","categoria_relato","Id_Categoria",true,FM_TYPE_INT,11,null,false);
			self::$FM["AdiconadoEmCategoria"] = new FieldMap("AdiconadoEmCategoria","categoria_relato","Adiconado_Em_Categoria",false,FM_TYPE_DATETIME,null,null,false);
			self::$FM["IconeCategoria"] = new FieldMap("IconeCategoria","categoria_relato","Icone_Categoria",false,FM_TYPE_LONGBLOB,null,null,false);
			self::$FM["OrdemCategoria"] = new FieldMap("OrdemCategoria","categoria_relato","Ordem_Categoria",false,FM_TYPE_INT,11,null,false);
			self::$FM["NomeCategoria"] = new FieldMap("NomeCategoria","categoria_relato","Nome_Categoria",false,FM_TYPE_VARCHAR,100,null,false);
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
			self::$KM["fk_RELATO_CATEGORIA_RELATO1"] = new KeyMap("fk_RELATO_CATEGORIA_RELATO1", "IdCategoria", "Relato", "CategoriaRelatoIdCategoria", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>
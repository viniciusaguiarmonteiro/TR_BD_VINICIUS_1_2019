<?php
/** @package    Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * DiretoriaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the DiretoriaDAO to the diretoria datastore.
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
class DiretoriaMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdDiretoria"] = new FieldMap("IdDiretoria","diretoria","Id_Diretoria",true,FM_TYPE_INT,11,null,true);
			self::$FM["NomeDiretoria"] = new FieldMap("NomeDiretoria","diretoria","Nome_Diretoria",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["DescricaoDiretoria"] = new FieldMap("DescricaoDiretoria","diretoria","Descricao_Diretoria",false,FM_TYPE_VARCHAR,10000,null,false);
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
			self::$KM["fk_FUNCIONARIO_DIRETORIA1"] = new KeyMap("fk_FUNCIONARIO_DIRETORIA1", "IdDiretoria", "Funcionario", "DiretoriaIdDiretoria", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_SERVICO_DIRETORIA1"] = new KeyMap("fk_SERVICO_DIRETORIA1", "IdDiretoria", "Servico", "DiretoriaIdDiretoria", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>
<?php
/** @package    Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ServicoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ServicoDAO to the servico datastore.
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
class ServicoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdServico"] = new FieldMap("IdServico","servico","Id_Servico",true,FM_TYPE_INT,11,null,true);
			self::$FM["TituloServico"] = new FieldMap("TituloServico","servico","Titulo_Servico",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["DescricaoServico"] = new FieldMap("DescricaoServico","servico","Descricao_Servico",false,FM_TYPE_VARCHAR,10000,null,false);
			self::$FM["DiretoriaIdDiretoria"] = new FieldMap("DiretoriaIdDiretoria","servico","DIRETORIA_Id_Diretoria",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["fk_SERVICO_DIRETORIA1"] = new KeyMap("fk_SERVICO_DIRETORIA1", "DiretoriaIdDiretoria", "Diretoria", "IdDiretoria", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>
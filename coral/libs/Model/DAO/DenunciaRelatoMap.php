<?php
/** @package    Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * DenunciaRelatoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the DenunciaRelatoDAO to the denuncia_relato datastore.
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
class DenunciaRelatoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdDenunciaRelato"] = new FieldMap("IdDenunciaRelato","denuncia_relato","Id_Denuncia_Relato",true,FM_TYPE_INT,11,null,false);
			self::$FM["DataDenunciaRelato"] = new FieldMap("DataDenunciaRelato","denuncia_relato","Data_Denuncia_Relato",true,FM_TYPE_DATETIME,null,null,false);
			self::$FM["TotalVisualizacaoDenunciaRelato"] = new FieldMap("TotalVisualizacaoDenunciaRelato","denuncia_relato","Total_Visualizacao_Denuncia_Relato",false,FM_TYPE_INT,11,null,false);
			self::$FM["TotalConfirmacaoExistenciaRelato"] = new FieldMap("TotalConfirmacaoExistenciaRelato","denuncia_relato","Total_Confirmacao_Existencia_Relato",false,FM_TYPE_INT,11,null,false);
			self::$FM["DescricaoDenunciaRelato"] = new FieldMap("DescricaoDenunciaRelato","denuncia_relato","Descricao_Denuncia_Relato",false,FM_TYPE_VARCHAR,10000,null,false);
			self::$FM["TituloDenunciaRelato"] = new FieldMap("TituloDenunciaRelato","denuncia_relato","Titulo_Denuncia_Relato",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["RelatoIdRelato"] = new FieldMap("RelatoIdRelato","denuncia_relato","RELATO_Id_Relato",true,FM_TYPE_INT,11,null,false);
			self::$FM["UsuarioCpfUsuario"] = new FieldMap("UsuarioCpfUsuario","denuncia_relato","usuario_CPF_Usuario",true,FM_TYPE_INT,11,null,false);
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
			self::$KM["fk_DENUNCIA_RELATO_RELATO1"] = new KeyMap("fk_DENUNCIA_RELATO_RELATO1", "RelatoIdRelato", "Relato", "IdRelato", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_denuncia_relato_usuario1"] = new KeyMap("fk_denuncia_relato_usuario1", "UsuarioCpfUsuario", "Usuario", "CpfUsuario", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>
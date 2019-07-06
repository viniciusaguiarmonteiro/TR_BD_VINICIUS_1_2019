<?php
/** @package    Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * RelatoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the RelatoDAO to the relato datastore.
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
class RelatoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdRelato"] = new FieldMap("IdRelato","relato","Id_Relato",true,FM_TYPE_INT,11,null,false);
			self::$FM["DescricaoRelato"] = new FieldMap("DescricaoRelato","relato","Descricao_Relato",false,FM_TYPE_VARCHAR,10000,null,false);
			self::$FM["StatusRelato"] = new FieldMap("StatusRelato","relato","Status_Relato",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["LatitudeRelato"] = new FieldMap("LatitudeRelato","relato","Latitude_Relato",false,FM_TYPE_INT,45,null,false);
			self::$FM["LongitudeRelato"] = new FieldMap("LongitudeRelato","relato","Longitude_Relato",false,FM_TYPE_INT,45,null,false);
			self::$FM["TituloRelato"] = new FieldMap("TituloRelato","relato","Titulo_Relato",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["ImagemRelato"] = new FieldMap("ImagemRelato","relato","Imagem_Relato",false,FM_TYPE_LONGBLOB,null,null,false);
			self::$FM["AdicionadoEmRelato"] = new FieldMap("AdicionadoEmRelato","relato","Adicionado_Em_Relato",false,FM_TYPE_DATETIME,null,null,false);
			self::$FM["PublicadoEmRelato"] = new FieldMap("PublicadoEmRelato","relato","Publicado_Em_Relato",false,FM_TYPE_DATETIME,null,null,false);
			self::$FM["Logradouro_relato"] = new FieldMap("Logradouro_relato","relato","Logradouro__Relato",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["ComplementoRelato"] = new FieldMap("ComplementoRelato","relato","Complemento_Relato",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["NumeroRelato"] = new FieldMap("NumeroRelato","relato","Numero_Relato",false,FM_TYPE_INT,11,null,false);
			self::$FM["EstadoRelato"] = new FieldMap("EstadoRelato","relato","Estado_Relato",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["BairroRelato"] = new FieldMap("BairroRelato","relato","Bairro_Relato",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["CidadeRelato"] = new FieldMap("CidadeRelato","relato","Cidade_Relato",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Cep_relato"] = new FieldMap("Cep_relato","relato","CEP__Relato",false,FM_TYPE_INT,11,null,false);
			self::$FM["CategoriaRelatoIdCategoria"] = new FieldMap("CategoriaRelatoIdCategoria","relato","CATEGORIA_RELATO_Id_Categoria",false,FM_TYPE_INT,11,null,false);
			self::$FM["LocalPermitidoIdLocal"] = new FieldMap("LocalPermitidoIdLocal","relato","LOCAL_PERMITIDO_Id_Local",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["fk_DENUNCIA_RELATO_RELATO1"] = new KeyMap("fk_DENUNCIA_RELATO_RELATO1", "IdRelato", "DenunciaRelato", "RelatoIdRelato", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_USUARIO_RELATO_RELATO1"] = new KeyMap("fk_USUARIO_RELATO_RELATO1", "IdRelato", "UsuarioRelato", "RelatoIdRelato", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_RELATO_CATEGORIA_RELATO1"] = new KeyMap("fk_RELATO_CATEGORIA_RELATO1", "CategoriaRelatoIdCategoria", "CategoriaRelato", "IdCategoria", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_RELATO_LOCAL_PERMITIDO1"] = new KeyMap("fk_RELATO_LOCAL_PERMITIDO1", "LocalPermitidoIdLocal", "LocalPermitido", "IdLocal", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>
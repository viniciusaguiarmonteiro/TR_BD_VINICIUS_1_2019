<?php
/** @package    Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * UsuarioMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the UsuarioDAO to the usuario datastore.
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
class UsuarioMap implements IDaoMap, IDaoMap2
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
			self::$FM["CpfUsuario"] = new FieldMap("CpfUsuario","usuario","CPF_Usuario",true,FM_TYPE_INT,11,null,false);
			self::$FM["EmailUsuario"] = new FieldMap("EmailUsuario","usuario","Email_Usuario",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["FotoUsuario"] = new FieldMap("FotoUsuario","usuario","Foto_Usuario",false,FM_TYPE_LONGBLOB,null,null,false);
			self::$FM["SenhaUsuario"] = new FieldMap("SenhaUsuario","usuario","Senha_Usuario",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["NomeUsuario"] = new FieldMap("NomeUsuario","usuario","Nome_Usuario",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["TipoUsuarioIdTipoUsuario"] = new FieldMap("TipoUsuarioIdTipoUsuario","usuario","TIPO_USUARIO_Id_Tipo_Usuario",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["fk_denuncia_relato_usuario1"] = new KeyMap("fk_denuncia_relato_usuario1", "CpfUsuario", "DenunciaRelato", "UsuarioCpfUsuario", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_funcionario_usuario1"] = new KeyMap("fk_funcionario_usuario1", "CpfUsuario", "Funcionario", "UsuarioCpfUsuario", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_LOG_LOGIN_USUARIO1"] = new KeyMap("fk_LOG_LOGIN_USUARIO1", "CpfUsuario", "LogLogin", "UsuarioCpfUsuario", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_relatante_usuario1"] = new KeyMap("fk_relatante_usuario1", "CpfUsuario", "Relatante", "UsuarioCpfUsuario", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_USUARIO_TIPO_USUARIO"] = new KeyMap("fk_USUARIO_TIPO_USUARIO", "TipoUsuarioIdTipoUsuario", "TipoUsuario", "IdTipoUsuario", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>
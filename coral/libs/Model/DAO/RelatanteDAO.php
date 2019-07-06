<?php
/** @package Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("RelatanteMap.php");

/**
 * RelatanteDAO provides object-oriented access to the relatante table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Coral::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class RelatanteDAO extends Phreezable
{
	/** @var date */
	public $CadastradoEmRelatante;

	/** @var int */
	public $UsuarioCpfUsuario;


	/**
	 * Returns a dataset of UsuarioRelato objects with matching RelatanteUsuarioCpfUsuario
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetUsuarioCpfUsuarioUsuarioRelatos($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_usuario_relato_relatante1", $criteria);
	}

	/**
	 * Returns the foreign object based on the value of UsuarioCpfUsuario
	 * @return Usuario
	 */
	public function GetCpfUsuarioUsuario()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_relatante_usuario1");
	}


}
?>
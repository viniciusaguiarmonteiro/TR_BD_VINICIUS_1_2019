<?php
/** @package    Coral::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the DenunciaRelato object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Coral::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class DenunciaRelatoReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `denuncia_relato` table
	public $CustomFieldExample;

	public $IdDenunciaRelato;
	public $DataDenunciaRelato;
	public $TotalVisualizacaoDenunciaRelato;
	public $TotalConfirmacaoExistenciaRelato;
	public $DescricaoDenunciaRelato;
	public $TituloDenunciaRelato;
	public $RelatoIdRelato;
	public $UsuarioCpfUsuario;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`denuncia_relato`.`Id_Denuncia_Relato` as IdDenunciaRelato
			,`denuncia_relato`.`Data_Denuncia_Relato` as DataDenunciaRelato
			,`denuncia_relato`.`Total_Visualizacao_Denuncia_Relato` as TotalVisualizacaoDenunciaRelato
			,`denuncia_relato`.`Total_Confirmacao_Existencia_Relato` as TotalConfirmacaoExistenciaRelato
			,`denuncia_relato`.`Descricao_Denuncia_Relato` as DescricaoDenunciaRelato
			,`denuncia_relato`.`Titulo_Denuncia_Relato` as TituloDenunciaRelato
			,`denuncia_relato`.`RELATO_Id_Relato` as RelatoIdRelato
			,`denuncia_relato`.`usuario_CPF_Usuario` as UsuarioCpfUsuario
		from `denuncia_relato`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `denuncia_relato`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
<?php
/** @package    Coral::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the LocalPermitido object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Coral::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class LocalPermitidoReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `local_permitido` table
	public $CustomFieldExample;

	public $IdLocal;
	public $AdicionadoEmLocal;
	public $Latitude1Local;
	public $Longitude1Local;
	public $Latitude2Local;
	public $Longitude2Local;
	public $NomeLocal;

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
			,`local_permitido`.`Id_Local` as IdLocal
			,`local_permitido`.`Adicionado_Em_Local` as AdicionadoEmLocal
			,`local_permitido`.`Latitude1_Local` as Latitude1Local
			,`local_permitido`.`Longitude1_Local` as Longitude1Local
			,`local_permitido`.`Latitude2_Local` as Latitude2Local
			,`local_permitido`.`Longitude2_Local` as Longitude2Local
			,`local_permitido`.`Nome_Local` as NomeLocal
		from `local_permitido`";

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
		$sql = "select count(1) as counter from `local_permitido`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
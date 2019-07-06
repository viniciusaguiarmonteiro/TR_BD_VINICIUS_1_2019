<?php
/** @package    Coral::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the LogLogin object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Coral::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class LogLoginReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `log_login` table
	public $CustomFieldExample;

	public $IdLogin;
	public $DataInicioLogin;
	public $LocalLogin;
	public $PlataformaLogin;
	public $TimeZoneLogin;
	public $DataFimLogin;
	public $UsuarioCpfUsuario;
	public $BrowserLogin;

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
			,`log_login`.`Id_Login` as IdLogin
			,`log_login`.`Data_Inicio_Login` as DataInicioLogin
			,`log_login`.`Local_Login` as LocalLogin
			,`log_login`.`Plataforma_Login` as PlataformaLogin
			,`log_login`.`Time_Zone_Login` as TimeZoneLogin
			,`log_login`.`Data_Fim_Login` as DataFimLogin
			,`log_login`.`USUARIO_CPF_Usuario` as UsuarioCpfUsuario
			,`log_login`.`Browser_Login` as BrowserLogin
		from `log_login`";

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
		$sql = "select count(1) as counter from `log_login`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
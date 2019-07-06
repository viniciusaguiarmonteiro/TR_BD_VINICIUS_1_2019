<?php
/** @package    Coral::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Relato object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Coral::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class RelatoReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `relato` table
	public $CustomFieldExample;

	public $IdRelato;
	public $DescricaoRelato;
	public $StatusRelato;
	public $LatitudeRelato;
	public $LongitudeRelato;
	public $TituloRelato;
	public $ImagemRelato;
	public $AdicionadoEmRelato;
	public $PublicadoEmRelato;
	public $Logradouro_relato;
	public $ComplementoRelato;
	public $NumeroRelato;
	public $EstadoRelato;
	public $BairroRelato;
	public $CidadeRelato;
	public $Cep_relato;
	public $CategoriaRelatoIdCategoria;
	public $LocalPermitidoIdLocal;

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
			,`relato`.`Id_Relato` as IdRelato
			,`relato`.`Descricao_Relato` as DescricaoRelato
			,`relato`.`Status_Relato` as StatusRelato
			,`relato`.`Latitude_Relato` as LatitudeRelato
			,`relato`.`Longitude_Relato` as LongitudeRelato
			,`relato`.`Titulo_Relato` as TituloRelato
			,`relato`.`Imagem_Relato` as ImagemRelato
			,`relato`.`Adicionado_Em_Relato` as AdicionadoEmRelato
			,`relato`.`Publicado_Em_Relato` as PublicadoEmRelato
			,`relato`.`Logradouro__Relato` as Logradouro_relato
			,`relato`.`Complemento_Relato` as ComplementoRelato
			,`relato`.`Numero_Relato` as NumeroRelato
			,`relato`.`Estado_Relato` as EstadoRelato
			,`relato`.`Bairro_Relato` as BairroRelato
			,`relato`.`Cidade_Relato` as CidadeRelato
			,`relato`.`CEP__Relato` as Cep_relato
			,`relato`.`CATEGORIA_RELATO_Id_Categoria` as CategoriaRelatoIdCategoria
			,`relato`.`LOCAL_PERMITIDO_Id_Local` as LocalPermitidoIdLocal
		from `relato`";

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
		$sql = "select count(1) as counter from `relato`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
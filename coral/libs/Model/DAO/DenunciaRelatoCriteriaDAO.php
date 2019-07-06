<?php
/** @package    Coral::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * DenunciaRelatoCriteria allows custom querying for the DenunciaRelato object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Coral::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class DenunciaRelatoCriteriaDAO extends Criteria
{

	public $IdDenunciaRelato_Equals;
	public $IdDenunciaRelato_NotEquals;
	public $IdDenunciaRelato_IsLike;
	public $IdDenunciaRelato_IsNotLike;
	public $IdDenunciaRelato_BeginsWith;
	public $IdDenunciaRelato_EndsWith;
	public $IdDenunciaRelato_GreaterThan;
	public $IdDenunciaRelato_GreaterThanOrEqual;
	public $IdDenunciaRelato_LessThan;
	public $IdDenunciaRelato_LessThanOrEqual;
	public $IdDenunciaRelato_In;
	public $IdDenunciaRelato_IsNotEmpty;
	public $IdDenunciaRelato_IsEmpty;
	public $IdDenunciaRelato_BitwiseOr;
	public $IdDenunciaRelato_BitwiseAnd;
	public $DataDenunciaRelato_Equals;
	public $DataDenunciaRelato_NotEquals;
	public $DataDenunciaRelato_IsLike;
	public $DataDenunciaRelato_IsNotLike;
	public $DataDenunciaRelato_BeginsWith;
	public $DataDenunciaRelato_EndsWith;
	public $DataDenunciaRelato_GreaterThan;
	public $DataDenunciaRelato_GreaterThanOrEqual;
	public $DataDenunciaRelato_LessThan;
	public $DataDenunciaRelato_LessThanOrEqual;
	public $DataDenunciaRelato_In;
	public $DataDenunciaRelato_IsNotEmpty;
	public $DataDenunciaRelato_IsEmpty;
	public $DataDenunciaRelato_BitwiseOr;
	public $DataDenunciaRelato_BitwiseAnd;
	public $TotalVisualizacaoDenunciaRelato_Equals;
	public $TotalVisualizacaoDenunciaRelato_NotEquals;
	public $TotalVisualizacaoDenunciaRelato_IsLike;
	public $TotalVisualizacaoDenunciaRelato_IsNotLike;
	public $TotalVisualizacaoDenunciaRelato_BeginsWith;
	public $TotalVisualizacaoDenunciaRelato_EndsWith;
	public $TotalVisualizacaoDenunciaRelato_GreaterThan;
	public $TotalVisualizacaoDenunciaRelato_GreaterThanOrEqual;
	public $TotalVisualizacaoDenunciaRelato_LessThan;
	public $TotalVisualizacaoDenunciaRelato_LessThanOrEqual;
	public $TotalVisualizacaoDenunciaRelato_In;
	public $TotalVisualizacaoDenunciaRelato_IsNotEmpty;
	public $TotalVisualizacaoDenunciaRelato_IsEmpty;
	public $TotalVisualizacaoDenunciaRelato_BitwiseOr;
	public $TotalVisualizacaoDenunciaRelato_BitwiseAnd;
	public $TotalConfirmacaoExistenciaRelato_Equals;
	public $TotalConfirmacaoExistenciaRelato_NotEquals;
	public $TotalConfirmacaoExistenciaRelato_IsLike;
	public $TotalConfirmacaoExistenciaRelato_IsNotLike;
	public $TotalConfirmacaoExistenciaRelato_BeginsWith;
	public $TotalConfirmacaoExistenciaRelato_EndsWith;
	public $TotalConfirmacaoExistenciaRelato_GreaterThan;
	public $TotalConfirmacaoExistenciaRelato_GreaterThanOrEqual;
	public $TotalConfirmacaoExistenciaRelato_LessThan;
	public $TotalConfirmacaoExistenciaRelato_LessThanOrEqual;
	public $TotalConfirmacaoExistenciaRelato_In;
	public $TotalConfirmacaoExistenciaRelato_IsNotEmpty;
	public $TotalConfirmacaoExistenciaRelato_IsEmpty;
	public $TotalConfirmacaoExistenciaRelato_BitwiseOr;
	public $TotalConfirmacaoExistenciaRelato_BitwiseAnd;
	public $DescricaoDenunciaRelato_Equals;
	public $DescricaoDenunciaRelato_NotEquals;
	public $DescricaoDenunciaRelato_IsLike;
	public $DescricaoDenunciaRelato_IsNotLike;
	public $DescricaoDenunciaRelato_BeginsWith;
	public $DescricaoDenunciaRelato_EndsWith;
	public $DescricaoDenunciaRelato_GreaterThan;
	public $DescricaoDenunciaRelato_GreaterThanOrEqual;
	public $DescricaoDenunciaRelato_LessThan;
	public $DescricaoDenunciaRelato_LessThanOrEqual;
	public $DescricaoDenunciaRelato_In;
	public $DescricaoDenunciaRelato_IsNotEmpty;
	public $DescricaoDenunciaRelato_IsEmpty;
	public $DescricaoDenunciaRelato_BitwiseOr;
	public $DescricaoDenunciaRelato_BitwiseAnd;
	public $TituloDenunciaRelato_Equals;
	public $TituloDenunciaRelato_NotEquals;
	public $TituloDenunciaRelato_IsLike;
	public $TituloDenunciaRelato_IsNotLike;
	public $TituloDenunciaRelato_BeginsWith;
	public $TituloDenunciaRelato_EndsWith;
	public $TituloDenunciaRelato_GreaterThan;
	public $TituloDenunciaRelato_GreaterThanOrEqual;
	public $TituloDenunciaRelato_LessThan;
	public $TituloDenunciaRelato_LessThanOrEqual;
	public $TituloDenunciaRelato_In;
	public $TituloDenunciaRelato_IsNotEmpty;
	public $TituloDenunciaRelato_IsEmpty;
	public $TituloDenunciaRelato_BitwiseOr;
	public $TituloDenunciaRelato_BitwiseAnd;
	public $RelatoIdRelato_Equals;
	public $RelatoIdRelato_NotEquals;
	public $RelatoIdRelato_IsLike;
	public $RelatoIdRelato_IsNotLike;
	public $RelatoIdRelato_BeginsWith;
	public $RelatoIdRelato_EndsWith;
	public $RelatoIdRelato_GreaterThan;
	public $RelatoIdRelato_GreaterThanOrEqual;
	public $RelatoIdRelato_LessThan;
	public $RelatoIdRelato_LessThanOrEqual;
	public $RelatoIdRelato_In;
	public $RelatoIdRelato_IsNotEmpty;
	public $RelatoIdRelato_IsEmpty;
	public $RelatoIdRelato_BitwiseOr;
	public $RelatoIdRelato_BitwiseAnd;
	public $UsuarioCpfUsuario_Equals;
	public $UsuarioCpfUsuario_NotEquals;
	public $UsuarioCpfUsuario_IsLike;
	public $UsuarioCpfUsuario_IsNotLike;
	public $UsuarioCpfUsuario_BeginsWith;
	public $UsuarioCpfUsuario_EndsWith;
	public $UsuarioCpfUsuario_GreaterThan;
	public $UsuarioCpfUsuario_GreaterThanOrEqual;
	public $UsuarioCpfUsuario_LessThan;
	public $UsuarioCpfUsuario_LessThanOrEqual;
	public $UsuarioCpfUsuario_In;
	public $UsuarioCpfUsuario_IsNotEmpty;
	public $UsuarioCpfUsuario_IsEmpty;
	public $UsuarioCpfUsuario_BitwiseOr;
	public $UsuarioCpfUsuario_BitwiseAnd;

}

?>
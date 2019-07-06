<?php
/** @package    CORAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Relato.php");

/**
 * RelatoController is the controller class for the Relato object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package CORAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class RelatoController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of Relato objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Relato records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new RelatoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdRelato,DescricaoRelato,StatusRelato,LatitudeRelato,LongitudeRelato,TituloRelato,ImagemRelato,AdicionadoEmRelato,PublicadoEmRelato,Logradouro_relato,ComplementoRelato,NumeroRelato,EstadoRelato,BairroRelato,CidadeRelato,Cep_relato,CategoriaRelatoIdCategoria,LocalPermitidoIdLocal'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$relatos = $this->Phreezer->Query('Relato',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $relatos->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $relatos->TotalResults;
				$output->totalPages = $relatos->TotalPages;
				$output->pageSize = $relatos->PageSize;
				$output->currentPage = $relatos->CurrentPage;
			}
			else
			{
				// return all results
				$relatos = $this->Phreezer->Query('Relato',$criteria);
				$output->rows = $relatos->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single Relato record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idRelato');
			$relato = $this->Phreezer->Get('Relato',$pk);
			$this->RenderJSON($relato, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Relato record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$relato = new Relato($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			$relato->IdRelato = $this->SafeGetVal($json, 'idRelato');
			$relato->DescricaoRelato = $this->SafeGetVal($json, 'descricaoRelato');
			$relato->StatusRelato = $this->SafeGetVal($json, 'statusRelato');
			$relato->LatitudeRelato = $this->SafeGetVal($json, 'latitudeRelato');
			$relato->LongitudeRelato = $this->SafeGetVal($json, 'longitudeRelato');
			$relato->TituloRelato = $this->SafeGetVal($json, 'tituloRelato');
			$relato->ImagemRelato = $this->SafeGetVal($json, 'imagemRelato');
			$relato->AdicionadoEmRelato = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'adicionadoEmRelato')));
			$relato->PublicadoEmRelato = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'publicadoEmRelato')));
			$relato->Logradouro_relato = $this->SafeGetVal($json, 'logradouro_relato');
			$relato->ComplementoRelato = $this->SafeGetVal($json, 'complementoRelato');
			$relato->NumeroRelato = $this->SafeGetVal($json, 'numeroRelato');
			$relato->EstadoRelato = $this->SafeGetVal($json, 'estadoRelato');
			$relato->BairroRelato = $this->SafeGetVal($json, 'bairroRelato');
			$relato->CidadeRelato = $this->SafeGetVal($json, 'cidadeRelato');
			$relato->Cep_relato = $this->SafeGetVal($json, 'cep_relato');
			$relato->CategoriaRelatoIdCategoria = $this->SafeGetVal($json, 'categoriaRelatoIdCategoria');
			$relato->LocalPermitidoIdLocal = $this->SafeGetVal($json, 'localPermitidoIdLocal');

			$relato->Validate();
			$errors = $relato->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				// since the primary key is not auto-increment we must force the insert here
				$relato->Save(true);
				$this->RenderJSON($relato, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Relato record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('idRelato');
			$relato = $this->Phreezer->Get('Relato',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $relato->IdRelato = $this->SafeGetVal($json, 'idRelato', $relato->IdRelato);

			$relato->DescricaoRelato = $this->SafeGetVal($json, 'descricaoRelato', $relato->DescricaoRelato);
			$relato->StatusRelato = $this->SafeGetVal($json, 'statusRelato', $relato->StatusRelato);
			$relato->LatitudeRelato = $this->SafeGetVal($json, 'latitudeRelato', $relato->LatitudeRelato);
			$relato->LongitudeRelato = $this->SafeGetVal($json, 'longitudeRelato', $relato->LongitudeRelato);
			$relato->TituloRelato = $this->SafeGetVal($json, 'tituloRelato', $relato->TituloRelato);
			$relato->ImagemRelato = $this->SafeGetVal($json, 'imagemRelato', $relato->ImagemRelato);
			$relato->AdicionadoEmRelato = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'adicionadoEmRelato', $relato->AdicionadoEmRelato)));
			$relato->PublicadoEmRelato = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'publicadoEmRelato', $relato->PublicadoEmRelato)));
			$relato->Logradouro_relato = $this->SafeGetVal($json, 'logradouro_relato', $relato->Logradouro_relato);
			$relato->ComplementoRelato = $this->SafeGetVal($json, 'complementoRelato', $relato->ComplementoRelato);
			$relato->NumeroRelato = $this->SafeGetVal($json, 'numeroRelato', $relato->NumeroRelato);
			$relato->EstadoRelato = $this->SafeGetVal($json, 'estadoRelato', $relato->EstadoRelato);
			$relato->BairroRelato = $this->SafeGetVal($json, 'bairroRelato', $relato->BairroRelato);
			$relato->CidadeRelato = $this->SafeGetVal($json, 'cidadeRelato', $relato->CidadeRelato);
			$relato->Cep_relato = $this->SafeGetVal($json, 'cep_relato', $relato->Cep_relato);
			$relato->CategoriaRelatoIdCategoria = $this->SafeGetVal($json, 'categoriaRelatoIdCategoria', $relato->CategoriaRelatoIdCategoria);
			$relato->LocalPermitidoIdLocal = $this->SafeGetVal($json, 'localPermitidoIdLocal', $relato->LocalPermitidoIdLocal);

			$relato->Validate();
			$errors = $relato->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$relato->Save();
				$this->RenderJSON($relato, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{

			// this table does not have an auto-increment primary key, so it is semantically correct to
			// issue a REST PUT request, however we have no way to know whether to insert or update.
			// if the record is not found, this exception will indicate that this is an insert request
			if (is_a($ex,'NotFoundException'))
			{
				return $this->Create();
			}

			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Relato record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idRelato');
			$relato = $this->Phreezer->Get('Relato',$pk);

			$relato->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>

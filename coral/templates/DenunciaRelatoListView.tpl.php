<?php
	$this->assign('title','CORAL | DenunciaRelatos');
	$this->assign('nav','denunciarelatos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/denunciarelatos.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> DenunciaRelatos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="denunciaRelatoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdDenunciaRelato">Id Denuncia Relato<% if (page.orderBy == 'IdDenunciaRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DataDenunciaRelato">Data Denuncia Relato<% if (page.orderBy == 'DataDenunciaRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TotalVisualizacaoDenunciaRelato">Total Visualizacao Denuncia Relato<% if (page.orderBy == 'TotalVisualizacaoDenunciaRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TotalConfirmacaoExistenciaRelato">Total Confirmacao Existencia Relato<% if (page.orderBy == 'TotalConfirmacaoExistenciaRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DescricaoDenunciaRelato">Descricao Denuncia Relato<% if (page.orderBy == 'DescricaoDenunciaRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS-->
				<th id="header_TituloDenunciaRelato">Titulo Denuncia Relato<% if (page.orderBy == 'TituloDenunciaRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_RelatoIdRelato">Relato Id Relato<% if (page.orderBy == 'RelatoIdRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_UsuarioCpfUsuario">Usuario Cpf Usuario<% if (page.orderBy == 'UsuarioCpfUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>

			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idDenunciaRelato')) %>">
				<td><%= _.escape(item.get('idDenunciaRelato') || '') %></td>
				<td><%if (item.get('dataDenunciaRelato')) { %><%= _date(app.parseDate(item.get('dataDenunciaRelato'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('totalVisualizacaoDenunciaRelato') || '') %></td>
				<td><%= _.escape(item.get('totalConfirmacaoExistenciaRelato') || '') %></td>
				<td><%= _.escape(item.get('descricaoDenunciaRelato') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS-->
				<td><%= _.escape(item.get('tituloDenunciaRelato') || '') %></td>
				<td><%= _.escape(item.get('relatoIdRelato') || '') %></td>
				<td><%= _.escape(item.get('usuarioCpfUsuario') || '') %></td>

			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="denunciaRelatoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idDenunciaRelatoInputContainer" class="control-group">
					<label class="control-label" for="idDenunciaRelato">Id Denuncia Relato</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idDenunciaRelato" placeholder="Id Denuncia Relato" value="<%= _.escape(item.get('idDenunciaRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dataDenunciaRelatoInputContainer" class="control-group">
					<label class="control-label" for="dataDenunciaRelato">Data Denuncia Relato</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="dataDenunciaRelato" type="text" value="<%= _date(app.parseDate(item.get('dataDenunciaRelato'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="dataDenunciaRelato-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('dataDenunciaRelato'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="totalVisualizacaoDenunciaRelatoInputContainer" class="control-group">
					<label class="control-label" for="totalVisualizacaoDenunciaRelato">Total Visualizacao Denuncia Relato</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="totalVisualizacaoDenunciaRelato" placeholder="Total Visualizacao Denuncia Relato" value="<%= _.escape(item.get('totalVisualizacaoDenunciaRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="totalConfirmacaoExistenciaRelatoInputContainer" class="control-group">
					<label class="control-label" for="totalConfirmacaoExistenciaRelato">Total Confirmacao Existencia Relato</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="totalConfirmacaoExistenciaRelato" placeholder="Total Confirmacao Existencia Relato" value="<%= _.escape(item.get('totalConfirmacaoExistenciaRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descricaoDenunciaRelatoInputContainer" class="control-group">
					<label class="control-label" for="descricaoDenunciaRelato">Descricao Denuncia Relato</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descricaoDenunciaRelato" placeholder="Descricao Denuncia Relato" value="<%= _.escape(item.get('descricaoDenunciaRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tituloDenunciaRelatoInputContainer" class="control-group">
					<label class="control-label" for="tituloDenunciaRelato">Titulo Denuncia Relato</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tituloDenunciaRelato" placeholder="Titulo Denuncia Relato" value="<%= _.escape(item.get('tituloDenunciaRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="relatoIdRelatoInputContainer" class="control-group">
					<label class="control-label" for="relatoIdRelato">Relato Id Relato</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="relatoIdRelato" placeholder="Relato Id Relato" value="<%= _.escape(item.get('relatoIdRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="usuarioCpfUsuarioInputContainer" class="control-group">
					<label class="control-label" for="usuarioCpfUsuario">Usuario Cpf Usuario</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="usuarioCpfUsuario" placeholder="Usuario Cpf Usuario" value="<%= _.escape(item.get('usuarioCpfUsuario') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteDenunciaRelatoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteDenunciaRelatoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete DenunciaRelato</button>
						<span id="confirmDeleteDenunciaRelatoContainer" class="hide">
							<button id="cancelDeleteDenunciaRelatoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteDenunciaRelatoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="denunciaRelatoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit DenunciaRelato
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="denunciaRelatoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveDenunciaRelatoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="denunciaRelatoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newDenunciaRelatoButton" class="btn btn-primary">Add DenunciaRelato</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

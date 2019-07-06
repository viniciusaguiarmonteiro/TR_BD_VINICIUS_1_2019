<?php
	$this->assign('title','CORAL | Servicos');
	$this->assign('nav','servicos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/servicos.js").wait(function(){
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
	<i class="icon-th-list"></i> Servicos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="servicoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdServico">Id Servico<% if (page.orderBy == 'IdServico') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TituloServico">Titulo Servico<% if (page.orderBy == 'TituloServico') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DescricaoServico">Descricao Servico<% if (page.orderBy == 'DescricaoServico') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DiretoriaIdDiretoria">Diretoria Id Diretoria<% if (page.orderBy == 'DiretoriaIdDiretoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idServico')) %>">
				<td><%= _.escape(item.get('idServico') || '') %></td>
				<td><%= _.escape(item.get('tituloServico') || '') %></td>
				<td><%= _.escape(item.get('descricaoServico') || '') %></td>
				<td><%= _.escape(item.get('diretoriaIdDiretoria') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="servicoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idServicoInputContainer" class="control-group">
					<label class="control-label" for="idServico">Id Servico</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idServico"><%= _.escape(item.get('idServico') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tituloServicoInputContainer" class="control-group">
					<label class="control-label" for="tituloServico">Titulo Servico</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tituloServico" placeholder="Titulo Servico" value="<%= _.escape(item.get('tituloServico') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descricaoServicoInputContainer" class="control-group">
					<label class="control-label" for="descricaoServico">Descricao Servico</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descricaoServico" placeholder="Descricao Servico" value="<%= _.escape(item.get('descricaoServico') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="diretoriaIdDiretoriaInputContainer" class="control-group">
					<label class="control-label" for="diretoriaIdDiretoria">Diretoria Id Diretoria</label>
					<div class="controls inline-inputs">
						<select id="diretoriaIdDiretoria" name="diretoriaIdDiretoria"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteServicoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteServicoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Servico</button>
						<span id="confirmDeleteServicoContainer" class="hide">
							<button id="cancelDeleteServicoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteServicoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="servicoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Servico
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="servicoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveServicoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="servicoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newServicoButton" class="btn btn-primary">Add Servico</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

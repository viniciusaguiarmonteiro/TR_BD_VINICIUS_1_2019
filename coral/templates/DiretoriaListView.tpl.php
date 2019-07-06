<?php
	$this->assign('title','CORAL | Diretorias');
	$this->assign('nav','diretorias');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/diretorias.js").wait(function(){
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
	<i class="icon-th-list"></i> Diretorias
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="diretoriaCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdDiretoria">Id Diretoria<% if (page.orderBy == 'IdDiretoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_NomeDiretoria">Nome Diretoria<% if (page.orderBy == 'NomeDiretoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DescricaoDiretoria">Descricao Diretoria<% if (page.orderBy == 'DescricaoDiretoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idDiretoria')) %>">
				<td><%= _.escape(item.get('idDiretoria') || '') %></td>
				<td><%= _.escape(item.get('nomeDiretoria') || '') %></td>
				<td><%= _.escape(item.get('descricaoDiretoria') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="diretoriaModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idDiretoriaInputContainer" class="control-group">
					<label class="control-label" for="idDiretoria">Id Diretoria</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idDiretoria"><%= _.escape(item.get('idDiretoria') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nomeDiretoriaInputContainer" class="control-group">
					<label class="control-label" for="nomeDiretoria">Nome Diretoria</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nomeDiretoria" placeholder="Nome Diretoria" value="<%= _.escape(item.get('nomeDiretoria') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descricaoDiretoriaInputContainer" class="control-group">
					<label class="control-label" for="descricaoDiretoria">Descricao Diretoria</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descricaoDiretoria" placeholder="Descricao Diretoria" value="<%= _.escape(item.get('descricaoDiretoria') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteDiretoriaButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteDiretoriaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Diretoria</button>
						<span id="confirmDeleteDiretoriaContainer" class="hide">
							<button id="cancelDeleteDiretoriaButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteDiretoriaButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="diretoriaDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Diretoria
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="diretoriaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveDiretoriaButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="diretoriaCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newDiretoriaButton" class="btn btn-primary">Add Diretoria</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

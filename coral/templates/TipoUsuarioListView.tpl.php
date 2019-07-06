<?php
	$this->assign('title','CORAL | TipoUsuarios');
	$this->assign('nav','tipousuarios');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/tipousuarios.js").wait(function(){
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
	<i class="icon-th-list"></i> TipoUsuarios
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="tipoUsuarioCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdTipoUsuario">Id Tipo Usuario<% if (page.orderBy == 'IdTipoUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TituloTipoUsuario">Titulo Tipo Usuario<% if (page.orderBy == 'TituloTipoUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DescricaoTipoUsuario">Descricao Tipo Usuario<% if (page.orderBy == 'DescricaoTipoUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idTipoUsuario')) %>">
				<td><%= _.escape(item.get('idTipoUsuario') || '') %></td>
				<td><%= _.escape(item.get('tituloTipoUsuario') || '') %></td>
				<td><%= _.escape(item.get('descricaoTipoUsuario') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="tipoUsuarioModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idTipoUsuarioInputContainer" class="control-group">
					<label class="control-label" for="idTipoUsuario">Id Tipo Usuario</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idTipoUsuario" placeholder="Id Tipo Usuario" value="<%= _.escape(item.get('idTipoUsuario') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tituloTipoUsuarioInputContainer" class="control-group">
					<label class="control-label" for="tituloTipoUsuario">Titulo Tipo Usuario</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tituloTipoUsuario" placeholder="Titulo Tipo Usuario" value="<%= _.escape(item.get('tituloTipoUsuario') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descricaoTipoUsuarioInputContainer" class="control-group">
					<label class="control-label" for="descricaoTipoUsuario">Descricao Tipo Usuario</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descricaoTipoUsuario" placeholder="Descricao Tipo Usuario" value="<%= _.escape(item.get('descricaoTipoUsuario') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteTipoUsuarioButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteTipoUsuarioButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete TipoUsuario</button>
						<span id="confirmDeleteTipoUsuarioContainer" class="hide">
							<button id="cancelDeleteTipoUsuarioButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteTipoUsuarioButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="tipoUsuarioDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit TipoUsuario
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="tipoUsuarioModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveTipoUsuarioButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="tipoUsuarioCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newTipoUsuarioButton" class="btn btn-primary">Add TipoUsuario</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

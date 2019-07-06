<?php
	$this->assign('title','CORAL | UsuarioRelatos');
	$this->assign('nav','usuariorelatos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/usuariorelatos.js").wait(function(){
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
	<i class="icon-th-list"></i> UsuarioRelatos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="usuarioRelatoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_DataUsuarioRelato">Data Usuario Relato<% if (page.orderBy == 'DataUsuarioRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_RelatoIdRelato">Relato Id Relato<% if (page.orderBy == 'RelatoIdRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_RelatanteUsuarioCpfUsuario">Relatante Usuario Cpf Usuario<% if (page.orderBy == 'RelatanteUsuarioCpfUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('dataUsuarioRelato')) %>">
				<td><%= _.escape(item.get('dataUsuarioRelato') || '') %></td>
				<td><%= _.escape(item.get('relatoIdRelato') || '') %></td>
				<td><%= _.escape(item.get('relatanteUsuarioCpfUsuario') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="usuarioRelatoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="dataUsuarioRelatoInputContainer" class="control-group">
					<label class="control-label" for="dataUsuarioRelato">Data Usuario Relato</label>
					
					<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
						<input id="dataUsuarioRelato" type="text" value="<%= _date(app.parseDate(item.get('dataUsuarioRelato'))).format('YYYY-MM-DD') %>" />
						<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
				</div>
				<div id="relatoIdRelatoInputContainer" class="control-group">
					<label class="control-label" for="relatoIdRelato">Relato Id Relato</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="relatoIdRelato" placeholder="Relato Id Relato" value="<%= _.escape(item.get('relatoIdRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="relatanteUsuarioCpfUsuarioInputContainer" class="control-group">
					<label class="control-label" for="relatanteUsuarioCpfUsuario">Relatante Usuario Cpf Usuario</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="relatanteUsuarioCpfUsuario" placeholder="Relatante Usuario Cpf Usuario" value="<%= _.escape(item.get('relatanteUsuarioCpfUsuario') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteUsuarioRelatoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteUsuarioRelatoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete UsuarioRelato</button>
						<span id="confirmDeleteUsuarioRelatoContainer" class="hide">
							<button id="cancelDeleteUsuarioRelatoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteUsuarioRelatoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="usuarioRelatoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit UsuarioRelato
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="usuarioRelatoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveUsuarioRelatoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="usuarioRelatoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newUsuarioRelatoButton" class="btn btn-primary">Add UsuarioRelato</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

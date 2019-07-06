<?php
	$this->assign('title','CORAL | CategoriaRelatos');
	$this->assign('nav','categoriarelatos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/categoriarelatos.js").wait(function(){
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
	<i class="icon-th-list"></i> CategoriaRelatos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="categoriaRelatoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdCategoria">Id Categoria<% if (page.orderBy == 'IdCategoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_AdiconadoEmCategoria">Adiconado Em Categoria<% if (page.orderBy == 'AdiconadoEmCategoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_IconeCategoria">Icone Categoria<% if (page.orderBy == 'IconeCategoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_OrdemCategoria">Ordem Categoria<% if (page.orderBy == 'OrdemCategoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_NomeCategoria">Nome Categoria<% if (page.orderBy == 'NomeCategoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idCategoria')) %>">
				<td><%= _.escape(item.get('idCategoria') || '') %></td>
				<td><%if (item.get('adiconadoEmCategoria')) { %><%= _date(app.parseDate(item.get('adiconadoEmCategoria'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('iconeCategoria') || '') %></td>
				<td><%= _.escape(item.get('ordemCategoria') || '') %></td>
				<td><%= _.escape(item.get('nomeCategoria') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="categoriaRelatoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idCategoriaInputContainer" class="control-group">
					<label class="control-label" for="idCategoria">Id Categoria</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idCategoria" placeholder="Id Categoria" value="<%= _.escape(item.get('idCategoria') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="adiconadoEmCategoriaInputContainer" class="control-group">
					<label class="control-label" for="adiconadoEmCategoria">Adiconado Em Categoria</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="adiconadoEmCategoria" type="text" value="<%= _date(app.parseDate(item.get('adiconadoEmCategoria'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="adiconadoEmCategoria-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('adiconadoEmCategoria'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="iconeCategoriaInputContainer" class="control-group">
					<label class="control-label" for="iconeCategoria">Icone Categoria</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="iconeCategoria" placeholder="Icone Categoria" value="<%= _.escape(item.get('iconeCategoria') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="ordemCategoriaInputContainer" class="control-group">
					<label class="control-label" for="ordemCategoria">Ordem Categoria</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ordemCategoria" placeholder="Ordem Categoria" value="<%= _.escape(item.get('ordemCategoria') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nomeCategoriaInputContainer" class="control-group">
					<label class="control-label" for="nomeCategoria">Nome Categoria</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nomeCategoria" placeholder="Nome Categoria" value="<%= _.escape(item.get('nomeCategoria') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteCategoriaRelatoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteCategoriaRelatoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete CategoriaRelato</button>
						<span id="confirmDeleteCategoriaRelatoContainer" class="hide">
							<button id="cancelDeleteCategoriaRelatoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteCategoriaRelatoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="categoriaRelatoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit CategoriaRelato
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="categoriaRelatoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveCategoriaRelatoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="categoriaRelatoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newCategoriaRelatoButton" class="btn btn-primary">Add CategoriaRelato</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

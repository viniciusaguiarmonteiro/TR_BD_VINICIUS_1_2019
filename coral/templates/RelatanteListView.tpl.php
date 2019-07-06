<?php
	$this->assign('title','CORAL | Relatantes');
	$this->assign('nav','relatantes');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/relatantes.js").wait(function(){
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
	<i class="icon-th-list"></i> Relatantes
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="relatanteCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_CadastradoEmRelatante">Cadastrado Em Relatante<% if (page.orderBy == 'CadastradoEmRelatante') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_UsuarioCpfUsuario">Usuario Cpf Usuario<% if (page.orderBy == 'UsuarioCpfUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('usuarioCpfUsuario')) %>">
				<td><%if (item.get('cadastradoEmRelatante')) { %><%= _date(app.parseDate(item.get('cadastradoEmRelatante'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('usuarioCpfUsuario') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="relatanteModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="cadastradoEmRelatanteInputContainer" class="control-group">
					<label class="control-label" for="cadastradoEmRelatante">Cadastrado Em Relatante</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="cadastradoEmRelatante" type="text" value="<%= _date(app.parseDate(item.get('cadastradoEmRelatante'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="cadastradoEmRelatante-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('cadastradoEmRelatante'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
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
		<form id="deleteRelatanteButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteRelatanteButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Relatante</button>
						<span id="confirmDeleteRelatanteContainer" class="hide">
							<button id="cancelDeleteRelatanteButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteRelatanteButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="relatanteDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Relatante
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="relatanteModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveRelatanteButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="relatanteCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newRelatanteButton" class="btn btn-primary">Add Relatante</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

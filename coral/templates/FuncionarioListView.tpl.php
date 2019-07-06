<?php
	$this->assign('title','CORAL | Funcionarios');
	$this->assign('nav','funcionarios');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/funcionarios.js").wait(function(){
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
	<i class="icon-th-list"></i> Funcionarios
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="funcionarioCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_MatriculaFuncionario">Matricula Funcionario<% if (page.orderBy == 'MatriculaFuncionario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DiretoriaIdDiretoria">Diretoria Id Diretoria<% if (page.orderBy == 'DiretoriaIdDiretoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_UsuarioCpfUsuario">Usuario Cpf Usuario<% if (page.orderBy == 'UsuarioCpfUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('matriculaFuncionario')) %>">
				<td><%= _.escape(item.get('matriculaFuncionario') || '') %></td>
				<td><%= _.escape(item.get('diretoriaIdDiretoria') || '') %></td>
				<td><%= _.escape(item.get('usuarioCpfUsuario') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="funcionarioModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="matriculaFuncionarioInputContainer" class="control-group">
					<label class="control-label" for="matriculaFuncionario">Matricula Funcionario</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="matriculaFuncionario" placeholder="Matricula Funcionario" value="<%= _.escape(item.get('matriculaFuncionario') || '') %>">
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
		<form id="deleteFuncionarioButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteFuncionarioButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Funcionario</button>
						<span id="confirmDeleteFuncionarioContainer" class="hide">
							<button id="cancelDeleteFuncionarioButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteFuncionarioButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="funcionarioDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Funcionario
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="funcionarioModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveFuncionarioButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="funcionarioCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newFuncionarioButton" class="btn btn-primary">Add Funcionario</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

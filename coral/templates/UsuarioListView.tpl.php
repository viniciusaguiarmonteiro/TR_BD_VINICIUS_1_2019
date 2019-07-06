<?php
	$this->assign('title','CORAL | Usuarios');
	$this->assign('nav','usuarios');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/usuarios.js").wait(function(){
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
	<i class="icon-th-list"></i> Usuarios
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Procurar..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="usuarioCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_CpfUsuario">CPF<% if (page.orderBy == 'CpfUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_EmailUsuario">EMAIL<% if (page.orderBy == 'EmailUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				 
				<th id="header_FotoUsuario">FOTO<% if (page.orderBy == 'FotoUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_SenhaUsuario">SENHA<% if (page.orderBy == 'SenhaUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_NomeUsuario">NOME<% if (page.orderBy == 'NomeUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS-->
				<th id="header_TipoUsuarioIdTipoUsuario">TIPO USUARIO<% if (page.orderBy == 'TipoUsuarioIdTipoUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('cpfUsuario')) %>">
				<td><%= _.escape(item.get('cpfUsuario') || '') %></td>
				<td><%= _.escape(item.get('emailUsuario') || '') %></td>
				<td><%= _.escape(item.get('fotoUsuario') || '') %></td>
				<td><%= _.escape(item.get('senhaUsuario') || '') %></td>
				<td><%= _.escape(item.get('nomeUsuario') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS-->
				<td><%= _.escape(item.get('tipoUsuarioIdTipoUsuario') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="usuarioModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="cpfUsuarioInputContainer" class="control-group">
					<label class="control-label" for="cpfUsuario">CPF:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="cpfUsuario" placeholder="Cpf Usuario" value="<%= _.escape(item.get('cpfUsuario') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="emailUsuarioInputContainer" class="control-group">
					<label class="control-label" for="emailUsuario">Email:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="emailUsuario" placeholder="Email Usuario" value="<%= _.escape(item.get('emailUsuario') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fotoUsuarioInputContainer" class="control-group">
					<label class="control-label" for="fotoUsuario">Foto:</label>
					<div class="controls form-control-file">
						<input type="file" class="form-control-file" id="fotoUsuario" placeholder="Foto Usuario" value="<%= _.escape(item.get('fotoUsuario') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="senhaUsuarioInputContainer" class="control-group">
					<label class="control-label" for="senhaUsuario">Senha:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="senhaUsuario" placeholder="Senha Usuario" value="<%= _.escape(item.get('senhaUsuario') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nomeUsuarioInputContainer" class="control-group">
					<label class="control-label" for="nomeUsuario">Nome:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nomeUsuario" placeholder="Nome Usuario" value="<%= _.escape(item.get('nomeUsuario') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tipoUsuarioIdTipoUsuarioInputContainer" class="control-group">
					<label class="control-label" for="tipoUsuarioIdTipoUsuario">Tipo Usuario:</label>
					<div class="controls inline-inputs">
						<select id="tipoUsuarioIdTipoUsuario" name="tipoUsuarioIdTipoUsuario"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteUsuarioButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteUsuarioButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Deletar Usuario</button>
						<span id="confirmDeleteUsuarioContainer" class="hide">
							<button id="cancelDeleteUsuarioButton" class="btn btn-mini">CANCELAR</button>
							<button id="confirmDeleteUsuarioButton" class="btn btn-mini btn-danger">CONFIRMARde</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="usuarioDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> FORMULÁRIO USUÁRIO
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="usuarioModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >CANCELAR</button>
			<button id="saveUsuarioButton" class="btn btn-primary">SALVAR</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="usuarioCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newUsuarioButton" class="btn btn-primary">Adicionar Usuario</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

<?php
	$this->assign('title','CORAL | Relatos');
	$this->assign('nav','relatos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/relatos.js").wait(function(){
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
	<i class="icon-th-list"></i> Relatos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Procurar..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="relatoCollectionTemplate">
		<table class="collection table table-center table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdRelato">ID<% if (page.orderBy == 'IdRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DescricaoRelato">DESCRIÇÃO<% if (page.orderBy == 'DescricaoRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_StatusRelato">STATUS<% if (page.orderBy == 'StatusRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_LatitudeRelato">LATITUDE<% if (page.orderBy == 'LatitudeRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_LongitudeRelato">LONGITUDE<% if (page.orderBy == 'LongitudeRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS-->
				<th id="header_TituloRelato">TITULO<% if (page.orderBy == 'TituloRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ImagemRelato">IMAGEM<% if (page.orderBy == 'ImagemRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_AdicionadoEmRelato">ADICIONADO EM<% if (page.orderBy == 'AdicionadoEmRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_PublicadoEmRelato">PUBLICADO<% if (page.orderBy == 'PublicadoEmRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Logradouro_relato">LLOGRADOURO<% if (page.orderBy == 'Logradouro_relato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ComplementoRelato">COMPLEMENTO<% if (page.orderBy == 'ComplementoRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_NumeroRelato">NUMERO<% if (page.orderBy == 'NumeroRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_EstadoRelato">ESTADO<% if (page.orderBy == 'EstadoRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_BairroRelato">BAIRRO<% if (page.orderBy == 'BairroRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_CidadeRelato">CIDADE<% if (page.orderBy == 'CidadeRelato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Cep_relato">CEP<% if (page.orderBy == 'Cep_relato') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_CategoriaRelatoIdCategoria">CATEGORIA<% if (page.orderBy == 'CategoriaRelatoIdCategoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_LocalPermitidoIdLocal">L0CAL<% if (page.orderBy == 'LocalPermitidoIdLocal') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>

			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idRelato')) %>">
				<td><%= _.escape(item.get('idRelato') || '') %></td>
				<td><%= _.escape(item.get('descricaoRelato') || '') %></td>
				<td><%= _.escape(item.get('statusRelato') || '') %></td>
				<td><%= _.escape(item.get('latitudeRelato') || '') %></td>
				<td><%= _.escape(item.get('longitudeRelato') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS-->
				<td><%= _.escape(item.get('tituloRelato') || '') %></td>
				<td><%= _.escape(item.get('imagemRelato') || '') %></td>
				<td><%if (item.get('adicionadoEmRelato')) { %><%= _date(app.parseDate(item.get('adicionadoEmRelato'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
				<td><%if (item.get('publicadoEmRelato')) { %><%= _date(app.parseDate(item.get('publicadoEmRelato'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('logradouro_relato') || '') %></td>
				<td><%= _.escape(item.get('complementoRelato') || '') %></td>
				<td><%= _.escape(item.get('numeroRelato') || '') %></td>
				<td><%= _.escape(item.get('estadoRelato') || '') %></td>
				<td><%= _.escape(item.get('bairroRelato') || '') %></td>
				<td><%= _.escape(item.get('cidadeRelato') || '') %></td>
				<td><%= _.escape(item.get('cep_relato') || '') %></td>
				<td><%= _.escape(item.get('categoriaRelatoIdCategoria') || '') %></td>
				<td><%= _.escape(item.get('localPermitidoIdLocal') || '') %></td>

			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="relatoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idRelatoInputContainer" class="control-group">
					<label class="control-label" for="idRelato">Id:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idRelato" placeholder="Id Relato" value="<%= _.escape(item.get('idRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descricaoRelatoInputContainer" class="control-group">
					<label class="control-label" for="descricaoRelato">Descrição:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descricaoRelato" placeholder="Descricao Relato" value="<%= _.escape(item.get('descricaoRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="statusRelatoInputContainer" class="control-group">
					<label class="control-label" for="statusRelato">Status:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="statusRelato" placeholder="Status Relato" value="<%= _.escape(item.get('statusRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="latitudeRelatoInputContainer" class="control-group">
					<label class="control-label" for="latitudeRelato">Latitude:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="latitudeRelato" placeholder="Latitude Relato" value="<%= _.escape(item.get('latitudeRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="longitudeRelatoInputContainer" class="control-group">
					<label class="control-label" for="longitudeRelato">Longitude:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="longitudeRelato" placeholder="Longitude Relato" value="<%= _.escape(item.get('longitudeRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tituloRelatoInputContainer" class="control-group">
					<label class="control-label" for="tituloRelato">Titulo:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tituloRelato" placeholder="Titulo Relato" value="<%= _.escape(item.get('tituloRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="imagemRelatoInputContainer" class="control-group">
					<label class="control-label" for="imagemRelato">Imagem:</label>
					<div class="controls form-control-files">
						<input type="file" class="form-control-file" id="imagemRelato" placeholder="Imagem Relato" value="<%= _.escape(item.get('imagemRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="adicionadoEmRelatoInputContainer" class="control-group">
					<label class="control-label" for="adicionadoEmRelato">Adicionado Em:</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="adicionadoEmRelato" type="text" value="<%= _date(app.parseDate(item.get('adicionadoEmRelato'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="adicionadoEmRelato-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('adicionadoEmRelato'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="publicadoEmRelatoInputContainer" class="control-group">
					<label class="control-label" for="publicadoEmRelato">Publicado Em:</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="publicadoEmRelato" type="text" value="<%= _date(app.parseDate(item.get('publicadoEmRelato'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="publicadoEmRelato-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('publicadoEmRelato'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="logradouro_relatoInputContainer" class="control-group">
					<label class="control-label" for="logradouro_relato">Logradouro:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="logradouro_relato" placeholder="Logradouro  Relato" value="<%= _.escape(item.get('logradouro_relato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="complementoRelatoInputContainer" class="control-group">
					<label class="control-label" for="complementoRelato">Complemento Relato</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="complementoRelato" placeholder="Complemento Relato" value="<%= _.escape(item.get('complementoRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="numeroRelatoInputContainer" class="control-group">
					<label class="control-label" for="numeroRelato">Numero:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="numeroRelato" placeholder="Numero Relato" value="<%= _.escape(item.get('numeroRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="estadoRelatoInputContainer" class="control-group">
					<label class="control-label" for="estadoRelato">Estado:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="estadoRelato" placeholder="Estado Relato" value="<%= _.escape(item.get('estadoRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="bairroRelatoInputContainer" class="control-group">
					<label class="control-label" for="bairroRelato">Bairro:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="bairroRelato" placeholder="Bairro Relato" value="<%= _.escape(item.get('bairroRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="cidadeRelatoInputContainer" class="control-group">
					<label class="control-label" for="cidadeRelato">Cidade:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="cidadeRelato" placeholder="Cidade Relato" value="<%= _.escape(item.get('cidadeRelato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="cep_relatoInputContainer" class="control-group">
					<label class="control-label" for="cep_relato">CEP:</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="cep_relato" placeholder="Cep  Relato" value="<%= _.escape(item.get('cep_relato') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="categoriaRelatoIdCategoriaInputContainer" class="control-group">
					<label class="control-label" for="categoriaRelatoIdCategoria">Categoria Relato</label>
					<div class="controls inline-inputs">
						<select id="categoriaRelatoIdCategoria" name="categoriaRelatoIdCategoria"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="localPermitidoIdLocalInputContainer" class="control-group">
					<label class="control-label" for="localPermitidoIdLocal">Local Permitido</label>
					<div class="controls inline-inputs">
						<select id="localPermitidoIdLocal" name="localPermitidoIdLocal"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteRelatoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteRelatoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Deletar Relato</button>
						<span id="confirmDeleteRelatoContainer" class="hide">
							<button id="cancelDeleteRelatoButton" class="btn btn-mini">CANCELAR</button>
							<button id="confirmDeleteRelatoButton" class="btn btn-mini btn-danger">CONFIRMAR</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="relatoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i>Formulário Relato
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="relatoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >CANCELAR</button>
			<button id="saveRelatoButton" class="btn btn-primary">SALVAR</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="relatoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newRelatoButton" class="btn btn-primary">Adicionar Relato</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

<?php
	$this->assign('title','CORAL | LocalPermitidos');
	$this->assign('nav','localpermitidos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/localpermitidos.js").wait(function(){
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
	<i class="icon-th-list"></i> LocalPermitidos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="localPermitidoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdLocal">Id Local<% if (page.orderBy == 'IdLocal') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_AdicionadoEmLocal">Adicionado Em Local<% if (page.orderBy == 'AdicionadoEmLocal') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Latitude1Local">Latitude1 Local<% if (page.orderBy == 'Latitude1Local') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Longitude1Local">Longitude1 Local<% if (page.orderBy == 'Longitude1Local') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Latitude2Local">Latitude2 Local<% if (page.orderBy == 'Latitude2Local') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS-->
				<th id="header_Longitude2Local">Longitude2 Local<% if (page.orderBy == 'Longitude2Local') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_NomeLocal">Nome Local<% if (page.orderBy == 'NomeLocal') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>

			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idLocal')) %>">
				<td><%= _.escape(item.get('idLocal') || '') %></td>
				<td><%if (item.get('adicionadoEmLocal')) { %><%= _date(app.parseDate(item.get('adicionadoEmLocal'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('latitude1Local') || '') %></td>
				<td><%= _.escape(item.get('longitude1Local') || '') %></td>
				<td><%= _.escape(item.get('latitude2Local') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS-->
				<td><%= _.escape(item.get('longitude2Local') || '') %></td>
				<td><%= _.escape(item.get('nomeLocal') || '') %></td>

			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="localPermitidoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idLocalInputContainer" class="control-group">
					<label class="control-label" for="idLocal">Id Local</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idLocal" placeholder="Id Local" value="<%= _.escape(item.get('idLocal') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="adicionadoEmLocalInputContainer" class="control-group">
					<label class="control-label" for="adicionadoEmLocal">Adicionado Em Local</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="adicionadoEmLocal" type="text" value="<%= _date(app.parseDate(item.get('adicionadoEmLocal'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="adicionadoEmLocal-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('adicionadoEmLocal'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="latitude1LocalInputContainer" class="control-group">
					<label class="control-label" for="latitude1Local">Latitude1 Local</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="latitude1Local" placeholder="Latitude1 Local" value="<%= _.escape(item.get('latitude1Local') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="longitude1LocalInputContainer" class="control-group">
					<label class="control-label" for="longitude1Local">Longitude1 Local</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="longitude1Local" placeholder="Longitude1 Local" value="<%= _.escape(item.get('longitude1Local') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="latitude2LocalInputContainer" class="control-group">
					<label class="control-label" for="latitude2Local">Latitude2 Local</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="latitude2Local" placeholder="Latitude2 Local" value="<%= _.escape(item.get('latitude2Local') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="longitude2LocalInputContainer" class="control-group">
					<label class="control-label" for="longitude2Local">Longitude2 Local</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="longitude2Local" placeholder="Longitude2 Local" value="<%= _.escape(item.get('longitude2Local') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nomeLocalInputContainer" class="control-group">
					<label class="control-label" for="nomeLocal">Nome Local</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nomeLocal" placeholder="Nome Local" value="<%= _.escape(item.get('nomeLocal') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteLocalPermitidoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteLocalPermitidoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete LocalPermitido</button>
						<span id="confirmDeleteLocalPermitidoContainer" class="hide">
							<button id="cancelDeleteLocalPermitidoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteLocalPermitidoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="localPermitidoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit LocalPermitido
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="localPermitidoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveLocalPermitidoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="localPermitidoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newLocalPermitidoButton" class="btn btn-primary">Add LocalPermitido</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

<?php
	$this->assign('title','CORAL | LogLogins');
	$this->assign('nav','loglogins');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/loglogins.js").wait(function(){
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
	<i class="icon-th-list"></i> LogLogins
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="logLoginCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdLogin">Id Login<% if (page.orderBy == 'IdLogin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_DataInicioLogin">Data Inicio Login<% if (page.orderBy == 'DataInicioLogin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_LocalLogin">Local Login<% if (page.orderBy == 'LocalLogin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_PlataformaLogin">Plataforma Login<% if (page.orderBy == 'PlataformaLogin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_TimeZoneLogin">Time Zone Login<% if (page.orderBy == 'TimeZoneLogin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS-->
				<th id="header_DataFimLogin">Data Fim Login<% if (page.orderBy == 'DataFimLogin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_UsuarioCpfUsuario">Usuario Cpf Usuario<% if (page.orderBy == 'UsuarioCpfUsuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_BrowserLogin">Browser Login<% if (page.orderBy == 'BrowserLogin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>

			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idLogin')) %>">
				<td><%= _.escape(item.get('idLogin') || '') %></td>
				<td><%if (item.get('dataInicioLogin')) { %><%= _date(app.parseDate(item.get('dataInicioLogin'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('localLogin') || '') %></td>
				<td><%= _.escape(item.get('plataformaLogin') || '') %></td>
				<td><%if (item.get('timeZoneLogin')) { %><%= _date(app.parseDate(item.get('timeZoneLogin'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS-->
				<td><%if (item.get('dataFimLogin')) { %><%= _date(app.parseDate(item.get('dataFimLogin'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('usuarioCpfUsuario') || '') %></td>
				<td><%= _.escape(item.get('browserLogin') || '') %></td>

			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="logLoginModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idLoginInputContainer" class="control-group">
					<label class="control-label" for="idLogin">Id Login</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idLogin"><%= _.escape(item.get('idLogin') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dataInicioLoginInputContainer" class="control-group">
					<label class="control-label" for="dataInicioLogin">Data Inicio Login</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="dataInicioLogin" type="text" value="<%= _date(app.parseDate(item.get('dataInicioLogin'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="dataInicioLogin-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('dataInicioLogin'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="localLoginInputContainer" class="control-group">
					<label class="control-label" for="localLogin">Local Login</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="localLogin" placeholder="Local Login" value="<%= _.escape(item.get('localLogin') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="plataformaLoginInputContainer" class="control-group">
					<label class="control-label" for="plataformaLogin">Plataforma Login</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="plataformaLogin" placeholder="Plataforma Login" value="<%= _.escape(item.get('plataformaLogin') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="timeZoneLoginInputContainer" class="control-group">
					<label class="control-label" for="timeZoneLogin">Time Zone Login</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="timeZoneLogin" type="text" value="<%= _date(app.parseDate(item.get('timeZoneLogin'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="timeZoneLogin-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('timeZoneLogin'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dataFimLoginInputContainer" class="control-group">
					<label class="control-label" for="dataFimLogin">Data Fim Login</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="dataFimLogin" type="text" value="<%= _date(app.parseDate(item.get('dataFimLogin'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="dataFimLogin-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('dataFimLogin'))).format('h:mm A') %>" />
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
				<div id="browserLoginInputContainer" class="control-group">
					<label class="control-label" for="browserLogin">Browser Login</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="browserLogin" placeholder="Browser Login" value="<%= _.escape(item.get('browserLogin') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteLogLoginButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteLogLoginButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete LogLogin</button>
						<span id="confirmDeleteLogLoginContainer" class="hide">
							<button id="cancelDeleteLogLoginButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteLogLoginButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="logLoginDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit LogLogin
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="logLoginModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveLogLoginButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="logLoginCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newLogLoginButton" class="btn btn-primary">Add LogLogin</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>

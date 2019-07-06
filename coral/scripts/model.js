/**
 * backbone model definitions for CORAL
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false;

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 0;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			} else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			} else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}
		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage) {
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		} else {
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * CategoriaRelato Backbone Model
 */
model.CategoriaRelatoModel = Backbone.Model.extend({
	urlRoot: 'api/categoriarelato',
	idAttribute: 'idCategoria',
	idCategoria: '',
	adiconadoEmCategoria: '',
	iconeCategoria: '',
	ordemCategoria: '',
	nomeCategoria: '',
	defaults: {
		'idCategoria': null,
		'adiconadoEmCategoria': new Date(),
		'iconeCategoria': '',
		'ordemCategoria': '',
		'nomeCategoria': ''
	}
});

/**
 * CategoriaRelato Backbone Collection
 */
model.CategoriaRelatoCollection = model.AbstractCollection.extend({
	url: 'api/categoriarelatos',
	model: model.CategoriaRelatoModel
});

/**
 * DenunciaRelato Backbone Model
 */
model.DenunciaRelatoModel = Backbone.Model.extend({
	urlRoot: 'api/denunciarelato',
	idAttribute: 'idDenunciaRelato',
	idDenunciaRelato: '',
	dataDenunciaRelato: '',
	totalVisualizacaoDenunciaRelato: '',
	totalConfirmacaoExistenciaRelato: '',
	descricaoDenunciaRelato: '',
	tituloDenunciaRelato: '',
	relatoIdRelato: '',
	usuarioCpfUsuario: '',
	defaults: {
		'idDenunciaRelato': null,
		'dataDenunciaRelato': new Date(),
		'totalVisualizacaoDenunciaRelato': '',
		'totalConfirmacaoExistenciaRelato': '',
		'descricaoDenunciaRelato': '',
		'tituloDenunciaRelato': '',
		'relatoIdRelato': '',
		'usuarioCpfUsuario': ''
	}
});

/**
 * DenunciaRelato Backbone Collection
 */
model.DenunciaRelatoCollection = model.AbstractCollection.extend({
	url: 'api/denunciarelatos',
	model: model.DenunciaRelatoModel
});

/**
 * Diretoria Backbone Model
 */
model.DiretoriaModel = Backbone.Model.extend({
	urlRoot: 'api/diretoria',
	idAttribute: 'idDiretoria',
	idDiretoria: '',
	nomeDiretoria: '',
	descricaoDiretoria: '',
	defaults: {
		'idDiretoria': null,
		'nomeDiretoria': '',
		'descricaoDiretoria': ''
	}
});

/**
 * Diretoria Backbone Collection
 */
model.DiretoriaCollection = model.AbstractCollection.extend({
	url: 'api/diretorias',
	model: model.DiretoriaModel
});

/**
 * Funcionario Backbone Model
 */
model.FuncionarioModel = Backbone.Model.extend({
	urlRoot: 'api/funcionario',
	idAttribute: 'matriculaFuncionario',
	matriculaFuncionario: '',
	diretoriaIdDiretoria: '',
	usuarioCpfUsuario: '',
	defaults: {
		'matriculaFuncionario': null,
		'diretoriaIdDiretoria': '',
		'usuarioCpfUsuario': ''
	}
});

/**
 * Funcionario Backbone Collection
 */
model.FuncionarioCollection = model.AbstractCollection.extend({
	url: 'api/funcionarios',
	model: model.FuncionarioModel
});

/**
 * LocalPermitido Backbone Model
 */
model.LocalPermitidoModel = Backbone.Model.extend({
	urlRoot: 'api/localpermitido',
	idAttribute: 'idLocal',
	idLocal: '',
	adicionadoEmLocal: '',
	latitude1Local: '',
	longitude1Local: '',
	latitude2Local: '',
	longitude2Local: '',
	nomeLocal: '',
	defaults: {
		'idLocal': null,
		'adicionadoEmLocal': new Date(),
		'latitude1Local': '',
		'longitude1Local': '',
		'latitude2Local': '',
		'longitude2Local': '',
		'nomeLocal': ''
	}
});

/**
 * LocalPermitido Backbone Collection
 */
model.LocalPermitidoCollection = model.AbstractCollection.extend({
	url: 'api/localpermitidos',
	model: model.LocalPermitidoModel
});

/**
 * LogLogin Backbone Model
 */
model.LogLoginModel = Backbone.Model.extend({
	urlRoot: 'api/loglogin',
	idAttribute: 'idLogin',
	idLogin: '',
	dataInicioLogin: '',
	localLogin: '',
	plataformaLogin: '',
	timeZoneLogin: '',
	dataFimLogin: '',
	usuarioCpfUsuario: '',
	browserLogin: '',
	defaults: {
		'idLogin': null,
		'dataInicioLogin': new Date(),
		'localLogin': '',
		'plataformaLogin': '',
		'timeZoneLogin': '',
		'dataFimLogin': new Date(),
		'usuarioCpfUsuario': '',
		'browserLogin': ''
	}
});

/**
 * LogLogin Backbone Collection
 */
model.LogLoginCollection = model.AbstractCollection.extend({
	url: 'api/loglogins',
	model: model.LogLoginModel
});

/**
 * Relatante Backbone Model
 */
model.RelatanteModel = Backbone.Model.extend({
	urlRoot: 'api/relatante',
	idAttribute: 'usuarioCpfUsuario',
	cadastradoEmRelatante: '',
	usuarioCpfUsuario: '',
	defaults: {
		'cadastradoEmRelatante': new Date(),
		'usuarioCpfUsuario': null
	}
});

/**
 * Relatante Backbone Collection
 */
model.RelatanteCollection = model.AbstractCollection.extend({
	url: 'api/relatantes',
	model: model.RelatanteModel
});

/**
 * Relato Backbone Model
 */
model.RelatoModel = Backbone.Model.extend({
	urlRoot: 'api/relato',
	idAttribute: 'idRelato',
	idRelato: '',
	descricaoRelato: '',
	statusRelato: '',
	latitudeRelato: '',
	longitudeRelato: '',
	tituloRelato: '',
	imagemRelato: '',
	adicionadoEmRelato: '',
	publicadoEmRelato: '',
	logradouro_relato: '',
	complementoRelato: '',
	numeroRelato: '',
	estadoRelato: '',
	bairroRelato: '',
	cidadeRelato: '',
	cep_relato: '',
	categoriaRelatoIdCategoria: '',
	localPermitidoIdLocal: '',
	defaults: {
		'idRelato': null,
		'descricaoRelato': '',
		'statusRelato': '',
		'latitudeRelato': '',
		'longitudeRelato': '',
		'tituloRelato': '',
		'imagemRelato': '',
		'adicionadoEmRelato': new Date(),
		'publicadoEmRelato': new Date(),
		'logradouro_relato': '',
		'complementoRelato': '',
		'numeroRelato': '',
		'estadoRelato': '',
		'bairroRelato': '',
		'cidadeRelato': '',
		'cep_relato': '',
		'categoriaRelatoIdCategoria': '',
		'localPermitidoIdLocal': ''
	}
});

/**
 * Relato Backbone Collection
 */
model.RelatoCollection = model.AbstractCollection.extend({
	url: 'api/relatos',
	model: model.RelatoModel
});

/**
 * Servico Backbone Model
 */
model.ServicoModel = Backbone.Model.extend({
	urlRoot: 'api/servico',
	idAttribute: 'idServico',
	idServico: '',
	tituloServico: '',
	descricaoServico: '',
	diretoriaIdDiretoria: '',
	defaults: {
		'idServico': null,
		'tituloServico': '',
		'descricaoServico': '',
		'diretoriaIdDiretoria': ''
	}
});

/**
 * Servico Backbone Collection
 */
model.ServicoCollection = model.AbstractCollection.extend({
	url: 'api/servicos',
	model: model.ServicoModel
});

/**
 * TipoUsuario Backbone Model
 */
model.TipoUsuarioModel = Backbone.Model.extend({
	urlRoot: 'api/tipousuario',
	idAttribute: 'idTipoUsuario',
	idTipoUsuario: '',
	tituloTipoUsuario: '',
	descricaoTipoUsuario: '',
	defaults: {
		'idTipoUsuario': null,
		'tituloTipoUsuario': '',
		'descricaoTipoUsuario': ''
	}
});

/**
 * TipoUsuario Backbone Collection
 */
model.TipoUsuarioCollection = model.AbstractCollection.extend({
	url: 'api/tipousuarios',
	model: model.TipoUsuarioModel
});

/**
 * Usuario Backbone Model
 */
model.UsuarioModel = Backbone.Model.extend({
	urlRoot: 'api/usuario',
	idAttribute: 'cpfUsuario',
	cpfUsuario: '',
	emailUsuario: '',
	fotoUsuario: '',
	senhaUsuario: '',
	nomeUsuario: '',
	tipoUsuarioIdTipoUsuario: '',
	defaults: {
		'cpfUsuario': null,
		'emailUsuario': '',
		'fotoUsuario': '',
		'senhaUsuario': '',
		'nomeUsuario': '',
		'tipoUsuarioIdTipoUsuario': ''
	}
});

/**
 * Usuario Backbone Collection
 */
model.UsuarioCollection = model.AbstractCollection.extend({
	url: 'api/usuarios',
	model: model.UsuarioModel
});

/**
 * UsuarioRelato Backbone Model
 */
model.UsuarioRelatoModel = Backbone.Model.extend({
	urlRoot: 'api/usuariorelato',
	idAttribute: 'dataUsuarioRelato',
	dataUsuarioRelato: '',
	relatoIdRelato: '',
	relatanteUsuarioCpfUsuario: '',
	defaults: {
		'dataUsuarioRelato': null,
		'relatoIdRelato': '',
		'relatanteUsuarioCpfUsuario': ''
	}
});

/**
 * UsuarioRelato Backbone Collection
 */
model.UsuarioRelatoCollection = model.AbstractCollection.extend({
	url: 'api/usuariorelatos',
	model: model.UsuarioRelatoModel
});


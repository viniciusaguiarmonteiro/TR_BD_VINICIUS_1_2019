<?php
/**
 * @package CORAL
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		'phar://' . GlobalConfig::$APP_ROOT . '/libs/phreeze-3.3.8.phar' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
		
	// CategoriaRelato
	'GET:categoriarelatos' => array('route' => 'CategoriaRelato.ListView'),
	'GET:categoriarelato/(:any)' => array('route' => 'CategoriaRelato.SingleView', 'params' => array('idCategoria' => 1)),
	'GET:api/categoriarelatos' => array('route' => 'CategoriaRelato.Query'),
	'POST:api/categoriarelato' => array('route' => 'CategoriaRelato.Create'),
	'GET:api/categoriarelato/(:any)' => array('route' => 'CategoriaRelato.Read', 'params' => array('idCategoria' => 2)),
	'PUT:api/categoriarelato/(:any)' => array('route' => 'CategoriaRelato.Update', 'params' => array('idCategoria' => 2)),
	'DELETE:api/categoriarelato/(:any)' => array('route' => 'CategoriaRelato.Delete', 'params' => array('idCategoria' => 2)),
		
	// DenunciaRelato
	'GET:denunciarelatos' => array('route' => 'DenunciaRelato.ListView'),
	'GET:denunciarelato/(:any)' => array('route' => 'DenunciaRelato.SingleView', 'params' => array('idDenunciaRelato' => 1)),
	'GET:api/denunciarelatos' => array('route' => 'DenunciaRelato.Query'),
	'POST:api/denunciarelato' => array('route' => 'DenunciaRelato.Create'),
	'GET:api/denunciarelato/(:any)' => array('route' => 'DenunciaRelato.Read', 'params' => array('idDenunciaRelato' => 2)),
	'PUT:api/denunciarelato/(:any)' => array('route' => 'DenunciaRelato.Update', 'params' => array('idDenunciaRelato' => 2)),
	'DELETE:api/denunciarelato/(:any)' => array('route' => 'DenunciaRelato.Delete', 'params' => array('idDenunciaRelato' => 2)),
		
	// Diretoria
	'GET:diretorias' => array('route' => 'Diretoria.ListView'),
	'GET:diretoria/(:num)' => array('route' => 'Diretoria.SingleView', 'params' => array('idDiretoria' => 1)),
	'GET:api/diretorias' => array('route' => 'Diretoria.Query'),
	'POST:api/diretoria' => array('route' => 'Diretoria.Create'),
	'GET:api/diretoria/(:num)' => array('route' => 'Diretoria.Read', 'params' => array('idDiretoria' => 2)),
	'PUT:api/diretoria/(:num)' => array('route' => 'Diretoria.Update', 'params' => array('idDiretoria' => 2)),
	'DELETE:api/diretoria/(:num)' => array('route' => 'Diretoria.Delete', 'params' => array('idDiretoria' => 2)),
		
	// Funcionario
	'GET:funcionarios' => array('route' => 'Funcionario.ListView'),
	'GET:funcionario/(:any)' => array('route' => 'Funcionario.SingleView', 'params' => array('matriculaFuncionario' => 1)),
	'GET:api/funcionarios' => array('route' => 'Funcionario.Query'),
	'POST:api/funcionario' => array('route' => 'Funcionario.Create'),
	'GET:api/funcionario/(:any)' => array('route' => 'Funcionario.Read', 'params' => array('matriculaFuncionario' => 2)),
	'PUT:api/funcionario/(:any)' => array('route' => 'Funcionario.Update', 'params' => array('matriculaFuncionario' => 2)),
	'DELETE:api/funcionario/(:any)' => array('route' => 'Funcionario.Delete', 'params' => array('matriculaFuncionario' => 2)),
		
	// LocalPermitido
	'GET:localpermitidos' => array('route' => 'LocalPermitido.ListView'),
	'GET:localpermitido/(:any)' => array('route' => 'LocalPermitido.SingleView', 'params' => array('idLocal' => 1)),
	'GET:api/localpermitidos' => array('route' => 'LocalPermitido.Query'),
	'POST:api/localpermitido' => array('route' => 'LocalPermitido.Create'),
	'GET:api/localpermitido/(:any)' => array('route' => 'LocalPermitido.Read', 'params' => array('idLocal' => 2)),
	'PUT:api/localpermitido/(:any)' => array('route' => 'LocalPermitido.Update', 'params' => array('idLocal' => 2)),
	'DELETE:api/localpermitido/(:any)' => array('route' => 'LocalPermitido.Delete', 'params' => array('idLocal' => 2)),
		
	// LogLogin
	'GET:loglogins' => array('route' => 'LogLogin.ListView'),
	'GET:loglogin/(:num)' => array('route' => 'LogLogin.SingleView', 'params' => array('idLogin' => 1)),
	'GET:api/loglogins' => array('route' => 'LogLogin.Query'),
	'POST:api/loglogin' => array('route' => 'LogLogin.Create'),
	'GET:api/loglogin/(:num)' => array('route' => 'LogLogin.Read', 'params' => array('idLogin' => 2)),
	'PUT:api/loglogin/(:num)' => array('route' => 'LogLogin.Update', 'params' => array('idLogin' => 2)),
	'DELETE:api/loglogin/(:num)' => array('route' => 'LogLogin.Delete', 'params' => array('idLogin' => 2)),
		
	// Relatante
	'GET:relatantes' => array('route' => 'Relatante.ListView'),
	'GET:relatante/(:any)' => array('route' => 'Relatante.SingleView', 'params' => array('usuarioCpfUsuario' => 1)),
	'GET:api/relatantes' => array('route' => 'Relatante.Query'),
	'POST:api/relatante' => array('route' => 'Relatante.Create'),
	'GET:api/relatante/(:any)' => array('route' => 'Relatante.Read', 'params' => array('usuarioCpfUsuario' => 2)),
	'PUT:api/relatante/(:any)' => array('route' => 'Relatante.Update', 'params' => array('usuarioCpfUsuario' => 2)),
	'DELETE:api/relatante/(:any)' => array('route' => 'Relatante.Delete', 'params' => array('usuarioCpfUsuario' => 2)),
		
	// Relato
	'GET:relatos' => array('route' => 'Relato.ListView'),
	'GET:relato/(:any)' => array('route' => 'Relato.SingleView', 'params' => array('idRelato' => 1)),
	'GET:api/relatos' => array('route' => 'Relato.Query'),
	'POST:api/relato' => array('route' => 'Relato.Create'),
	'GET:api/relato/(:any)' => array('route' => 'Relato.Read', 'params' => array('idRelato' => 2)),
	'PUT:api/relato/(:any)' => array('route' => 'Relato.Update', 'params' => array('idRelato' => 2)),
	'DELETE:api/relato/(:any)' => array('route' => 'Relato.Delete', 'params' => array('idRelato' => 2)),
		
	// Servico
	'GET:servicos' => array('route' => 'Servico.ListView'),
	'GET:servico/(:num)' => array('route' => 'Servico.SingleView', 'params' => array('idServico' => 1)),
	'GET:api/servicos' => array('route' => 'Servico.Query'),
	'POST:api/servico' => array('route' => 'Servico.Create'),
	'GET:api/servico/(:num)' => array('route' => 'Servico.Read', 'params' => array('idServico' => 2)),
	'PUT:api/servico/(:num)' => array('route' => 'Servico.Update', 'params' => array('idServico' => 2)),
	'DELETE:api/servico/(:num)' => array('route' => 'Servico.Delete', 'params' => array('idServico' => 2)),
		
	// TipoUsuario
	'GET:tipousuarios' => array('route' => 'TipoUsuario.ListView'),
	'GET:tipousuario/(:any)' => array('route' => 'TipoUsuario.SingleView', 'params' => array('idTipoUsuario' => 1)),
	'GET:api/tipousuarios' => array('route' => 'TipoUsuario.Query'),
	'POST:api/tipousuario' => array('route' => 'TipoUsuario.Create'),
	'GET:api/tipousuario/(:any)' => array('route' => 'TipoUsuario.Read', 'params' => array('idTipoUsuario' => 2)),
	'PUT:api/tipousuario/(:any)' => array('route' => 'TipoUsuario.Update', 'params' => array('idTipoUsuario' => 2)),
	'DELETE:api/tipousuario/(:any)' => array('route' => 'TipoUsuario.Delete', 'params' => array('idTipoUsuario' => 2)),
		
	// Usuario
	'GET:usuarios' => array('route' => 'Usuario.ListView'),
	'GET:usuario/(:any)' => array('route' => 'Usuario.SingleView', 'params' => array('cpfUsuario' => 1)),
	'GET:api/usuarios' => array('route' => 'Usuario.Query'),
	'POST:api/usuario' => array('route' => 'Usuario.Create'),
	'GET:api/usuario/(:any)' => array('route' => 'Usuario.Read', 'params' => array('cpfUsuario' => 2)),
	'PUT:api/usuario/(:any)' => array('route' => 'Usuario.Update', 'params' => array('cpfUsuario' => 2)),
	'DELETE:api/usuario/(:any)' => array('route' => 'Usuario.Delete', 'params' => array('cpfUsuario' => 2)),
		
	// UsuarioRelato
	'GET:usuariorelatos' => array('route' => 'UsuarioRelato.ListView'),
	'GET:usuariorelato/(:any)' => array('route' => 'UsuarioRelato.SingleView', 'params' => array('dataUsuarioRelato' => 1)),
	'GET:api/usuariorelatos' => array('route' => 'UsuarioRelato.Query'),
	'POST:api/usuariorelato' => array('route' => 'UsuarioRelato.Create'),
	'GET:api/usuariorelato/(:any)' => array('route' => 'UsuarioRelato.Read', 'params' => array('dataUsuarioRelato' => 2)),
	'PUT:api/usuariorelato/(:any)' => array('route' => 'UsuarioRelato.Update', 'params' => array('dataUsuarioRelato' => 2)),
	'DELETE:api/usuariorelato/(:any)' => array('route' => 'UsuarioRelato.Delete', 'params' => array('dataUsuarioRelato' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("DenunciaRelato","fk_DENUNCIA_RELATO_RELATO1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("DenunciaRelato","fk_denuncia_relato_usuario1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Funcionario","fk_FUNCIONARIO_DIRETORIA1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Funcionario","fk_funcionario_usuario1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("LogLogin","fk_LOG_LOGIN_USUARIO1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Relatante","fk_relatante_usuario1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Relato","fk_RELATO_CATEGORIA_RELATO1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Relato","fk_RELATO_LOCAL_PERMITIDO1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Servico","fk_SERVICO_DIRETORIA1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Usuario","fk_USUARIO_TIPO_USUARIO",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("UsuarioRelato","fk_USUARIO_RELATO_RELATO1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("UsuarioRelato","fk_usuario_relato_relatante1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
?>
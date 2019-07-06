<?php
	$this->assign('title','CORAL | Home');
	$this->assign('nav','home');

	$this->display('_Header.tpl.php');
?>
	<div class="container">

		<!-- Main hero unit for a primary marketing message or call to action -->
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="hero-unit">
			<div class="row">
				<div class="span3">
					<h2><i class="icon-cogs"></i>USUÁRIOS</h2>
					<p><a class="btn" href="http://localhost/coral/usuarios">Gerenciar Usuários &raquo;</a></p>
					<p><a class="btn" href="http://localhost/coral/tipousuarios">Gerenciar Tipo Usuários &raquo;</a></p>
					<p><a class="btn" href="http://localhost/coral/relatantes">Gerenciar Relatantes &raquo;</a></p>
					<p><a class="btn" href="http://localhost/coral/funcionarios">Gerenciar Funcionários &raquo;</a></p>
				</div>
				<div class="span3">
					<h2><i class="icon-cogs"></i>RELATOS</h2>
					<p><a class="btn" href="http://localhost/coral/relatos">Gerenciar Relatos &raquo;</a></p>
					<p><a class="btn" href="http://localhost/coral/categoriarelatos">Gerenciar Categorias Relatos &raquo;</a></p>
					<p><a class="btn" href="http://localhost/coral/denunciarelatos">Gerenciar Denúncias Relatos &raquo;</a></p>
					<p><a class="btn" href="http://localhost/coral/relatos">Gerenciar Locais Permitidos Relatos &raquo;</a></p>
			 	</div>
				<div class="span3">
					<h2><i class="icon-cogs"></i>DIRETORIA</h2>
					<p><a class="btn" href="http://localhost/coral/diretorias">Gerenciar Diretorias &raquo;</a></p>
					<p><a class="btn" href="http://localhost/coral/funcionarios">Gerenciar Funciários Diretorias &raquo;</a></p>
					<p><a class="btn" href="http://localhost/coral/servicos">Gerenciar Serviços Diretorias &raquo;</a></p>
				</div>
			</div>
		</div>
	</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jul-2019 às 22:18
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `coral`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_relato`
--

CREATE TABLE `categoria_relato` (
  `Id_Categoria` int(11) NOT NULL,
  `Adiconado_Em_Categoria` datetime NOT NULL,
  `Icone_Categoria` longblob NOT NULL,
  `Ordem_Categoria` int(11) NOT NULL,
  `Nome_Categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria_relato`
--

INSERT INTO `categoria_relato` (`Id_Categoria`, `Adiconado_Em_Categoria`, `Icone_Categoria`, `Ordem_Categoria`, `Nome_Categoria`) VALUES
(1, '2019-07-02 00:00:00', '', 1, 'Foco de dengue'),
(2, '2019-07-02 00:00:00', '', 2, 'Buraco'),
(3, '2019-07-02 00:00:00', '', 3, 'Acessibilidade'),
(4, '2019-07-02 00:00:00', '', 4, 'Iluminação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncia_relato`
--

CREATE TABLE `denuncia_relato` (
  `Id_Denuncia_Relato` int(11) NOT NULL,
  `Data_Denuncia_Relato` datetime NOT NULL,
  `Total_Visualizacao_Denuncia_Relato` int(11) NOT NULL,
  `Total_Confirmacao_Existencia_Relato` int(11) NOT NULL,
  `Descricao_Denuncia_Relato` varchar(10000) NOT NULL,
  `Titulo_Denuncia_Relato` varchar(100) NOT NULL,
  `RELATO_Id_Relato` int(11) NOT NULL,
  `usuario_CPF_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `denuncia_relato`
--

INSERT INTO `denuncia_relato` (`Id_Denuncia_Relato`, `Data_Denuncia_Relato`, `Total_Visualizacao_Denuncia_Relato`, `Total_Confirmacao_Existencia_Relato`, `Descricao_Denuncia_Relato`, `Titulo_Denuncia_Relato`, `RELATO_Id_Relato`, `usuario_CPF_Usuario`) VALUES
(1, '2019-07-05 12:30:00', 0, 0, 'não existe', 'report', 1, 862590167),
(2, '2019-07-05 12:31:00', 0, 0, 'teste', 'treer', 1, 862590167);

-- --------------------------------------------------------

--
-- Estrutura da tabela `diretoria`
--

CREATE TABLE `diretoria` (
  `Id_Diretoria` int(11) NOT NULL,
  `Nome_Diretoria` varchar(100) NOT NULL,
  `Descricao_Diretoria` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `diretoria`
--

INSERT INTO `diretoria` (`Id_Diretoria`, `Nome_Diretoria`, `Descricao_Diretoria`) VALUES
(1, 'Diretoria de Administração (DIRAD)', 'Diretoria de Administração (DIRAD)'),
(2, 'Diretoria de Serviços (DISER)', 'Diretoria de Serviços (DISER)'),
(3, 'Diretoria de Manutenção Predial (DIMAP)', 'Diretoria de Manutenção Predial (DIMAP)'),
(4, 'Diretoria de Manutenção de Equipamentos', 'Diretoria de Manutenção de Equipamentos (DIMEQ)'),
(5, 'Diretoria de Segurança (DISEG)', 'Diretoria de Segurança (DISEG)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `Matricula_Funcionario` int(11) NOT NULL,
  `DIRETORIA_Id_Diretoria` int(11) NOT NULL,
  `usuario_CPF_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`Matricula_Funcionario`, `DIRETORIA_Id_Diretoria`, `usuario_CPF_Usuario`) VALUES
(1, 1, 2013721188);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `listar_denuncia`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `listar_denuncia` (
`Id_Relato` int(11)
,`Descricao_Relato` varchar(10000)
,`Status_Relato` varchar(100)
,`Latitude_Relato` int(45)
,`Longitude_Relato` int(45)
,`Titulo_Relato` varchar(100)
,`Imagem_Relato` longblob
,`Adicionado_Em_Relato` datetime
,`Publicado_Em_Relato` datetime
,`Logradouro__Relato` varchar(100)
,`Complemento_Relato` varchar(100)
,`Numero_Relato` int(11)
,`Estado_Relato` varchar(100)
,`Bairro_Relato` varchar(100)
,`Cidade_Relato` varchar(100)
,`CEP__Relato` int(11)
,`CATEGORIA_RELATO_Id_Categoria` int(11)
,`LOCAL_PERMITIDO_Id_Local` int(11)
,`Id_Denuncia_Relato` int(11)
,`Data_Denuncia_Relato` datetime
,`Total_Visualizacao_Denuncia_Relato` int(11)
,`Total_Confirmacao_Existencia_Relato` int(11)
,`Descricao_Denuncia_Relato` varchar(10000)
,`Titulo_Denuncia_Relato` varchar(100)
,`RELATO_Id_Relato` int(11)
,`usuario_CPF_Usuario` int(11)
,`CPF_Usuario` int(11)
,`Email_Usuario` varchar(100)
,`Foto_Usuario` longblob
,`Senha_Usuario` varchar(20)
,`Nome_Usuario` varchar(100)
,`TIPO_USUARIO_Id_Tipo_Usuario` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `local_permitido`
--

CREATE TABLE `local_permitido` (
  `Id_Local` int(11) NOT NULL,
  `Adicionado_Em_Local` datetime NOT NULL,
  `Latitude1_Local` int(45) NOT NULL,
  `Longitude1_Local` int(45) NOT NULL,
  `Latitude2_Local` int(45) NOT NULL,
  `Longitude2_Local` int(45) NOT NULL,
  `Nome_Local` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `local_permitido`
--

INSERT INTO `local_permitido` (`Id_Local`, `Adicionado_Em_Local`, `Latitude1_Local`, `Longitude1_Local`, `Latitude2_Local`, `Longitude2_Local`, `Nome_Local`) VALUES
(1, '2019-07-02 00:00:00', 1, 1, 2, 2, 'UnB Darcy Ribeiro'),
(2, '2019-07-02 00:00:00', 1, 2, 1, 2, 'UnB - Gama');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_login`
--

CREATE TABLE `log_login` (
  `Id_Login` int(11) NOT NULL,
  `Data_Inicio_Login` datetime NOT NULL,
  `Local_Login` varchar(100) NOT NULL,
  `Plataforma_Login` varchar(100) NOT NULL,
  `Time_Zone_Login` timestamp NOT NULL DEFAULT current_timestamp(),
  `Data_Fim_Login` datetime DEFAULT NULL,
  `usuario_CPF_Usuario` int(11) NOT NULL,
  `Browser_Login` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatante`
--

CREATE TABLE `relatante` (
  `Cadastrado_Em_Relatante` datetime NOT NULL,
  `usuario_CPF_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `relatante`
--

INSERT INTO `relatante` (`Cadastrado_Em_Relatante`, `usuario_CPF_Usuario`) VALUES
('2019-07-02 23:24:00', 862590167);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relato`
--

CREATE TABLE `relato` (
  `Id_Relato` int(11) NOT NULL,
  `Descricao_Relato` varchar(10000) NOT NULL,
  `Status_Relato` varchar(100) NOT NULL,
  `Latitude_Relato` int(45) NOT NULL,
  `Longitude_Relato` int(45) NOT NULL,
  `Titulo_Relato` varchar(100) NOT NULL,
  `Imagem_Relato` longblob NOT NULL,
  `Adicionado_Em_Relato` datetime NOT NULL,
  `Publicado_Em_Relato` datetime NOT NULL,
  `Logradouro__Relato` varchar(100) NOT NULL,
  `Complemento_Relato` varchar(100) NOT NULL,
  `Numero_Relato` int(11) NOT NULL,
  `Estado_Relato` varchar(100) NOT NULL,
  `Bairro_Relato` varchar(100) NOT NULL,
  `Cidade_Relato` varchar(100) NOT NULL,
  `CEP__Relato` int(11) NOT NULL,
  `CATEGORIA_RELATO_Id_Categoria` int(11) NOT NULL,
  `LOCAL_PERMITIDO_Id_Local` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `relato`
--

INSERT INTO `relato` (`Id_Relato`, `Descricao_Relato`, `Status_Relato`, `Latitude_Relato`, `Longitude_Relato`, `Titulo_Relato`, `Imagem_Relato`, `Adicionado_Em_Relato`, `Publicado_Em_Relato`, `Logradouro__Relato`, `Complemento_Relato`, `Numero_Relato`, `Estado_Relato`, `Bairro_Relato`, `Cidade_Relato`, `CEP__Relato`, `CATEGORIA_RELATO_Id_Categoria`, `LOCAL_PERMITIDO_Id_Local`) VALUES
(1, 'luz queimada', 'não resolvida', 1, 2, 'Iluminação RU', 0x433a5c66616b65706174685c436170747572653030312e706e67, '2019-07-02 00:00:00', '2019-07-02 00:00:00', 'UnB', 'Brasília', 10, 'DF', 'Brasília', 'Brasília', 71805718, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `Id_Servico` int(11) NOT NULL,
  `Titulo_Servico` varchar(100) NOT NULL,
  `Descricao_Servico` varchar(10000) NOT NULL,
  `DIRETORIA_Id_Diretoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`Id_Servico`, `Titulo_Servico`, `Descricao_Servico`, `DIRETORIA_Id_Diretoria`) VALUES
(1, 'Administrar', 'administrar', 1),
(2, 'Jardins', 'manutenção jardins', 2),
(3, 'Iluminação', 'manutenção elétrica', 3),
(4, 'Equipamentos', 'Manutenção de equipamentos', 4),
(5, 'Chaves', 'Manutenção de portas', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `Id_Tipo_Usuario` int(11) NOT NULL,
  `Titulo_Tipo_Usuario` varchar(100) DEFAULT NULL,
  `Descricao_Tipo_Usuario` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`Id_Tipo_Usuario`, `Titulo_Tipo_Usuario`, `Descricao_Tipo_Usuario`) VALUES
(1, 'Relatante', 'Usuário que irá relatar os problemas.'),
(2, 'Funcionário', 'Funcionários que irão resolver os relatos cadastrados pelos usuários');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `CPF_Usuario` int(11) NOT NULL,
  `Email_Usuario` varchar(100) NOT NULL,
  `Foto_Usuario` longblob NOT NULL,
  `Senha_Usuario` varchar(20) NOT NULL,
  `Nome_Usuario` varchar(100) NOT NULL,
  `TIPO_USUARIO_Id_Tipo_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`CPF_Usuario`, `Email_Usuario`, `Foto_Usuario`, `Senha_Usuario`, `Nome_Usuario`, `TIPO_USUARIO_Id_Tipo_Usuario`) VALUES
(265660200, 'teste@ase.com', 0x433a5c66616b65706174685c576861747341707020496d61676520323031392d30352d32382061742031372e31322e33322e6a706567, '123', '123', 2),
(862590167, 'viniciusaguiarmonteiro@hotmail.com', '', '1234', 'vinicius', 2),
(2013721188, 'isapinheiro0306@gmail.com', '', '123', '123', 2),
(2013812312, 'teste@teste.com', 0x433a5c66616b65706174685c436170747572653030312e706e67, '123', '123', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_relato`
--

CREATE TABLE `usuario_relato` (
  `Data_Usuario_Relato` datetime NOT NULL,
  `RELATO_Id_Relato` int(11) NOT NULL,
  `relatante_usuario_CPF_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para vista `listar_denuncia`
--
DROP TABLE IF EXISTS `listar_denuncia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listar_denuncia`  AS  select `r`.`Id_Relato` AS `Id_Relato`,`r`.`Descricao_Relato` AS `Descricao_Relato`,`r`.`Status_Relato` AS `Status_Relato`,`r`.`Latitude_Relato` AS `Latitude_Relato`,`r`.`Longitude_Relato` AS `Longitude_Relato`,`r`.`Titulo_Relato` AS `Titulo_Relato`,`r`.`Imagem_Relato` AS `Imagem_Relato`,`r`.`Adicionado_Em_Relato` AS `Adicionado_Em_Relato`,`r`.`Publicado_Em_Relato` AS `Publicado_Em_Relato`,`r`.`Logradouro__Relato` AS `Logradouro__Relato`,`r`.`Complemento_Relato` AS `Complemento_Relato`,`r`.`Numero_Relato` AS `Numero_Relato`,`r`.`Estado_Relato` AS `Estado_Relato`,`r`.`Bairro_Relato` AS `Bairro_Relato`,`r`.`Cidade_Relato` AS `Cidade_Relato`,`r`.`CEP__Relato` AS `CEP__Relato`,`r`.`CATEGORIA_RELATO_Id_Categoria` AS `CATEGORIA_RELATO_Id_Categoria`,`r`.`LOCAL_PERMITIDO_Id_Local` AS `LOCAL_PERMITIDO_Id_Local`,`dr`.`Id_Denuncia_Relato` AS `Id_Denuncia_Relato`,`dr`.`Data_Denuncia_Relato` AS `Data_Denuncia_Relato`,`dr`.`Total_Visualizacao_Denuncia_Relato` AS `Total_Visualizacao_Denuncia_Relato`,`dr`.`Total_Confirmacao_Existencia_Relato` AS `Total_Confirmacao_Existencia_Relato`,`dr`.`Descricao_Denuncia_Relato` AS `Descricao_Denuncia_Relato`,`dr`.`Titulo_Denuncia_Relato` AS `Titulo_Denuncia_Relato`,`dr`.`RELATO_Id_Relato` AS `RELATO_Id_Relato`,`dr`.`usuario_CPF_Usuario` AS `usuario_CPF_Usuario`,`u`.`CPF_Usuario` AS `CPF_Usuario`,`u`.`Email_Usuario` AS `Email_Usuario`,`u`.`Foto_Usuario` AS `Foto_Usuario`,`u`.`Senha_Usuario` AS `Senha_Usuario`,`u`.`Nome_Usuario` AS `Nome_Usuario`,`u`.`TIPO_USUARIO_Id_Tipo_Usuario` AS `TIPO_USUARIO_Id_Tipo_Usuario` from (`relato` `r` left join (`denuncia_relato` `dr` left join `usuario` `u` on(`dr`.`usuario_CPF_Usuario` = `u`.`CPF_Usuario`)) on(`dr`.`RELATO_Id_Relato` = `r`.`Id_Relato`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria_relato`
--
ALTER TABLE `categoria_relato`
  ADD PRIMARY KEY (`Id_Categoria`),
  ADD UNIQUE KEY `Id_Categoria_UNIQUE` (`Id_Categoria`);

--
-- Índices para tabela `denuncia_relato`
--
ALTER TABLE `denuncia_relato`
  ADD PRIMARY KEY (`Id_Denuncia_Relato`,`Data_Denuncia_Relato`,`RELATO_Id_Relato`,`usuario_CPF_Usuario`),
  ADD UNIQUE KEY `Id_Status_Relato_UNIQUE` (`Id_Denuncia_Relato`),
  ADD KEY `fk_DENUNCIA_RELATO_RELATO1_idx` (`RELATO_Id_Relato`),
  ADD KEY `fk_denuncia_relato_usuario1_idx` (`usuario_CPF_Usuario`);

--
-- Índices para tabela `diretoria`
--
ALTER TABLE `diretoria`
  ADD PRIMARY KEY (`Id_Diretoria`),
  ADD UNIQUE KEY `Id_Diretoria_UNIQUE` (`Id_Diretoria`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`Matricula_Funcionario`,`usuario_CPF_Usuario`),
  ADD UNIQUE KEY `Matricula_UNIQUE` (`Matricula_Funcionario`),
  ADD KEY `fk_FUNCIONARIO_DIRETORIA1_idx` (`DIRETORIA_Id_Diretoria`),
  ADD KEY `fk_funcionario_usuario1_idx` (`usuario_CPF_Usuario`);

--
-- Índices para tabela `local_permitido`
--
ALTER TABLE `local_permitido`
  ADD PRIMARY KEY (`Id_Local`),
  ADD UNIQUE KEY `Id_Local_UNIQUE` (`Id_Local`);

--
-- Índices para tabela `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`Id_Login`,`usuario_CPF_Usuario`),
  ADD UNIQUE KEY `Id_Log_Login_UNIQUE` (`Id_Login`),
  ADD KEY `fk_LOG_LOGIN_USUARIO1_idx` (`usuario_CPF_Usuario`) USING BTREE;

--
-- Índices para tabela `relatante`
--
ALTER TABLE `relatante`
  ADD PRIMARY KEY (`usuario_CPF_Usuario`);

--
-- Índices para tabela `relato`
--
ALTER TABLE `relato`
  ADD PRIMARY KEY (`Id_Relato`),
  ADD UNIQUE KEY `Id_Relato_UNIQUE` (`Id_Relato`),
  ADD KEY `fk_RELATO_CATEGORIA_RELATO1_idx` (`CATEGORIA_RELATO_Id_Categoria`),
  ADD KEY `fk_RELATO_LOCAL_PERMITIDO1_idx` (`LOCAL_PERMITIDO_Id_Local`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`Id_Servico`),
  ADD UNIQUE KEY `Id_Servico_UNIQUE` (`Id_Servico`),
  ADD KEY `fk_SERVICO_DIRETORIA1_idx` (`DIRETORIA_Id_Diretoria`);

--
-- Índices para tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`Id_Tipo_Usuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CPF_Usuario`),
  ADD UNIQUE KEY `CPF_UNIQUE` (`CPF_Usuario`),
  ADD UNIQUE KEY `Email_UNIQUE` (`Email_Usuario`),
  ADD KEY `fk_USUARIO_TIPO_USUARIO_idx` (`TIPO_USUARIO_Id_Tipo_Usuario`);

--
-- Índices para tabela `usuario_relato`
--
ALTER TABLE `usuario_relato`
  ADD PRIMARY KEY (`Data_Usuario_Relato`,`RELATO_Id_Relato`,`relatante_usuario_CPF_Usuario`),
  ADD UNIQUE KEY `Data_Usuario_Relato_UNIQUE` (`Data_Usuario_Relato`),
  ADD KEY `fk_USUARIO_RELATO_RELATO1_idx` (`RELATO_Id_Relato`),
  ADD KEY `fk_usuario_relato_relatante1_idx` (`relatante_usuario_CPF_Usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `diretoria`
--
ALTER TABLE `diretoria`
  MODIFY `Id_Diretoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `log_login`
--
ALTER TABLE `log_login`
  MODIFY `Id_Login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `Id_Servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `denuncia_relato`
--
ALTER TABLE `denuncia_relato`
  ADD CONSTRAINT `fk_DENUNCIA_RELATO_RELATO1` FOREIGN KEY (`RELATO_Id_Relato`) REFERENCES `relato` (`Id_Relato`),
  ADD CONSTRAINT `fk_denuncia_relato_usuario1` FOREIGN KEY (`usuario_CPF_Usuario`) REFERENCES `usuario` (`CPF_Usuario`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_FUNCIONARIO_DIRETORIA1` FOREIGN KEY (`DIRETORIA_Id_Diretoria`) REFERENCES `diretoria` (`Id_Diretoria`),
  ADD CONSTRAINT `fk_funcionario_usuario1` FOREIGN KEY (`usuario_CPF_Usuario`) REFERENCES `usuario` (`CPF_Usuario`);

--
-- Limitadores para a tabela `log_login`
--
ALTER TABLE `log_login`
  ADD CONSTRAINT `fk_LOG_LOGIN_USUARIO1` FOREIGN KEY (`USUARIO_CPF_Usuario`) REFERENCES `usuario` (`CPF_Usuario`);

--
-- Limitadores para a tabela `relatante`
--
ALTER TABLE `relatante`
  ADD CONSTRAINT `fk_relatante_usuario1` FOREIGN KEY (`usuario_CPF_Usuario`) REFERENCES `usuario` (`CPF_Usuario`);

--
-- Limitadores para a tabela `relato`
--
ALTER TABLE `relato`
  ADD CONSTRAINT `fk_RELATO_CATEGORIA_RELATO1` FOREIGN KEY (`CATEGORIA_RELATO_Id_Categoria`) REFERENCES `categoria_relato` (`Id_Categoria`),
  ADD CONSTRAINT `fk_RELATO_LOCAL_PERMITIDO1` FOREIGN KEY (`LOCAL_PERMITIDO_Id_Local`) REFERENCES `local_permitido` (`Id_Local`);

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `fk_SERVICO_DIRETORIA1` FOREIGN KEY (`DIRETORIA_Id_Diretoria`) REFERENCES `diretoria` (`Id_Diretoria`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_USUARIO_TIPO_USUARIO` FOREIGN KEY (`TIPO_USUARIO_Id_Tipo_Usuario`) REFERENCES `tipo_usuario` (`Id_Tipo_Usuario`);

--
-- Limitadores para a tabela `usuario_relato`
--
ALTER TABLE `usuario_relato`
  ADD CONSTRAINT `fk_USUARIO_RELATO_RELATO1` FOREIGN KEY (`RELATO_Id_Relato`) REFERENCES `relato` (`Id_Relato`),
  ADD CONSTRAINT `fk_usuario_relato_relatante1` FOREIGN KEY (`relatante_usuario_CPF_Usuario`) REFERENCES `relatante` (`usuario_CPF_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

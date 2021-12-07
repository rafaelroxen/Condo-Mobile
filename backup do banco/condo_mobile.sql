-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Nov-2021 às 02:00
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `condo_mobile`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avisos`
--

CREATE TABLE `avisos` (
  `idAviso` int(11) NOT NULL,
  `descricaoAviso` text NOT NULL,
  `titulo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avisos`
--

INSERT INTO `avisos` (`idAviso`, `descricaoAviso`, `titulo`) VALUES
(1, 'AVISO AO MORADORES', 'Aviso'),
(2, 'Descrição do meu aviso', 'Titulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE `chamados` (
  `idChamado` int(11) NOT NULL,
  `idUsuarioChamado` int(11) NOT NULL,
  `idTipoChamado` int(11) DEFAULT NULL,
  `idNivelChamado` int(11) DEFAULT NULL,
  `idStatusChamado` int(11) DEFAULT NULL,
  `idMotivoCancelamento` int(11) DEFAULT NULL,
  `descricaoChamado` varchar(100) DEFAULT NULL,
  `midiaChamado` varchar(300) DEFAULT NULL,
  `prazo` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`idChamado`, `idUsuarioChamado`, `idTipoChamado`, `idNivelChamado`, `idStatusChamado`, `idMotivoCancelamento`, `descricaoChamado`, `midiaChamado`, `prazo`) VALUES
(1, 1, 2, 1, 1, 5, 'Picos elétricos recorrentes no horário noturno na área da piscina', 'http://localhost/condominio/assets/images/upload/185038_home_house_icon.png', '2021-11-20 21:32:43'),
(2, 1, 1, 1, 1, 5, 'Recorrência de falhas na Hidráulica sistemática do sistema material tico', 'http://localhost/condominio/assets/images/upload/', '2021-11-20 21:33:50'),
(3, 2, 2, 1, 1, 5, 'Verifique que existem problemas elétricos na faixada do prédio.', 'http://localhost/condominio/assets/images/upload/', '2021-11-20 21:52:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado_motivo_cancelamento`
--

CREATE TABLE `chamado_motivo_cancelamento` (
  `idMotivoCancelamento` int(11) NOT NULL,
  `nomeMotivoCancelamento` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chamado_motivo_cancelamento`
--

INSERT INTO `chamado_motivo_cancelamento` (`idMotivoCancelamento`, `nomeMotivoCancelamento`) VALUES
(1, 'Problema Resolvido'),
(2, 'Abertura de Chamado Equivocada'),
(3, 'Reativar Chamado'),
(4, 'Outros Motivos'),
(5, 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `downloads`
--

CREATE TABLE `downloads` (
  `idDownload` int(11) NOT NULL,
  `nomeDownload` varchar(100) NOT NULL,
  `localDownload` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `downloads`
--

INSERT INTO `downloads` (`idDownload`, `nomeDownload`, `localDownload`) VALUES
(1, 'Documento', 'http://localhost/condominio/Documento.txt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivo_cancela_reclamacao`
--

CREATE TABLE `motivo_cancela_reclamacao` (
  `idMotivoCancel` int(11) NOT NULL,
  `descricaoMotivoCancel` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `motivo_cancela_reclamacao`
--

INSERT INTO `motivo_cancela_reclamacao` (`idMotivoCancel`, `descricaoMotivoCancel`) VALUES
(1, 'Resolvido'),
(2, 'Resolvido parcialmente'),
(3, 'Outos Motivos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_chamado`
--

CREATE TABLE `nivel_chamado` (
  `idNivelChamado` int(11) NOT NULL,
  `nomeNivelChamado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nivel_chamado`
--

INSERT INTO `nivel_chamado` (`idNivelChamado`, `nomeNivelChamado`) VALUES
(1, 'Urgente'),
(2, 'Não Urgente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reclamacao`
--

CREATE TABLE `reclamacao` (
  `idReclamacao` int(11) NOT NULL,
  `idUsuarioReclamacao` int(11) NOT NULL,
  `idMotivoCancelReclamacao` int(11) DEFAULT NULL,
  `tituloReclamacao` varchar(300) NOT NULL,
  `descricaoReclamacao` varchar(500) NOT NULL,
  `midiaReclamacao` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reclamacao`
--

INSERT INTO `reclamacao` (`idReclamacao`, `idUsuarioReclamacao`, `idMotivoCancelReclamacao`, `tituloReclamacao`, `descricaoReclamacao`, `midiaReclamacao`) VALUES
(1, 1, 1, 'Titulo de Teste', 'teste', 'http://localhost/condominio/assets/images/upload/185038_home_house_icon (1).png'),
(2, 1, 0, 'Nova Reclamação', 'este é uma descrição de teste para esta reclamação', 'http://localhost/condominio/assets/images/upload/185038_home_house_icon (1).png'),
(3, 2, 0, 'Buracos na Garagem', 'Buraco enorme na garagem esta danificando os carros', 'http://localhost/condominio/assets/images/upload/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `idReserva` int(11) NOT NULL,
  `idUsuarioReserva` int(11) NOT NULL,
  `idTipoReserva` int(11) NOT NULL,
  `diaReserva` date NOT NULL,
  `horaReserva` time NOT NULL,
  `qtConvidadosReserva` int(11) NOT NULL,
  `listaConvidadosReserva` text NOT NULL,
  `protocoloReserva` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`idReserva`, `idUsuarioReserva`, `idTipoReserva`, `diaReserva`, `horaReserva`, `qtConvidadosReserva`, `listaConvidadosReserva`, `protocoloReserva`) VALUES
(2, 1, 1, '2021-11-17', '00:00:00', 0, '', 'reserva?397472'),
(3, 1, 1, '2021-11-23', '10:13:00', 1, 'teste', 'reserva?252888'),
(5, 1, 2, '2021-11-24', '00:00:00', 2, 'milena\r\nana', 'reserva?397347');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_sistema`
--

CREATE TABLE `status_sistema` (
  `idStatus` int(11) NOT NULL,
  `descricaoStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `status_sistema`
--

INSERT INTO `status_sistema` (`idStatus`, `descricaoStatus`) VALUES
(1, 'Não Iniciado'),
(2, 'Em Andamento'),
(3, 'Concluído');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_chamado`
--

CREATE TABLE `tipo_chamado` (
  `idTipoChamado` int(11) NOT NULL,
  `nomeTipoChamado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_chamado`
--

INSERT INTO `tipo_chamado` (`idTipoChamado`, `nomeTipoChamado`) VALUES
(1, 'Hidraulico'),
(2, 'Elétrico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_reserva`
--

CREATE TABLE `tipo_reserva` (
  `idTipoReserva` int(11) NOT NULL,
  `nomeTipoReserva` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_reserva`
--

INSERT INTO `tipo_reserva` (`idTipoReserva`, `nomeTipoReserva`) VALUES
(1, 'Piscina'),
(2, 'Salão de Festas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(300) NOT NULL,
  `telfoneUsuario` varchar(50) NOT NULL,
  `emailUsuario` varchar(300) NOT NULL,
  `senhaUsuario` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomeUsuario`, `telfoneUsuario`, `emailUsuario`, `senhaUsuario`) VALUES
(1, 'teste', '95195720', 'teste@123', '202cb962ac59075b964b07152d234b70'),
(2, 'Fulano', '95195720', 'fulano@teste.com', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`idAviso`);

--
-- Índices para tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`idChamado`);

--
-- Índices para tabela `chamado_motivo_cancelamento`
--
ALTER TABLE `chamado_motivo_cancelamento`
  ADD PRIMARY KEY (`idMotivoCancelamento`);

--
-- Índices para tabela `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`idDownload`);

--
-- Índices para tabela `motivo_cancela_reclamacao`
--
ALTER TABLE `motivo_cancela_reclamacao`
  ADD PRIMARY KEY (`idMotivoCancel`);

--
-- Índices para tabela `nivel_chamado`
--
ALTER TABLE `nivel_chamado`
  ADD PRIMARY KEY (`idNivelChamado`);

--
-- Índices para tabela `reclamacao`
--
ALTER TABLE `reclamacao`
  ADD PRIMARY KEY (`idReclamacao`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idReserva`);

--
-- Índices para tabela `status_sistema`
--
ALTER TABLE `status_sistema`
  ADD PRIMARY KEY (`idStatus`);

--
-- Índices para tabela `tipo_chamado`
--
ALTER TABLE `tipo_chamado`
  ADD PRIMARY KEY (`idTipoChamado`);

--
-- Índices para tabela `tipo_reserva`
--
ALTER TABLE `tipo_reserva`
  ADD PRIMARY KEY (`idTipoReserva`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avisos`
--
ALTER TABLE `avisos`
  MODIFY `idAviso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `idChamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `chamado_motivo_cancelamento`
--
ALTER TABLE `chamado_motivo_cancelamento`
  MODIFY `idMotivoCancelamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `downloads`
--
ALTER TABLE `downloads`
  MODIFY `idDownload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `motivo_cancela_reclamacao`
--
ALTER TABLE `motivo_cancela_reclamacao`
  MODIFY `idMotivoCancel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `nivel_chamado`
--
ALTER TABLE `nivel_chamado`
  MODIFY `idNivelChamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `reclamacao`
--
ALTER TABLE `reclamacao`
  MODIFY `idReclamacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `status_sistema`
--
ALTER TABLE `status_sistema`
  MODIFY `idStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipo_chamado`
--
ALTER TABLE `tipo_chamado`
  MODIFY `idTipoChamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipo_reserva`
--
ALTER TABLE `tipo_reserva`
  MODIFY `idTipoReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo BASE.'assets/css/style.css'?>">
	<title>Condo Mobile</title>
</head>
<body>
	<div class="cont-menu">
		<div class="menu-left">
			<div style="font-size:14px;color:#fff;display:flex;flex-direction:column;align-items:center">
				<a href="<?php echo BASE; ?>" style="font-size:14px;color:#fff;display:flex;flex-direction:column;align-items:center">
					<img src="<?php echo BASE.'assets/images/home.png'; ?>" alt="Ínicio">
					Ínicio
				</a>
			</div>
			<div style="font-size:14px;color:#fff;display:flex;flex-direction:column;align-items:center">
				<img onclick="mostraMenu();" src="<?php echo BASE.'assets/images/list.png'; ?>" alt="menu-responsivo">
				Menu
			</div>
			<div style="font-size:14px;color:#fff;display:flex;flex-direction:column;align-items:center">
				<a href="<?php echo BASE.'home/sair'; ?>" style="font-size:14px;color:#fff;display:flex;flex-direction:column;align-items:center">
					<img src="<?php echo BASE.'assets/images/sair.png'; ?>" alt="Ínicio">
					Sair
				</a>
			</div>
			<h2 style="margin:0 0 0 20px"><a href="#">Condo Mobile</a></h2>
		</div>
	</div>
	<div class="cont-submenu">
		<div class="submenu" id="submenu">
			<ul>
				<li><a href="<?php echo BASE.'reserva'; ?>">Fazer Reservas</a></li>
				<li><a href="<?php echo BASE.'verreserva'; ?>">Cancelar Reserva</a></li>
				<li><a href="<?php echo BASE.'chamado'; ?>">Abrir Chamado</a></li>
				<li><a href="<?php echo BASE.'verchamados'; ?>">Consultar Chamado</a></li>
				<li><a href="<?php echo BASE.'verchamados'; ?>">Cancelar Chamado</a></li>
				<li><a href="<?php echo BASE.'avisos'; ?>">Verificar Avisos</a></li>
				<li><a href="<?php echo BASE.'download'; ?>">Consultar Regimento</a></li>
				<li><a href="<?php echo BASE.'reclamacao'; ?>">Registrar Reclamação</a></li>
				<li><a href="<?php echo BASE.'verreclamacao'; ?>">Cancelar Reclamação</a></li>
			</ul>
		</div>
	</div>
	<?php

		$this->loadViewInTemplate($view, $viewData);

	?>
</body>
<script src="<?php echo BASE.'assets/js/script.js'; ?>"></script>
</html>
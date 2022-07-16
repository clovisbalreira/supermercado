<?php
require_once '../model/Acesso.php';
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Gestão Supermercado - Home</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
	<div class="wrapper">		
		<div class="main">
			<main class="content">
			<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"></h1>						
					</div>

					<form action="../controller/registrar.php" method="GET">
						<div class="row">
							<div class="col-12 col-lg-12">
								<h1>Login</h1>
								<div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Nome:</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" placeholder="Digite seu nome completo" name="nome" required>
                                    </div>
                                </div>						
							</div>
							<div class="col-12 col-lg-12">
								<div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Senha:</h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="password" class="form-control" placeholder="Digite sua senha" name="senha" required>
                                    </div>
                                </div>		
								<a href="cadastrar.php">Cadastra-se</a>
							</div>
							<div class="col-12 col-lg-12" style="text-align:right;">
								<button name="cadastroAcesso" value="1"  type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
							</div>
						</div>
					</form>
				</div>	
			</main>
			<footer class="footer">
				<?php require_once '../components/footer.php'; ?>
			</footer>
		</div>
	</div>
	<script src="js/app.js"></script>
</body>

</html>
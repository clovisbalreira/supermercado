<?php
	require_once '../model/Segmento.php';
	include "../controller/deletar.php";
	include "../components/inputs.php";
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

	<title>Gestão Supermercado - Segmento</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<?php require_once '../components/menu.php'; ?>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<?php require_once '../components/header.php'; ?>
			</nav>
			<main class="content">
				<?php
					deletar('nome','segmento');
				?>
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"></h1>						
					</div>
					<form action="../controller/registrar.php" method="GET">
						<div class="row">
							<div class="col-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Segmento:</h5>
                                    </div>
                                    <div class="card-body">
										<input type="hidden" name="codigo" value="<?Php echo isset($_GET['codigoEditar']) ? $_GET['codigoEditar'] : '' ?>">
                                        <input type="text" class="form-control" placeholder="Digite seu o segmento" name="nome" value="<?Php echo isset($_GET['nomeEditar']) ? $_GET['nomeEditar'] : '' ?>" required>
                                    </div>
                                </div>
                            </div>
							<div class="col-12 col-lg-12" style="text-align:right;">
							<?php echo botao("cadastroSegmento")?>
							</div>
						</div>
					</form>
					<form action="#" method="get" style="margin-top: 20px; margin-bottom: 20px;">
						<div class="row">
							<div class="col-12 col-lg-8">
								<input type="text" class="form-control" placeholder="Pesquisa" name="procurar">
							</div>
							<div class="col-12 col-lg-2" style="text-align:right;">
								<button type="cancel" class="btn btn-primary btn-lg-12">Mostrar tudo</button>
							</div>
							<div class="col-12 col-lg-2" style="text-align:right;">
								<button type="submit" class="btn btn-primary btn-lg-12">Pesquisar</button>
							</div>
						</div>
					</form>
					<?php if (!empty($_SESSION['segmento'])) { ?>
						<table class="table">
							<thead>
								<th scope="col">Codigo</th>
								<th scope="col">Nome</th>
								<th scope="col">Editar</th>
								<th scope="col">Deletar</th>
							</thead>
							<tbody>
								<?php foreach ($_SESSION['segmento'] as $segmento) { ?>
									<?php if (empty($_GET['procurar']) or (str_contains($segmento->getNome(), $_GET['procurar']))) { ?>
										<tr>
											<td><?php echo $segmento->getCodigo(); ?></td>
											<td><?php echo $segmento->getNome(); ?></td>
											<td>
												<form action="#" method="get">
													<input type="hidden" name="codigoEditar" value="<?php echo $segmento->getCodigo(); ?>">
													<input type="hidden" name="nomeEditar" value="<?php echo $segmento->getNome(); ?>">
													<button type="submit" class="btn btn-primary">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
															<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
															<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
														</svg>
													</button>
												</form>
											</td>
											<td>
												<?php echo botaoTabelaDeletar($segmento->getCodigo(), $segmento->getNome(), 'codigo', 'nome')?>
											</td>
										</tr>
									<?php } ?>
								<?php } ?>
							</tbody>
						</table>
					<?php }; ?>
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
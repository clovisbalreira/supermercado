<?php
	require_once '../model/Fornecedor.php';
	require_once '../model/Marca.php';
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

	<title>Gestão Supermercado - Marca</title>

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
					deletar('marca');
				?>
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"></h1>						
					</div>
					<form action="../controller/registrar.php" method="GET">
						<div class="row">
							<h1>Marca <span id="mensagem" onmouseover="mostrarInformacoes('Cadastre as marcas dos produtos e seus fornecedores.<br>Ex. Pepsi, charge etc...')" onmouseout="tirarInformacoes()" style="background-color: red; padding: 2px 10px; border-radius: 50%;">?</span></h1>
							<div class="col-12 col-lg-6">
								<div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Nome:</h5>
                                    </div>
                                    <div class="card-body">
										<input type="hidden" name="codigo" value="<?Php echo isset($_GET['codigoEditar']) ? $_GET['codigoEditar'] : '' ?>">
                                        <input type="text" class="form-control" placeholder="Digite seu nome da marca" name="nome" value="<?Php echo isset($_GET['nomeEditar']) ? $_GET['nomeEditar'] : '' ?>" required>
                                    </div>
                                </div>						
							</div>
							<div class="col-12 col-lg-6">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Fornecedor</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="fornecedor" required>
											<option value="">Selecione o fornecedor</option>
											<?php foreach( $_SESSION['fornecedor'] as $fornecedor){?>
												<option value="<?php echo $fornecedor->getNome(); ?>"  <?php if ($fornecedor->getNome() == $_GET['fornecedorEditar']) { echo 'selected';} ?>><?php echo $fornecedor->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>					
							</div>
							<div class="col-12 col-lg-12" style="text-align:right;">
								<?php echo botao("cadastroMarca")?>
							</div>
						</div>
					</form>
					<form action="#" method="get" style="margin-top: 20px; margin-bottom: 20px;">
						<div class="row">
							<div class="col-12 col-lg-8" style="margin-bottom: 10px;">
								<input type="text" class="form-control" placeholder="Pesquisa" name="procurar">
							</div>
							<div class="col-12 col-lg-2" style="text-align:right; margin-bottom: 10px;">
								<button type="cancel" class="btn btn-primary btn-lg-12">Mostrar tudo</button>
							</div>
							<div class="col-12 col-lg-2" style="text-align:right; margin-bottom: 10px;">
								<button type="submit" class="btn btn-primary btn-lg-12">Pesquisar</button>
							</div>
						</div>
					</form>
					<?php if (!empty($_SESSION['marca'])) { ?>
						<table class="table">
							<thead>
								<th scope="col">Nome</th>
								<th scope="col">Fornecedor</th>
								<th scope="col">Editar</th>
								<th scope="col">Deletar</th>
							</thead>
							<tbody>
								<?php foreach ($_SESSION['marca'] as $marca) { ?>
									<?php if (empty($_GET['procurar']) or (str_contains($marca->getNome(), $_GET['procurar'])) or (str_contains($marca->getFornecedor(), $_GET['procurar'])) ) { ?>
										<tr>
											<td><?php echo $marca->getNome(); ?></td>
											<td><?php echo $marca->getFornecedor() ?></td>
											<td>
												<form action="#" method="get">
													<input type="hidden" name="codigoEditar" value="<?php echo $marca->getCodigo(); ?>">
													<input type="hidden" name="nomeEditar" value="<?php echo $marca->getNome(); ?>">
													<input type="hidden" name="fornecedorEditar" value="<?php echo $marca->getFornecedor(); ?>">
													<button type="submit" class="btn btn-primary">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
															<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
															<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
														</svg>
													</button>
												</form>
											</td>
											<td>
												<?php echo botaoTabelaDeletar($marca->getCodigo())?>							
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
	<script src="../js/funcao.js"></script>
</body>

</html>
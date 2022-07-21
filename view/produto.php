<?php
	require_once '../model/Produto.php';
	require_once '../model/Fornecedor.php';
	require_once '../model/Marca.php';
	require_once '../model/Segmento.php';
	require_once '../model/TipoSegmento.php';
	require_once '../model/TipoProduto.php';
	require_once '../model/SaborAroma.php';
	require_once '../model/Tamanho.php';
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

	<title>Gestão Supermercado - Produtos</title>

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
					deletar('produto');
				?>
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"></h1>						
					</div>
					<form action="../controller/registrar.php" method="GET">
						<div class="row">
							<h1>Produto <span id="mensagem" onmouseover="mostrarInformacoes('Cadastre os produtos e seus atributos.')" onmouseout="tirarInformacoes()" style="background-color: red; padding: 2px 10px; border-radius: 50%;">?</span></h1>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Fornecedor</h5>
									</div>
									<div class="card-body">
										<input type="hidden" name="codigo" value="<?Php echo isset($_GET['codigoEditar']) ? $_GET['codigoEditar'] : '' ?>">
										<select class="form-select mb-3" id="fornecedor" name="fornecedor" required>
											<option value="">Selecione o fornecedor</option>
											<?php foreach( $_SESSION['fornecedor'] as $fornecedor){?>
												<option value="<?php echo $fornecedor->getNome(); ?>" <?php if ($fornecedor->getNome() == $_GET['fornecedorEditar']) { echo 'selected';} ?>><?php echo $fornecedor->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>														
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Marca</h5>
									</div>
									<div class="card-body">
										<input type="hidden" name="codigo" value="<?Php echo isset($_GET['codigoEditar']) ? $_GET['codigoEditar'] : '' ?>">
										<select class="form-select mb-3" name="marca" required>
											<option value="">Selecione a marca</option>
											<?php foreach( $_SESSION['marca'] as $marca){?>
												<option value="<?php echo $marca->getNome(); ?>" <?php if ($marca->getNome() == $_GET['marcaEditar']) { echo 'selected';} ?>><?php echo $marca->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>						
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Tipo de Segmento</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="tipoSegmento" required>
											<option value="">Selecione o tipo de segmento</option>
											<?php foreach( $_SESSION['tipoSegmento'] as $tipoSegmento){?>
												<option value="<?php echo $tipoSegmento->getNome(); ?>" <?php if ($tipoSegmento->getNome() == $_GET['tipoSegmentoEditar']) { echo 'selected';} ?>><?php echo $tipoSegmento->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>						
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Tipo produto</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="tipoProduto" required>
											<option value="">Selecione o tipo de produto</option>
											<?php foreach( $_SESSION['tipoProduto'] as $tipoProduto){?>
												<option value="<?php echo $tipoProduto->getNome(); ?>" <?php if ($tipoProduto->getNome() == $_GET['tipoProdutoEditar']) { echo 'selected';} ?>><?php echo $tipoProduto->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>						
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Sabor/Aroma</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="saborAroma" required>
											<option value="">Selecione o sabor ou aroma</option>
											<?php foreach( $_SESSION['saborAroma'] as $saborAroma){?>
												<option value="<?php echo $saborAroma->getNome(); ?>" <?php if ($saborAroma->getNome() == $_GET['saborAromaEditar']) { echo 'selected';} ?>><?php echo $saborAroma->getNome(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>						
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Tamanho</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="tamanho" required>
											<option value="">Selecione o tamanho</option>
											<?php foreach( $_SESSION['tamanho'] as $tamanho){?>
												<option value="<?php echo $tamanho->getTamanho().' '.$tamanho->getMedida(); ?>" <?php if ($tamanho->getTamanho().' '.$tamanho->getMedida() == $_GET['tamanhoEditar']) { echo 'selected';} ?>><?php echo $tamanho->getTamanho().' '.$tamanho->getMedida(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>						
							</div>
							<div class="col-12 col-lg-12" style="text-align:right;">
								<?php echo botao("cadastroProduto")?>
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
					<?php if (!empty($_SESSION['produto'])) { ?>
						<table class="table">
							<thead>
								<th scope="col">Fornecedor</th>
								<th scope="col">Marca</th>
								<th scope="col">Segmento</th>
								<th scope="col">Tipo Produto</th>
								<th scope="col">Sabor/Aroma</th>
								<th scope="col">Tamanho</th>
								<th scope="col">Editar</th>
								<th scope="col">Deletar</th>
							</thead>
							<tbody>
								<?php foreach ($_SESSION['produto'] as $produto) { ?>
									<?php if (empty($_GET['procurar']) or (str_contains($produto->getFornecedor(), $_GET['procurar'])) or (str_contains($produto->getMarca(), $_GET['procurar'])) or (str_contains($produto->getTipoSegmento(), $_GET['procurar'])) or (str_contains($produto->getTipoProduto(), $_GET['procurar'])) or (str_contains($produto->getSaborAroma(), $_GET['procurar'])) or (str_contains($produto->getTamanho(), $_GET['procurar']))) { ?>
										<tr>
											<td><?php echo $produto->getFornecedor(); ?></td>
											<td><?php echo $produto->getMarca(); ?></td>
											<td><?php echo $produto->getTipoSegmento(); ?></td>
											<td><?php echo $produto->getTipoProduto(); ?></td>
											<td><?php echo $produto->getSaborAroma(); ?></td>
											<td><?php echo $produto->getTamanho(); ?></td>
											<td>
												<form action="#" method="get">
													<input type="hidden" name="codigoEditar" value="<?php echo $produto->getCodigo(); ?>">
													<input type="hidden" name="fornecedorEditar" value="<?php echo $produto->getFornecedor(); ?>">
													<input type="hidden" name="marcaEditar" value="<?php echo $produto->getMarca(); ?>">
													<input type="hidden" name="tipoSegmentoEditar" value="<?php echo $produto->getTipoSegmento(); ?>">
													<input type="hidden" name="tipoProdutoEditar" value="<?php echo $produto->getTipoProduto(); ?>">
													<input type="hidden" name="saborAromaEditar" value="<?php echo $produto->getSaborAroma(); ?>">
													<input type="hidden" name="tamanhoEditar" value="<?php echo $produto->getTamanho(); ?>">
													<button type="submit" class="btn btn-primary">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
															<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
															<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
														</svg>
													</button>
												</form>
											</td>
											<td>
												<?php echo botaoTabelaDeletar($produto->getCodigo())?>
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
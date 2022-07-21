<?php
require_once '../model/Contas.php';
require_once '../model/Produto.php';
require_once '../model/TipoPagamento.php';
include "../controller/deletar.php";
include "../components/inputs.php";
include "../php/funcao.php";
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

	<title>Gestão Supermercado - Contas

	</title>

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
					deletar('contas');
				?>
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"></h1>
					</div>
					<form action="../controller/registrar.php" method="GET">
						<div class="row">
							<h1>Contas <span id="mensagem" onmouseover="mostrarInformacoes('Cadastre os contas do super mercado.<br>Selecione se a conta vai ser um patrimonio.')" onmouseout="tirarInformacoes()" style="background-color: red; padding: 2px 10px; border-radius: 50%;">?</span></h1>
							<div class="col-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Contas</h5>
									</div>
									<div class="card-body">
										<input type="hidden" name="codigo" value="<?Php echo isset($_GET['codigoEditar']) ? $_GET['codigoEditar'] : '' ?>">
										<input class="form-control" type="text" name="nome" value="<?Php echo isset($_GET['nomeEditar']) ? $_GET['nomeEditar'] : '' ?>" list="listacontas" <?php echo isset($_GET['nomeEditar']) ? 'readonly' : '' ?>  required>
										<datalist id="listacontas">
											<option value="Luz">Luz</option>
											<option value="Agua">Agua</option>
											<option value="Internet">Internet</option>
											<option value="Aluguel">Aluguel</option>
										</datalist>  
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Preço</h5>
									</div>
									<div class="card-body">
										<input onkeyup="precoContas()" onchange="precoContas()" type="number" step="0.01" class="form-control" placeholder="Digite o valor" id="preco" name="preco" value="<?Php echo isset($_GET['precoEditar']) ? number_format($_GET['precoEditar'],2) : '' ?>" min="0" required>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Tipo pagamento</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="tipoPagamento" required>
											<option value="">Selecione o tipo de pagamento</option>
											<?php foreach ($_SESSION['tipoPagamento'] as $tipopagamento) { ?>
												<option value="<?php echo $tipopagamento->getTipo().' - Parcelas '.$tipopagamento->getParcelas().' - Dias '.$tipopagamento->getDias(); ?>" <?php if ($tipopagamento->getTipo().' - Parcelas '.$tipopagamento->getParcelas().' - Dias '.$tipopagamento->getDias() == $_GET['tipoPagamentoEditar']) { echo 'selected';}; ?>><?php echo $tipopagamento->getTipo().' - Parcelas '.$tipopagamento->getParcelas().' - Dias '.$tipopagamento->getDias(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Dia do pagamento</h5>
									</div>
									<div class="card-body">
										<input type="date" class="form-control" name="diaPagamento" value="<?Php echo isset($_GET['diaPagamentoEditar']) ? $_GET['diaPagamentoEditar'] : date('Y-m-d') ?>" required readonly>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-2">
								<div class="card">
									<div class="form-check">
										<div class="card-header">
											<h5 class="card-title mb-0">Tipo</h5>
										</div>
										<div class="card-body">
											<input class="form-check-input" type="radio" name="tipo" value="conta" id="flexRadioDefault1" checked>
											<label class="form-check-label" for="flexRadioDefault1">
												Conta
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="tipo" value="patrimonio" id="flexRadioDefault2" <?php if ( 'patrimonio' == $_GET['tipoEditar']) { echo 'checked';}; ?>>
											<label class="form-check-label" for="flexRadioDefault2">
												Patrimonio
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-12" style="text-align:right;">
								<?php echo botao("cadastroContas")?>
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
					<?php
						$possui = mostrarTabelaContas('conta');
						$possuiPatrimonio = mostrarTabelaContas('patrimonio');
						if ((!empty($_SESSION['contas'])) and ($possui or $possuiPatrimonio)) { ?>
						<table class="table">
							<thead>
								<th scope="col">Produto</th>
								<th scope="col">Preço</th>
								<th scope="col">Tipo Pagamento</th>
								<th scope="col">Data Pagamento</th>
								<th scope="col">Editar</th>
								<th scope="col">Deletar</th>
							</thead>
							<tbody>
								<?php foreach ($_SESSION['contas'] as $contas) { ?>
									<?php if (empty($_GET['procurar']) or (str_contains($contas->getProduto(), $_GET['procurar'])) or (str_contains($contas->getQuantidade(), $_GET['procurar'])) or (str_contains($contas->getPreco(), $_GET['procurar'])) or (str_contains($contas->getData(), $_GET['procurar'])) or (str_contains($contas->getTipoPagamento(), $_GET['procurar'])) or (str_contains($contas->getDataPagamento(), $_GET['procurar']))) { ?>
										<?php if ($contas->getTipoConta() == 'conta' or $contas->getTipoConta() == 'patrimonio') { ?>
											<tr>
												<td><?php echo $contas->getProduto(); ?></td>
												<td><?php echo 'R$: ' . number_format($contas->getPreco(), 2, ',', '.'); ?></td>
												<td><?php echo $contas->getTipoPagamento() ?></td>
												<td><?php echo date('d/m/Y', strtotime($contas->getDataPagamento())); ?></td>
												<td>
													<form action="#" method="get">
														<input type="hidden" name="codigoEditar" value="<?php echo $contas->getCodigo(); ?>">
														<input type="hidden" name="nomeEditar" value="<?php echo $contas->getProduto(); ?>">
														<input type="hidden" name="precoEditar" value="<?php echo $contas->getPreco(); ?>">
														<input type="hidden" name="tipoPagamentoEditar" value="<?php echo $contas->getTipoPagamento(); ?>">
														<input type="hidden" name="diaPagamentoEditar" value="<?php echo $contas->getDataPagamento(); ?>">
														<input type="hidden" name="tipoEditar" value="<?php echo $contas->getTipoConta(); ?>">
														<button type="submit" class="btn btn-primary">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
																<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
																<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
															</svg>
														</button>
													</form>
												</td>
												<td>
													<?php echo botaoTabelaDeletar($contas->getCodigo())?>
												</td>
											</tr>
										<?php } ?>
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
<?php
	require_once '../model/Contas.php';
	require_once '../model/Estoque.php';
	require_once '../model/Produto.php';
	require_once '../model/TipoPagamento.php';
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

	<title>Gestão Supermercado - Compras
		
	</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
					if (isset($_GET['codigo']) and isset($_GET['produto'])) {
						unset($_SESSION['contas'][$_GET['codigo']]);
				}
				?>
				<div class="container-fluid p-0">
					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"></h1>						
					</div>
					<form action="../controller/registrar.php" method="GET">
						<div class="row">
							<div class="col-12 col-lg-10">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Produto</h5>
									</div>
									<div class="card-body">
										<input type="hidden" name="codigo" value="<?Php echo isset($_GET['codigoEditar']) ? $_GET['codigoEditar'] : '' ?>">
										<select class="form-select mb-3" id="produto" name="produto" required>
											<option value="">Selecione o produto</option>
											<?php foreach( $_SESSION['estoque'] as $estoque){?>
												<option value="<?php echo $estoque->getProduto(); ?>" <?php if ($estoque->getProduto() == $_GET['produtoEditar']) { echo 'selected';} ?>><?php echo $estoque->getProduto(); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-2">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Quantidade:</h5>
									</div>
									<div class="card-body">
										<input onkeyup="precoContas()" onchange="precoContas()" type="number" min="0" class="form-control" id="quantidade" name="quantidade" value="<?Php echo isset($_GET['quantidadeEditar']) ? $_GET['quantidadeEditar'] : '' ?>" min="0" required>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Preço unitario:</h5>
									</div>
									<div class="card-body">
										<input onkeyup="precoContas()" onchange="precoContas()" type="number" step="0.01" class="form-control" placeholder="Digite o valor" id="preco" name="preco" value="<?Php echo isset($_GET['precoEditar']) ? $_GET['precoEditar'] : '' ?>" min="0">
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Preço Total:</h5>
									</div>
									<div class="card-body">
										<input type="number" step="0.01" class="form-control" placeholder="Valor total" id="precototal" name="precototal" value="<?Php echo isset($_GET['precoTotalEditar']) ? $_GET['precoTotalEditar'] : '' ?>" readonly>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-3">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title mb-0">Tipo pagamento</h5>
									</div>
									<div class="card-body">
										<select class="form-select mb-3" name="tipoPagamento" required>
											<option value="">Selecione o tipo de pagamento</option>
											<?php foreach( $_SESSION['tipoPagamento'] as $tipopagamento){?>
												<option value="<?php echo $tipopagamento->getTipo().' - Parcelas '.$tipopagamento->getParcelas().' - Dias '.$tipopagamento->getDias(); ?>" <?php if ($tipopagamento->getTipo() == $_GET['pagamentoEditar']) { echo 'selected';}; ?>><?php echo $tipopagamento->getTipo().' - Parcelas '.$tipopagamento->getParcelas().' - Dias '.$tipopagamento->getDias(); ?></option>
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
										<input type="date" class="form-control" name="diaPagamento" value="<?Php echo isset($_GET['diaPagamentoEditar']) ? $_GET['diaPagamentoEditar'] : date('Y-m-d') ?>" required>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-12" style="text-align:right;">
								<button name="cadastroVendas" value="1" type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
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
					<?php if (!empty($_SESSION['contas'])) { ?>
						<table class="table">
							<thead>
								<th scope="col">Codigo</th>
								<th scope="col">Produto</th>
								<th scope="col">Quantidade</th>
								<th scope="col">Preço</th>
								<th scope="col">Preço Total</th>
								<th scope="col">Data</th>
								<th scope="col">Tipo Pagamento</th>
								<th scope="col">Data Pagamento</th>
								<th scope="col">Editar</th>
								<th scope="col">Deletar</th>
							</thead>
							<tbody>
								<?php foreach ($_SESSION['contas'] as $contas) { ?>
									<?php if (empty($_GET['procurar']) or (str_contains($contas->getProduto(), $_GET['procurar'])) or (str_contains($contas->getQuantidade(), $_GET['procurar'])) or (str_contains($contas->getPreco(), $_GET['procurar'])) or (str_contains($contas->getData(), $_GET['procurar'])) or (str_contains($contas->getTipoPagamento(), $_GET['procurar'])) or (str_contains($contas->getDataPagamento(), $_GET['procurar'])) ) { ?>
                                        <?php if($contas->getTipoConta() == 'credito'){ ?>
										<tr>
                                            <?php $soma = $contas->getPreco() / $contas->getQuantidade() ; ?>
											<td><?php echo $contas->getCodigo(); ?></td>
											<td><?php echo $contas->getProduto(); ?></td>
											<td><?php echo $contas->getQuantidade() ?></td>
											<td><?php echo 'R$: ' . number_format($soma, 2, ',', '.'); ?></td>
											<td><?php echo 'R$: ' . number_format($contas->getPreco(), 2, ',', '.'); ?></td>
											<td><?php echo date('d/m/Y', strtotime($contas->getData())); ?></td>
											<td><?php echo $contas->getTipoPagamento(); ?></td>
											<td><?php echo date('d/m/Y', strtotime($contas->getDataPagamento())); ?></td>
											<td>
                                                <form action="#" method="get">
                                                    <input type="hidden" name="codigoEditar" value="<?php echo $contas->getCodigo(); ?>">
													<input type="hidden" name="produtoEditar" value="<?php echo $contas->getProduto(); ?>">
													<input type="hidden" name="quantidadeEditar" value="<?php echo $contas->getQuantidade(); ?>">
													<input type="hidden" name="precoEditar" value="<?php echo $soma; ?>">
													<input type="hidden" name="precoTotalEditar" value="<?php echo $contas->getPreco(); ?>">
													<input type="hidden" name="pagamentoEditar" value="<?php echo $contas->getTipoPagamento(); ?>">
													<input type="hidden" name="diaPagamentoEditar" value="<?php echo $contas->getDataPagamento(); ?>">
													<button type="submit" class="btn btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
                                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
															<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
														</svg>
													</button>
												</form>
											</td>
											<td>
                                                <form action="#" method="get">
                                                    <input type="hidden" name="codigo" value="<?php echo $contas->getCodigo(); ?>">
													<input type="hidden" name="produto" value="<?php echo $contas->getProduto(); ?>">
													<button type="submit" class="btn btn-danger ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-delete align-middle me-2">
                                                            <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
															<line x1="18" y1="9" x2="12" y2="15"></line>
															<line x1="12" y1="9" x2="18" y2="15"></line>
														</svg>
													</button>
												</form>
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
	<script>
		$("#produto").on("change",function(){
			var produtoSelecionado = $("#produto").val();
			$.ajax({
				url : '../php/precoVenda.php',
				type: 'POST',
				data:{id:produtoSelecionado},
				beforeSend: function(){
					$("#preco").attr('value', '1')
					$("#preco").html('Carregando');
				},
				success : function(data){
					$("#preco").attr('value', data)
					$("#preco").html(data);
				},
				error: function(data){
					$("#preco").attr('value', '3')
					$("#preco").html("Houve um erro");
				}
			})
		})
	</script>
</body>

</html>
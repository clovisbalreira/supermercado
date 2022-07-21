<?php
require_once '../model/Acesso.php';
require_once '../model/Contas.php';
require_once '../model/Contrato.php';
require_once '../model/Precos.php';
require_once '../model/Estoque.php';
require_once '../model/Funcionario.php';
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
        <nav id="sidebar" class="sidebar js-sidebar">
            <?php require_once '../components/menu.php'; ?> 
        </nav>


		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<?php require_once '../components/header.php'; ?>
			</nav>
			<main class="content">
					<div class="row">
						<?php
							$saldo = 0;
							$saldoLiquido = 0;
							$patrimonio = 0;
							$compras = 0;
							$vendas = 0;
							$contas = 0;
							$contratos = 0;
							$estoqueValor = 0;
							$funcionarios = 0;

							foreach($_SESSION['contas'] as $conta){
								if (str_contains($conta->getDataPagamento(), date('Y-m'))) {
									if($conta->getTipoConta() == 'credito'){
										$vendas += $conta->getPreco();
										$saldo += $conta->getPreco();
										$saldoLiquido += $conta->getPreco();
									}
									if($conta->getTipoConta() == 'debito' or $conta->getTipoConta() == 'patrimonio'){
										$compras += $conta->getPreco();
										$saldo -= $conta->getPreco();
										if($conta->getTipoConta() == 'debito'){
											$saldoLiquido -= $conta->getPreco();
										}
									}
									if($conta->getTipoConta() == 'conta'){
										$contas += $conta->getPreco();
										$saldo -= $conta->getPreco();
										$saldoLiquido -= $conta->getPreco();
									}
								}
								if($conta->getTipoConta() == 'patrimonio'){
									$patrimonio += $conta->getPreco();
									$saldo += $conta->getPreco();
									if(date('Y-m',strtotime($conta->getDataPagamento()) == date('Y-m'))){
										$saldoLiquido -= $conta->getPreco();
									}
								}	
							}
							
							foreach($_SESSION['contrato'] as $contrato){
								if (str_contains($contrato->getDataInicio(), date('Y-m'))) {
									$contratos += $contrato->getValor();
									$saldo += $contrato->getValor();
									$saldoLiquido += $contrato->getValor();
								}
							}

							foreach($_SESSION['funcionario'] as $funcionario){
								$funcionarios += $funcionario->getSalario();
								$saldo -= $funcionario->getSalario();
								$saldoLiquido -= $funcionario->getSalario();
							}

							foreach($_SESSION['precos'] as $preco){
								foreach($_SESSION['estoque'] as $estoque){
									if($estoque->getProduto() == $preco->getProduto()){
										$estoqueValor += $estoque->getQuantidade() * $preco->getPreco();
										$saldo += $estoque->getQuantidade() * $preco->getPreco();
									}
								}
							}
						?>
						<?php ?>
						<h1>Super Mercado <span id="mensagem" onmouseover="mostrarInformacoes('Visualize a renda do super mercado de <?php echo date('m');?> de <?php echo date('Y');?>.')" onmouseout="tirarInformacoes()" style="background-color: red; padding: 2px 10px; border-radius: 50%;">?</span></h1>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Saldo Liquido</h5>
								</div>
								<div class="card-body">
									<p style="color: <?php echo $saldoLiquido < 0 ? 'red' : 'green' ; ?>"><?php echo 'R$: '. number_format($saldoLiquido, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Saldo</h5>
								</div>
								<div class="card-body">
									<p style="color: <?php echo $saldo < 0 ? 'red' : 'green' ; ?>"><?php echo 'R$: '. number_format($saldo, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-3">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Patrimônio</h5>
								</div>
								<div class="card-body">
								<p style="color: green ; "><?php echo 'R$: '. number_format($patrimonio, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-3">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Contratos</h5>
								</div>
								<div class="card-body">
									<p style="color: green ; "><?php echo 'R$: '. number_format($contratos, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-3">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Vendas</h5>
								</div>
								<div class="card-body">
									<p style="color: green ; "><?php echo 'R$: '. number_format($vendas, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-3">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Estoque</h5>
								</div>
								<div class="card-body">
									<p style="color: <?php echo $estoqueValor < 0 ? 'red' : 'green' ; ?>"><?php echo 'R$: '. number_format($estoqueValor, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Funcionarios</h5>
								</div>
								<div class="card-body">
									<p style="color: red ; "><?php echo 'R$: '. number_format($funcionarios, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Compras</h5>
								</div>
								<div class="card-body">
									<p style="color: red ; "><?php echo 'R$: '. number_format($compras, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Contas</h5>
								</div>
								<div class="card-body">
									<p style="color: red ; "><?php echo 'R$: '. number_format($contas, 2, ',', '.') ?></p>
								</div>
							</div>
						</div>
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
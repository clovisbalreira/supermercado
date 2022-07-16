<?php
	require_once '../model/Funcionario.php';
	require_once '../model/Contas.php';
	require_once '../model/Contrato.php';
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

	<title>Gestão Supermercado - Saldo
		
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
				<form action="#" method="get" style="margin-top: 20px; margin-bottom: 20px;">
					<div class="row">
						<div class="col-12 col-lg-8">
							<input type="text" class="form-control" placeholder="Pesquisa ex. <?php echo date('Y-m')?> " name="procurar">
						</div>
						<div class="col-12 col-lg-2" style="text-align:right;">
							<button type="cancel" class="btn btn-primary btn-lg-12">Mostrar tudo</button>
						</div>
						<div class="col-12 col-lg-2" style="text-align:right;">
							<button type="submit" class="btn btn-primary btn-lg-12">Pesquisar</button>
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col-12 col-lg-6">
						<h2>Debito</h2>
						<?php $totalDebito = 0;?>
						<?php $totalCredito = 0;?>
						<?php $totalDebito += 0; ?>
						<table class="table">
							<thead>
								<th>Conta</th>
								<th>Valor</th>
								<th>Data Pagamento</th>
							</thead>
							<tbody>
								<tr>
									<th scope="col" colspan="3">Funcionarios</th>
								</tr>
								<?php foreach($_SESSION['funcionario'] as $funcionario){ ?>
									<?php $somaDebito = $funcionario->getSalario();?>
										<tr>
											<td><?php echo $funcionario->getNome();?></td>
											<td colspan="2"><?php echo 'R$: '. number_format($funcionario->getSalario(), 2, ',', '.');?></td>
										</tr>
									<?php $totalDebito += $somaDebito; ?>
								<?php } ?>
								<tr>
									<th scope="col" colspan="3">Contas</th>
								</tr>
								<?php foreach($_SESSION['contas'] as $conta){ ?>
									<?php if (empty($_GET['procurar']) or (str_contains($conta->getDataPagamento(), $_GET['procurar']))) { ?>
									<?php if($conta->getTipoConta() == 'conta'){?>
										<tr>
											<?php $somaConta = $conta->getPreco();?>
											<td><?php echo $conta->getProduto()?></td>
											<td><?php echo 'R$: '. number_format($conta->getPreco(), 2, ',', '.'); ?></td>
											<td><?php echo date('d/m/Y', strtotime($conta->getDataPagamento())) ?></td>								
											<?php $totalDebito += $somaConta ?>
										</tr>
									<?php } ?>
								<?php }?>
								<?php }?>
								<tr>
									<th scope="col" colspan="3">Compras</th>
								</tr>
								<?php foreach($_SESSION['contas'] as $debito){ ?>
									<?php if (empty($_GET['procurar']) or (str_contains($debito->getDataPagamento(), $_GET['procurar']))) { ?>
									<?php if($debito->getTipoConta() == 'debito'){?>
										<tr>
											<?php $somaDebito = $debito->getPreco();?>
											<td><?php echo $debito->getProduto()?></td>
											<td><?php echo 'R$: '. number_format($somaDebito, 2, ',', '.'); ?></td>
											<td><?php echo date('d/m/Y', strtotime($debito->getDataPagamento())) ?></td>								
											<?php $totalDebito += $somaDebito ?>
										</tr>
									<?php } ?>
								<?php }?>
								<?php }?>
							</tbody>
						</table>
					</div>
					<div class="col-12 col-lg-6">
						<h2>Credito</h2>
							<table class="table">
								<thead>
									<th scope="col">Conta</th>
									<th scope="col">Valor</th>
								<th>Data Pagamento</th>
								</thead>
								<tbody>
									<tr>
										<th scope="col" colspan="3">Contratos</th>
									</tr>
									<?php foreach($_SESSION['contrato'] as $contrato){ ?>
										<?php if (empty($_GET['procurar']) or (str_contains($contrato->getDataFim(), $_GET['procurar']))) { ?>
											<tr>
												<?php $somaCredito = $contrato->getValor();?>
												<td><?php echo $contrato->getFornecedor()?></td>
												<td><?php echo 'R$: '. number_format($somaCredito, 2, ',', '.'); ?></td>
												<td><?php echo date('d/m/Y', strtotime($contrato->getDataFim())) ?></td>
												<?php $totalCredito += $somaCredito ?>
											</tr>
										<?php } ?>
									<?php }?>
									<tr>
										<th scope="col" colspan="3">Vendas</th>
									</tr>
									<?php foreach($_SESSION['contas'] as $credito){ ?>
										<?php if (empty($_GET['procurar']) or (str_contains($credito->getDataPagamento(), $_GET['procurar']))) { ?>
										<?php if($credito->getTipoConta() == 'credito'){?>
											<tr>
												<?php $somaCredito = $credito->getPreco();?>
												<td><?php echo $credito->getProduto()?></td>
												<td><?php echo 'R$: '. number_format($somaCredito, 2, ',', '.'); ?></td>
												<td><?php echo date('d/m/Y', strtotime($credito->getDataPagamento())) ?></td>
												<?php $totalCredito += $somaCredito ?>
											</tr>
										<?php } ?>
										<?php } ?>
									<?php }?>
									<tr>
										<th scope="col" colspan="3">Total</th>
									</tr>
									<tr>
										<th scope="row">Debito:</th>
										<td colspan="2"><?php echo 'R$: '. number_format($totalDebito, 2, ',', '.'); ?></td>
									</tr>
									<tr>
										<th scope="row">Credito:</th>
										<td colspan="2"><?php echo 'R$: '. number_format($totalCredito, 2, ',', '.'); ?></td>
									</tr>
									<tr>
										<?php $soma = $totalCredito - $totalDebito;?>	
										<th scope="row">Saldo :</th>
										<td colspan="2" style="color: <?php echo $soma < 0 ? 'red' : 'green' ; ?>"><?php echo 'R$: '. number_format($soma, 2, ',', '.');?></td>
									</tr>
								</tbody>
							</table>
						</div>
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
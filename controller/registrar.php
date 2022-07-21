<?php
    include "../model/Acesso.php";
    include "../model/Contas.php";
    include "../model/Contrato.php";
    include "../model/Estoque.php";
    include "../model/Fornecedor.php";
    include "../model/Funcionario.php";
    include "../model/Marca.php";
    include "../model/Patrimonio.php";
    include "../model/Precos.php";
    include "../model/Produto.php";
    include "../model/Promocao.php";
    include "../model/SaborAroma.php";
    include "../model/Segmento.php";
    include "../model/Setor.php";
    include "../model/Tamanho.php";
    include "../model/TipoContrato.php";
    include "../model/TipoPagamento.php";
    include "../model/TipoProduto.php";
    include "../model/TipoSegmento.php";
    include "../controller/deletar.php";
    session_start();
    // cadastro usuario
    if($_GET['cadastro'] == 1){
        $_SESSION['acesso'][] = new Acesso(count($_SESSION['acesso']), $_GET['nome'], sha1($_GET['senha']));
        header("Refresh:0; ../view/"); 
    }
    //Login
    if($_GET['cadastroAcesso'] == 1){
        $login = false;
        foreach($_SESSION['acesso'] as $acesso){
            if($acesso->getNome() == $_GET['nome'] and $acesso->getSenha() == sha1($_GET['senha'])){
                $login = true;  
                $_SESSION['usuario'] = $acesso->getNome();
                header("Refresh:0; ../view/dashboard.php"); 
            }
        }
        if(!$login){
            echo '<h2>Login Invalido</h2>';
            header("Refresh:1; ../view/"); 
        }
    }
    // editar e criar setor
    if($_GET['cadastroSetor'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['setor'][$_GET['codigo']] = new Setor($_GET['codigo'], $_GET['setor']);
        }else{
            $codigo = 0;
            if(count($_SESSION['setor']) > 0){
                foreach($_SESSION['setor'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['setor'][] = new Setor($codigo, $_GET['setor']);
        }
        header("Refresh:0; ../view/setor.php"); 
    }
    // editar e criar funcionario
    if($_GET['cadastroFuncionario'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['funcionario'][$_GET['codigo']] = new Funcionario($_GET['codigo'], $_GET['nome'], $_GET['nascimento'], $_GET['cpf'], $_GET['setor'], $_GET['salario']);
        }else{
            $codigo = 0;
            if(count($_SESSION['funcionario']) > 0){
                foreach($_SESSION['funcionario'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['funcionario'][] = new Funcionario($codigo, $_GET['nome'], $_GET['nascimento'], $_GET['cpf'], $_GET['setor'], $_GET['salario']);
        }
        header("Refresh:0; ../view/funcionario.php"); 
    }
    // editar e criar fornecedor
    if($_GET['cadastroFornecedor'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['fornecedor'][$_GET['codigo']] = new Fornecedor($_GET['codigo'], $_GET['nome']);
        }else{
            $codigo = 0;
            if(count($_SESSION['fornecedor']) > 0){
                foreach($_SESSION['fornecedor'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['fornecedor'][] = new Fornecedor($codigo, $_GET['nome']);
        }
        header("Refresh:0; ../view/fornecedor.php"); 
    }
    // editar e criar marca
    if($_GET['cadastroMarca'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['marca'][$_GET['codigo']] = new Marca($_GET['codigo'], $_GET['nome'], $_GET['fornecedor']);
        }else{
            $codigo = 0;
            if(count($_SESSION['marca']) > 0){
                foreach($_SESSION['marca'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['marca'][] = new Marca($codigo, $_GET['nome'], $_GET['fornecedor']);
        }
        header("Refresh:0; ../view/marca.php"); 
    }
    // editar e criar tipo produto
    if($_GET['cadastroTipoProduto'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['tipoProduto'][$_GET['codigo']] = new TipoProduto($_GET['codigo'], $_GET["nome"]);
        }else{
            $codigo = 0;
            if(count($_SESSION['tipoProduto']) > 0){
                foreach($_SESSION['tipoProduto'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['tipoProduto'][] = new TipoProduto($codigo, $_GET["nome"]);
        }
        header("Refresh:0; ../view/tipoproduto.php"); 
    }
    // editar e criar segmento
    if($_GET['cadastroSegmento'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['segmento'][$_GET['codigo']] = new Segmento($_GET['codigo'], $_GET['nome']);
        }else{
            $codigo = 0;
            if(count($_SESSION['segmento']) > 0){
                foreach($_SESSION['segmento'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['segmento'][] = new Segmento($codigo, $_GET['nome']);
        }
        header("Refresh:0; ../view/segmento.php"); 
    }
    // editar e criar tipo segmento
    if($_GET['cadastroTipoSegmento'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['tipoSegmento'][$_GET['codigo']] = new TipoSegmento($_GET['codigo'], $_GET['nome'], $_GET['segmento']);
        }else{
            $codigo = 0;
            if(count($_SESSION['tipoSegmento']) > 0){
                foreach($_SESSION['tipoSegmento'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['tipoSegmento'][] = new TipoSegmento($codigo, $_GET['nome'], $_GET['segmento']);
        }
        header("Refresh:0; ../view/tiposegmento.php"); 
    }
    // editar e criar sabor aroma
    if($_GET['cadastroSaborAroma'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['saborAroma'][$_GET['codigo']] = new SaborAroma($_GET['codigo'], $_GET['nome']);
        }else{
            $codigo = 0;
            if(count($_SESSION['saborAroma']) > 0){
                foreach($_SESSION['saborAroma'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['saborAroma'][] = new SaborAroma($codigo, $_GET['nome']);
        }
        header("Refresh:0; ../view/saboraroma.php"); 
    }
    // editar e criar tamanho
    if($_GET['cadastroTamanho'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['tamanho'][$_GET['codigo']] = new Tamanho($_GET['codigo'], $_GET['tamanho'], $_GET['medida']);
        }else{
            $codigo = 0;
            if(count($_SESSION['tamanho']) > 0){
                foreach($_SESSION['tamanho'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['tamanho'][] = new Tamanho($codigo, $_GET['tamanho'], $_GET['medida']);
        }
        header("Refresh:0; ../view/tamanho.php"); 
    }
    // editar e criar tamanho produto
    if($_GET['cadastroProduto'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['produto'][$_GET['codigo']] = new Produto($_GET['codigo'], $_GET['fornecedor'], $_GET['marca'], $_GET['tipoSegmento'], $_GET['tipoProduto'], $_GET['saborAroma'], $_GET['tamanho']);
        }else{
            $codigo = 0;
            if(count($_SESSION['produto']) > 0){
                foreach($_SESSION['produto'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['produto'][] = new Produto($codigo, $_GET['fornecedor'], $_GET['marca'], $_GET['tipoSegmento'], $_GET['tipoProduto'], $_GET['saborAroma'], $_GET['tamanho']);
        }
        header("Refresh:0; ../view/produto.php"); 
    }
    // editar e criar tipo contrato
    if($_GET['cadastroTipoContrato'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['tipoContrato'][$_GET['codigo']] = new TipoContrato($_GET['codigo'], $_GET['nome']);
        }else{
            $codigo = 0;
            if(count($_SESSION['tipoContrato']) > 0){
                foreach($_SESSION['tipoContrato'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['tipoContrato'][] = new TipoContrato($codigo, $_GET['nome']);
        }
        header("Refresh:0; ../view/tipocontrato.php"); 
    }
    // editar e criar contrato
    if($_GET['cadastroContrato'] != ''){
        $codigo = 0;
        $parcelas = 0;
        $anoInicio =  date('Y', strtotime($_GET['inicioContrato']));
        $anoFim =  date('Y', strtotime($_GET['fimContrato']));
        $mesInicio =  date('m', strtotime($_GET['inicioContrato']));
        $mesfim =  date('m', strtotime($_GET['fimContrato']));
        $ano = $anoFim - $anoInicio;
        if($anoInicio < $anoFim){
            $parcelas = ($ano * 12) + ($mesfim - $mesInicio) + 1;
        }else{
            $parcelas = $mesfim - $mesInicio + 1;
        }

        if($_GET['codigo'] != ''){
            for($i = 0; $i <$parcelas; $i ++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month ", strtotime($_GET['inicioContrato'])));
                if($i == 0){
                    $_SESSION['contrato'][$_GET['codigo']] = new Contrato($_GET['codigo'], $_GET['tipoContrato'], $_GET['fornecedor'], $_GET['tipoSegmento'], $_GET['porcentagem'], $_GET['valor'], $dataPagamento, $_GET['fimContrato']);
                }else{
                    $_SESSION['contrato'][] = new Contrato($i+$codigo, $_GET['tipoContrato'], $_GET['fornecedor'], $_GET['tipoSegmento'], $_GET['porcentagem'], $_GET['valor'], $dataPagamento, $_GET['fimContrato']);
                }
            }
        }else{
            if(count($_SESSION['contrato']) > 0){
                foreach($_SESSION['contrato'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            for($i = 0; $i <$parcelas; $i ++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month ", strtotime($_GET['inicioContrato'])));
                $_SESSION['contrato'][] = new Contrato($i+$codigo, $_GET['tipoContrato'], $_GET['fornecedor'], $_GET['tipoSegmento'], $_GET['porcentagem'], $_GET['valor'], $dataPagamento, $_GET['fimContrato']);
            }
        }
        header("Refresh:0; ../view/contrato.php"); 
    }
    // editar e criar tipo pagamento
    if($_GET['cadastroTipoPagamento'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['tipoPagamento'][$_GET['codigo']] = new TipoPagamento($_GET['codigo'], $_GET['tipo'], $_GET['parcelas'], $_GET['dias']);
        }else{
            $codigo = 0;
            if(count($_SESSION['tipoPagamento']) > 0){
                foreach($_SESSION['tipoPagamento'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['tipoPagamento'][] = new TipoPagamento($codigo, $_GET['tipo'], $_GET['parcelas'], $_GET['dias']);
        }
        header("Refresh:0; ../view/tipopagamento.php"); 
    }
    // editar e criar contas
    if($_GET['cadastroContas'] == 1){
        $parcelas = 0;
        $dias = 0;
        foreach($_SESSION['tipoPagamento'] as $tipoPagamento){
            if($_GET['tipoPagamento'] == $tipoPagamento->getTipo().' - Parcelas '.$tipoPagamento->getParcelas().' - Dias '.$tipoPagamento->getDias()){
                $parcelas = $tipoPagamento->getParcelas();
                $dias = $tipoPagamento->getDias();
            }
        }
        $data = date('Y-m-d');
        $valor = $_GET['preco'] / $parcelas;
        if($_GET['codigo'] != ''){
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                if($i == 0){
                    $_SESSION['contas'][$_GET['codigo']] = new Contas($_GET['codigo'], '', $_GET['nome'], 1, $valor,  date('Y-m-d') , $_GET['tipoPagamento'], $dataPagamento, $_GET['tipo']);
                }else{
                    $codigo = 0;
                    if(count($_SESSION['contas']) > 0){
                        foreach($_SESSION['contas'] as $array){
                            $codigo = $array->getCodigo()+1;
                        }
                    }
                    $_SESSION['contas'][] = new Contas($codigo, '', $_GET['nome'], 1, $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $dataPagamento, $_GET['tipo']);
                }
            }
            if($_GET['tipo'] == 'patrimonio'){
                if(count($_SESSION['contas']) > 0){
                    foreach($_SESSION['contas'] as $array){
                        $codigo = $array->getCodigo()+1;
                    }
                }
                $_SESSION['patrimonio'][$codigo] = new Patrimonio($codigo, $_GET['nome'], $_GET['preco'] * $parcelas);
            }
        }else{
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $codigo = 0;
                if(count($_SESSION['contas']) > 0){
                    foreach($_SESSION['contas'] as $array){
                        $codigo = $array->getCodigo()+1;
                    }
                }
                $_SESSION['contas'][] = new Contas($codigo, '', $_GET['nome'], 1, $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $dataPagamento, $_GET['tipo']);
            }
            if($_GET['tipo'] == 'patrimonio'){
                if(count($_SESSION['contas']) > 0){
                    foreach($_SESSION['contas'] as $array){
                        $codigo = $array->getCodigo()+1;
                    }
                }
                $_SESSION['patrimonio'][$codigo] = new Patrimonio($codigo, $_GET['nome'], $_GET['preco']);
            }
        }
        header("Refresh:0; ../view/contas.php");
    }
    // editar e criar contas compras
    if($_GET['cadastroCompras'] == 1 ){
        $parcelas = 0;
        $dias = 0;
        foreach($_SESSION['tipoPagamento'] as $tipoPagamento){
            if($_GET['tipoPagamento'] == $tipoPagamento->getTipo().' - Parcelas '.$tipoPagamento->getParcelas().' - Dias '.$tipoPagamento->getDias()){
                $parcelas = $tipoPagamento->getParcelas();
                $dias = $tipoPagamento->getDias();
            }
        }
        $data = date('Y-m-d');
        $valor = $_GET['preco'] / $parcelas;
        if($_GET['codigo'] != ''){
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $quantidade = $_SESSION['contas'][$_GET['codigo']]->getQuantidade(); 
                if($i == 0){
                    $_SESSION['contas'][$_GET['codigo']] = new Contas($_GET['codigo'], $_SESSION['contas'][$_GET['codigo']]->getFornecedor(), $_SESSION['contas'][$_GET['codigo']]->getProduto(), $_GET['quantidade'], $_GET['quantidade'] * $valor,  date('Y-m-d') , $_GET['tipoPagamento'], $dataPagamento, 'debito');
                }else{
                    $codigo = 0;
                    if(count($_SESSION['contas']) > 0){
                        foreach($_SESSION['contas'] as $array){
                            $codigo = $array->getCodigo()+1;
                        }
                    }
                    $_SESSION['contas'][] = new Contas($codigo, $_SESSION['contas'][$_GET['codigo']]->getFornecedor(), $_SESSION['contas'][$_GET['codigo']]->getProduto(), $_GET['quantidade'], $_GET['quantidade'] * $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $dataPagamento, 'debito');
                }
            }
            $i = 0;
            foreach($_SESSION['estoque'] as $estoque){
                if($parcelas == 1){
                    if($estoque->getProduto() == $_SESSION['contas'][$_GET['codigo']]->getProduto()){
                        $_SESSION['estoque'][$i] = new Estoque($i, $_SESSION['contas'][$_GET['codigo']]->getFornecedor(), $_SESSION['contas'][$_GET['codigo']]->getProduto(), (($estoque->getQuantidade() / $_GET['quantidadeTotal']) - $quantidade) + ($_GET['quantidade'] * $_GET['quantidadeTotal']));
                        $possui = true;
                        break;
                    }
                }
                $i ++;
            }
        }else{
            for($i = 0; $i < $parcelas; $i++){
                $codigo = 0;
                if(count($_SESSION['contas']) > 0){
                    foreach($_SESSION['contas'] as $array){
                        $codigo = $array->getCodigo()+1;
                    }
                }
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $_SESSION['contas'][] = new Contas($codigo, $_GET['fornecedor'], $_GET['produto'], $_GET['quantidade'], $_GET['quantidade'] * $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $dataPagamento, 'debito');
            }
            $possui = false;
            $i = 0;
            foreach($_SESSION['estoque'] as $estoque){
                if($estoque->getProduto() == $_GET['produto']){
                    echo $estoque->getProduto();
                    $_SESSION['estoque'][$i] = new Estoque($i, $_GET['fornecedor'], $_GET['produto'], $estoque->getQuantidade() + ($_GET['quantidade'] * $_GET['quantidadeTotal']));
                    $possui = true;
                    break;
                }
                $i ++;
            }
            if(!$possui){
                $codigo = 0;
                if(count($_SESSION['estoque']) > 0){
                    foreach($_SESSION['estoque'] as $array){
                        $codigo = $array->getCodigo()+1;
                    }
                }
                $_SESSION['estoque'][] = new Estoque($codigo, $_GET['fornecedor'], $_GET['produto'], ($_GET['quantidade'] * $_GET['quantidadeTotal']));
            }

        }
        header("Refresh:0; ../view/compras.php"); 
    }
    // editar e criar contas vendas
    if($_GET['cadastroVendas'] == 1){
        $parcelas = 0;
        $dias = 0;
        foreach($_SESSION['tipoPagamento'] as $tipoPagamento){
            if($_GET['tipoPagamento'] == $tipoPagamento->getTipo().' - Parcelas '.$tipoPagamento->getParcelas().' - Dias '.$tipoPagamento->getDias()){
                $parcelas = $tipoPagamento->getParcelas();
                $dias = $tipoPagamento->getDias();
            }
        }
        $data = date('Y-m-d');
        $valor = $_GET['preco'] / $parcelas;
        if($_GET['codigo'] != ''){
            for($i = 0; $i < $parcelas; $i++){
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $quantidade = $_SESSION['contas'][$_GET['codigo']]->getQuantidade(); 
                if($i == 0){
                    $_SESSION['contas'][$_GET['codigo']] = new Contas($_GET['codigo'], $_SESSION['contas'][$_GET['codigo']]->getFornecedor(), $_SESSION['contas'][$_GET['codigo']]->getProduto(), $_GET['quantidade'], $_GET['quantidade'] * $valor,  date('Y-m-d') , $_GET['tipoPagamento'], $dataPagamento, 'credito');
                }else{
                    $codigo = 0;
                    if(count($_SESSION['contas']) > 0){
                        foreach($_SESSION['contas'] as $array){
                            $codigo = $array->getCodigo()+1;
                        }
                    }
                    $_SESSION['contas'][] = new Contas($codigo, $_SESSION['contas'][$_GET['codigo']]->getFornecedor(), $_SESSION['contas'][$_GET['codigo']]->getProduto(), 1, $_GET['quantidade'] * $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $dataPagamento, 'credito');
                }
            }
            $i = 0;
            if($parcelas == 1){
                foreach($_SESSION['estoque'] as $estoque){
                    if($estoque->getProduto() == $_SESSION['contas'][$_GET['codigo']]->getProduto()){
                        $_SESSION['estoque'][$i] = new Estoque($i, $_GET['fornecedor'], $_SESSION['contas'][$_GET['codigo']]->getProduto(), ($estoque->getQuantidade() + $quantidade) - $_GET['quantidade']);
                        break;
                    }
                    $i ++;
                }
            }
        }else{
            for($i = 0; $i < $parcelas; $i++){
                $codigo = 0;
                if(count($_SESSION['contas']) > 0){
                    foreach($_SESSION['contas'] as $array){
                        $codigo = $array->getCodigo()+1;
                    }
                }
                $dataPagamento = date('Y-m-d', strtotime("+ {$i} month {$dias} days", strtotime($data)));
                $_SESSION['contas'][] = new Contas($codigo, $_GET['fornecedor'], $_GET['produto'], $_GET['quantidade'], $_GET['quantidade'] * $valor,  date('Y-m-d'), $_GET['tipoPagamento'], $dataPagamento, 'credito');
            }
            $i = 0;
            foreach($_SESSION['estoque'] as $estoque){
                if($estoque->getProduto() == $_GET['produto']){
                    $_SESSION['estoque'][$i] = new Estoque($i, $_GET['fornecedor'], $_GET['produto'], $estoque->getQuantidade() - $_GET['quantidade']);
                    break;
                }
                $i ++;
            }
        }
        header("Refresh:0; ../view/vendas.php"); 
    }
    // editar e criar preco
    if($_GET['cadastroPreco'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['precos'][$_GET['codigo']] = new Precos($_GET['codigo'], $_GET['fornecedor'], $_GET['produto'], $_GET['preco'], $_GET['quantidade'], $_GET['quantidade'] * $_GET['preco']);
        }else{
            $codigo = 0;
            if(count($_SESSION['precos']) > 0){
                foreach($_SESSION['precos'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['precos'][] = new Precos($codigo, $_GET['fornecedor'], $_GET['produto'], $_GET['preco'], $_GET['quantidade'], $_GET['quantidade'] * $_GET['preco']);
        }
        header("Refresh:0; ../view/precos.php"); 
    }
    // editar e criar promoção
    if($_GET['cadastroPromocao'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['promocao'][$_GET['codigo']] = new Promocao($_GET['codigo'], $_GET['fornecedor'], $_GET['produto'], $_GET['preco'], $_GET['inicio'], $_GET['fim']);
        }else{
            $codigo = 0;
            if(count($_SESSION['promocao']) > 0){
                foreach($_SESSION['promocao'] as $array){
                    $codigo = $array->getCodigo()+1;
                }
            }
            $_SESSION['promocao'][] = new Promocao($codigo, $_GET['fornecedor'], $_GET['produto'], $_GET['preco'], $_GET['inicio'], $_GET['fim']);
        }
        header("Refresh:0; ../view/promocao.php"); 
    }
    // editar e criar estoque
    if($_GET['cadastroEstoque'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['estoque'][$_GET['codigo']] = new Estoque($_GET['codigo'], $_GET['fornecedor'], $_GET['produto'], $_GET['quantidade']);
        }
        header("Refresh:0; ../view/estoque.php"); 
    }
    if($_GET['cadastroPatrimonio'] == 1){
        if($_GET['codigo'] != ''){
            $_SESSION['patrimonio'][$_GET['codigo']] = new Patrimonio($_GET['codigo'], $_GET['nome'], $_GET['preco']);
        }
        if($_GET['tipo'] == 'credito'){
            foreach($_SESSION['contas'] as $secao){
                if($secao->getProduto() == $_GET['nome']){
                    $_SESSION['contas'][$secao->getCodigo()] = new Contas($secao->getCodigo(), $secao->getFornecedor(), $secao->getProduto(), $secao->getQuantidade(), $_GET['preco'],  $secao->getData(), $secao->getTipoPagamento(), $secao->getDataPagamento(), $_GET['tipo']);
                    deletar('patrimonio');
                }                  
            }
        }
        header("Refresh:0; ../view/patrimonio.php"); 
    }
?>
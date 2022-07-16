<?php
    class Precos{
        private $codigo;
        private $fornecedor;
        private $produto;
        private $preco;
        private $caixa;
        private $precoTotal;

        function __construct($codigo, $fornecedor, $produto , $preco, $caixa, $precoTotal){
            $this->codigo = $codigo;
            $this->fornecedor = $fornecedor;
            $this->produto = $produto;
            $this->preco = $preco;
            $this->caixa = $caixa;
            $this->precoTotal = $precoTotal;
        }

        public function getCodigo()
        {
                return $this->codigo;
        }

        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

                return $this;
        }

        public function getFornecedor()
        {
                return $this->fornecedor;
        }

        public function setFornecedor($fornecedor)
        {
                $this->fornecedor = $fornecedor;

                return $this;
        }

        public function getProduto()
        {
                return $this->produto;
        }

        public function setProduto($produto)
        {
                $this->produto = $produto;

                return $this;
        }

        public function getPreco()
        {
                return $this->preco;
        }

        public function setPreco($preco)
        {
                $this->preco = $preco;

                return $this;
        }

        public function getCaixa()
        {
                return $this->caixa;
        }

        public function setCaixa($caixa)
        {
                $this->caixa = $caixa;

                return $this;
        }

        public function getPrecoTotal()
        {
                return $this->precoTotal;
        }

        public function setPrecoTotal($precoTotal)
        {
                $this->precoTotal = $precoTotal;

                return $this;
        }
    }
?>
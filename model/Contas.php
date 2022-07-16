<?php
    class Contas{
        private $codigo;
        private $fornecedor;
        private $produto;
        private $quantidade;
        private $preco;
        private $data;
        private $tipoPagamento;
        private $dataPagamento;
        private $tipoConta;

        function __construct($codigo, $fornecedor, $produto, $quantidade, $preco, $data, $tipoPagamento, $dataPagamento, $tipoConta){
             $this->codigo = $codigo;
             $this->fornecedor = $fornecedor;
             $this->produto = $produto;
             $this->quantidade = $quantidade;
             $this->preco = $preco;
             $this->data = $data;
             $this->tipoPagamento = $tipoPagamento;
             $this->dataPagamento = $dataPagamento;
             $this->tipoConta = $tipoConta;
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

        public function getQuantidade()
        {
                return $this->quantidade;
        }

        public function setQuantidade($quantidade)
        {
                $this->quantidade = $quantidade;

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

        public function getData()
        {
                return $this->data;
        }

        public function setData($data)
        {
                $this->data = $data;

                return $this;
        }

        public function getTipoPagamento()
        {
                return $this->tipoPagamento;
        }

        public function setTipoPagamento($tipoPagamento)
        {
                $this->tipoPagamento = $tipoPagamento;

                return $this;
        }

        public function getDataPagamento()
        {
                return $this->dataPagamento;
        }

        public function setDataPagamento($dataPagamento)
        {
                $this->dataPagamento = $dataPagamento;

                return $this;
        }

        public function getTipoConta()
        {
                return $this->tipoConta;
        }

        public function setTipoConta($tipoConta)
        {
                $this->tipoConta = $tipoConta;

                return $this;
        }
    }
?>
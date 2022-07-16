<?php
    class Promocao{
        private $codigo;
        private $fornecedor;
        private $produto;
        private $preco;
        private $dataInicio;
        private $dataFim;

        function __construct($codigo, $fornecedor, $produto, $preco, $dataInicio, $dataFim){
            $this->codigo = $codigo;
            $this->fornecedor = $fornecedor;
            $this->produto = $produto;
            $this->preco = $preco;
            $this->dataInicio = $dataInicio;
            $this->dataFim = $dataFim;
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

        public function getDataInicio()
        {
                return $this->dataInicio;
        }

        public function setDataInicio($dataInicio)
        {
                $this->dataInicio = $dataInicio;

                return $this;
        }

        public function getDataFim()
        {
                return $this->dataFim;
        }

        public function setDataFim($dataFim)
        {
                $this->dataFim = $dataFim;

                return $this;
        }
    }
?>
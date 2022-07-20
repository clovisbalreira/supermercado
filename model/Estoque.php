<?php
    class Estoque{
        private $codigo;
        private $fornecedor;
        private $produto;
        private $quantidade;

        function __construct($codigo, $fornecedor, $produto, $quantidade){
            $this->codigo = $codigo;
            $this->fornecedor = $fornecedor;
            $this->produto = $produto;
            $this->quantidade = $quantidade;
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
    }

?>
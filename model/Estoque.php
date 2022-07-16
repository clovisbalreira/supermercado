<?php
    class Estoque{
        private $codigo;
        private $produto;
        private $quantidade;

        function __construct($codigo, $produto, $quantidade){
            $this->codigo = $codigo;
            $this->produto = $produto;
            $this->quantidade = $quantidade;
        }

        /**
         * Get the value of codigo
         */ 
        public function getCodigo()
        {
                return $this->codigo;
        }

        /**
         * Set the value of codigo
         *
         * @return  self
         */ 
        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

                return $this;
        }

        /**
         * Get the value of produto
         */ 
        public function getProduto()
        {
                return $this->produto;
        }

        /**
         * Set the value of produto
         *
         * @return  self
         */ 
        public function setProduto($produto)
        {
                $this->produto = $produto;

                return $this;
        }

        /**
         * Get the value of quantidade
         */ 
        public function getQuantidade()
        {
                return $this->quantidade;
        }

        /**
         * Set the value of quantidade
         *
         * @return  self
         */ 
        public function setQuantidade($quantidade)
        {
                $this->quantidade = $quantidade;

                return $this;
        }
    }

?>
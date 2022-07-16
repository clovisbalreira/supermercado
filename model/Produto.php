<?php
    class Produto{
        private $codigo;
        private $fornecedor;
        private $marca;
        private $tipoSegmento;
        private $tipoProduto;
        private $saborAroma;
        private $tamanho;

        function __construct($codigo, $fornecedor, $marca, $tipoSegmento, $tipoProduto, $saborAroma, $tamanho){
            $this->codigo = $codigo;
            $this->fornecedor = $fornecedor;
            $this->marca = $marca;
            $this->tipoSegmento = $tipoSegmento;
            $this->tipoProduto = $tipoProduto;
            $this->saborAroma = $saborAroma;
            $this->tamanho = $tamanho;
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

        public function getMarca()
        {
                return $this->marca;
        }

        public function setMarca($marca)
        {
                $this->marca = $marca;

                return $this;
        }

        public function getTipoSegmento()
        {
                return $this->tipoSegmento;
        }

        public function setTipoSegmento($tipoSegmento)
        {
                $this->tipoSegmento = $tipoSegmento;

                return $this;
        }

        public function getTipoProduto()
        {
                return $this->tipoProduto;
        }

        public function setTipoProduto($tipoProduto)
        {
                $this->tipoProduto = $tipoProduto;

                return $this;
        }

        public function getSaborAroma()
        {
                return $this->saborAroma;
        }

        public function setSaborAroma($saborAroma)
        {
                $this->saborAroma = $saborAroma;

                return $this;
        }

        public function getTamanho()
        {
                return $this->tamanho;
        }

        public function setTamanho($tamanho)
        {
                $this->tamanho = $tamanho;

                return $this;
        }
    }
            
            
            
            
            
            
            
            
        
?>
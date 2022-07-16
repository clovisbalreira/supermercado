<?php
    class Contrato{
        private $codigo;
        private $fornecedor;
        private $segmento;
        private $tipoContrato;
        private $porcentagem;
        private $valor;
        private $dataInicio;
        private $dataFim;

        function __construct($codigo, $tipoContrato, $fornecedor, $segmento, $porcentagem, $valor, $dataInicio, $dataFim){
            $this->codigo = $codigo;
            $this->fornecedor = $fornecedor;
            $this->segmento = $segmento;
            $this->tipoContrato = $tipoContrato;
            $this->porcentagem = $porcentagem;
            $this->valor = $valor;
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
        
        public function getTipoContrato()
        {
                return $this->tipoContrato;
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

        public function getSegmento()
        {
                return $this->segmento;
        }

        public function setSegmento($segmento)
        {
                $this->segmento = $segmento;

                return $this;
        }
        
        public function setTipoContrato($tipoContrato)
        {
                $this->tipoContrato = $tipoContrato;

                return $this;
        }

        public function getPorcentagem()
        {
                return $this->porcentagem;
        }

        public function setPorcentagem($porcentagem)
        {
                $this->porcentagem = $porcentagem;

                return $this;
        }

        public function getValor()
        {
                return $this->valor;
        }

        public function setValor($valor)
        {
                $this->valor = $valor;

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
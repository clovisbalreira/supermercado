<?php
    class TipoPagamento{
        private $codigo;
        private $tipo;
        private $parcelas;
        private $dias;

        function __construct($codigo, $tipo, $parcelas, $dias){
            $this->codigo = $codigo;
            $this->tipo = $tipo;
            $this->parcelas = $parcelas;
            $this->dias = $dias;
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

        public function getTipo()
        {
                return $this->tipo;
        }

        public function setTipo($tipo)
        {
                $this->tipo = $tipo;

                return $this;
        }

        public function getParcelas()
        {
                return $this->parcelas;
        }

        public function setParcelas($parcelas)
        {
                $this->parcelas = $parcelas;

                return $this;
        }

        public function getDias()
        {
                return $this->dias;
        }

        public function setDias($dias)
        {
                $this->dias = $dias;

                return $this;
        }
    }
    
?>
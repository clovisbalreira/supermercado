<?php
    class Tamanho{
        private $codigo;
        private $tamanho;
        private $medida;

        function __construct($codigo, $tamanho, $medida){
            $this->codigo = $codigo;
            $this->tamanho = $tamanho;
            $this->medida = $medida;
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

        public function getTamanho()
        {
                return $this->tamanho;
        }

        public function setTamanho($tamanho)
        {
                $this->tamanho = $tamanho;

                return $this;
        }

        public function getMedida()
        {
                return $this->medida;
        }

        public function setMedida($medida)
        {
                $this->medida = $medida;

                return $this;
        }
    }
?>
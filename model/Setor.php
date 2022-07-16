<?php
    class Setor{
        private $codigo;
        private $setor;

        public function __construct($codigo, $setor){
            $this->codigo = $codigo;
            $this->setor = $setor;
        }

        public function getCodigo()
        {
                return $this->codigo;
        }

        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

        }

        public function getSetor()
        {
                return $this->setor;
        }

        public function setSetor($setor)
        {
                $this->setor = $setor;

        }
    }
?>
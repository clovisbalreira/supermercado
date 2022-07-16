<?php
    class TipoSegmento{
        private $codigo;
        private $nome;
        private $segmento;

        function __construct($codigo, $nome, $segmento){
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->segmento = $segmento;
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

        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = $nome;

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
    }
    
?>
<?php
    class Patrimonio{
        private $codigo;
        private $nome;
        private $valor;

        function __construct($codigo, $nome, $valor){
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->valor = $valor;       
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

        public function getValor()
        {
                return $this->valor;
        }

        public function setValor($valor)
        {
                $this->valor = $valor;

                return $this;
        }
    }
?>
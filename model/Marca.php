<?php
    class Marca{
        private $codigo;
        private $nome;
        private $fornecedor;

        function __construct($codigo, $nome, $fornecedor){
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->fornecedor = $fornecedor;
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

        public function getFornecedor()
        {
                return $this->fornecedor;
        }

        public function setFornecedor($fornecedor)
        {
                $this->fornecedor = $fornecedor;

                return $this;
        }
    }
?>
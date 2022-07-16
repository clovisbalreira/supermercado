<?php
    class Acesso{
        private $codigo;
        private $nome;
        private $senha;

        function __construct($codigo, $nome, $senha){
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->senha = $senha;
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
         * Get the value of nome
         */ 
        public function getNome()
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         *
         * @return  self
         */ 
        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of senha
         */ 
        public function getSenha()
        {
                return $this->senha;
        }

        /**
         * Set the value of senha
         *
         * @return  self
         */ 
        public function setSenha($senha)
        {
                $this->senha = $senha;

                return $this;
        }

    }
?>
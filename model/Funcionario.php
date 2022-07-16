<?php
    class Funcionario{
        private $codigo;
        private $nome;
        private $nascimento;
        private $cpf;
        private $setor;
        private $salario;

        public function __construct($codigo, $nome, $nascimento, $cpf, $setor, $salario){
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->nascimento = $nascimento;
            $this->cpf = $cpf;
            $this->setor = $setor;
            $this->salario = $salario;
        }

        public function getCodigo()
        {
                return $this->codigo;
        }

        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;
        }

        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = $nome;
        }

        public function getCpf()
        {
                return $this->cpf;
        }

        public function setCpf($cpf)
        {
                $this->cpf = $cpf;
        }

        public function getNascimento()
        {
                return $this->nascimento;
        }

        public function setNascimento($nascimento)
        {
                $this->nascimento = $nascimento;
        }

        public function getSetor()
        {
                return $this->setor;
        }

        public function setSetor($setor)
        {
                $this->setor = $setor;
        }

        public function getSalario()
        {
                return $this->salario;
        }

        public function setSalario($salario)
        {
                $this->salario = $salario;
        }
    }
?>
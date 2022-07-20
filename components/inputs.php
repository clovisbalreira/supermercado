<?php
    function botao($cadastro){
        $texto = 'Cadastrar';
        if(isset($_GET['codigoEditar'])){
            $texto = 'Editar'; 
        }
        return "
            <button type='submit' class='btn btn-primary btn-lg-12' name='$cadastro' value='1'>".$texto."</button>
        ";
    }

    function botaoTabelaDeletar($codigo){
        return "
            <form action='#' method='get'>
                <input type='hidden' name='codigo' value='$codigo'>	
                <button type='submit' class='btn btn-danger '>
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-delete align-middle me-2'><path d='M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z'></path><line x1='18' y1='9' x2='12' y2='15'></line><line x1='12' y1='9' x2='18' y2='15'></line></svg>
                </button>	
            </form>
        ";
    }

?>
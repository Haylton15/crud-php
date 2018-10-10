<?php 
//arquivo que contém todas as funções de acesso ao bd(é um genérico então)
mysqli_report(MYSQLI_REPORT_STRICT);
//mysqli report serve para avisar sobre erros graves

//função que retorna ou não uma conexão com o BD
function open_database(){
    try{
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        return $conn;
    }catch(Exception $e){
        echo $e->getMessage();
        return null;
    }
}

function close_database($conn){
    try{
        mysqli_close($conn);
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

?>
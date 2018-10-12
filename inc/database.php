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

/*Pesquisa um registr pelo id em uma tabela caso ele for passado nos parâmetros, caso não, cai no primeiro else, em que vai fazer a busca de todos os registros de acordo com a tabela que vai ser obrigatoriamente passada. Lembrando que esse find é genérico.*/

function find($table = null, $id = null){

    $database = open_database();
    $found = null; //booleano que define se encontrou ou não

    try {
        
        if ($id) {
            $sql = "SELECT * FROM " . $table . "WHERE id = " . $id;
            $result = $database->query($sql);

            if($result->num_rows > 0){
                $found = $result->fetch_assoc();
                //dados associativos como o fetch_assoc e MYSQLI_ASSOC são arrays om o nome da coluna e o valor dela, ficando mais fácil de implementar na tela. Entendo que é chave valor, tipo JSON.
            }
        }

        else{

            $sql = "SELECT * FROM " . $table;
            $result = $database->query($sql);

            if($result->num_rows > 0){
                $found = $result->fetch_all(MYSQLI_ASSOC);
            }

        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = 'danger';

        
    }

    close_database($database);
    return $found;
}

//essa função é só um aláias lê se isso mesmo, aláias. lembrando que essa fução servirá para retornar todos os registros de uma tabela
function find_all($table){
    //pesquisa todos os registros de uma tabela utilizando a lógica do find como base.
    return find($table);
}

?>
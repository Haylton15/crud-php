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

function find( $table = null, $id = null ) {
  
    $database = open_database();
    $found = null;
    try {
      if ($id) {
        $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
        $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
          $found = $result->fetch_assoc();
           //dados associativos como o fetch_assoc e MYSQLI_ASSOC são arrays com o nome da coluna e o valor dela, ficando mais fácil de implementar na tela. Entendo que é chave valor, tipo JSON.
        }
        
      } else {
        
        $sql = "SELECT * FROM " . $table;
        $result = $database->query($sql);
        
        if ($result->num_rows > 0) {
          $found = $result->fetch_all(MYSQLI_ASSOC);
        
        /* Metodo alternativo
        $found = array();
        while ($row = $result->fetch_assoc()) {
          array_push($found, $row);
        } */
        }
      }
    } catch (Exception $e) {
      $_SESSION['message'] = $e->GetMessage();
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


//insere um registro

function save($table=null, $data=null){
    $database = open_database();

    $columns = null;
    $value = null;

    foreach ($data as $key => $value) {
        $columns .= trim($key, "'") . ",";
        $values .= "'$value',";
    }

    //remove a ultima virgula
    $columns = rtrim($columns, ',');
    $values = rtrim($values, ',');

    $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";

    try {
        $database->query($sql);
        $_SESSION['message'] = 'Registro cadastrado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) {
        $_SESSION['message'] = 'Não foi possível realizar a operação.';
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
}


/**
 *  Atualizacao/Edicao de Cliente
 */
function edit() {

  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_POST['customer'])) {

      $customer = $_POST['customer'];
      $customer['modified'] = $now->format("Y-m-d H:i:s");

      update('customers', $id, $customer);
      header('location: index.php');
  } else {

      global $customer;
      $customer = find('customers', $id);
  } 
} else {
    header('location: index.php');
}
}

   /**
 *  Atualiza um registro em uma tabela, por ID
 */
   function update($table = null, $id = 0, $data = null) {

      $database = open_database();

      $items = null;

      foreach ($data as $key => $value) {
        $items .= trim($key, "'") . "='$value',";
    }

  // remove a ultima virgula
    $items = rtrim($items, ',');

    $sql  = "UPDATE " . $table;
    $sql .= " SET $items";
    $sql .= " WHERE id=" . $id . ";";

    try {
        $database->query($sql);

        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';

    } catch (Exception $e) { 

        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    } 

    close_database($database);
}

?>





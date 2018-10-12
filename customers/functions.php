<!--Aqui há todas as funções das telas de cadastro de clientes-->

<?php 
require_once('../config.php');
require_once(DBAPI);

	$customers  = null; // guarda o conjunto de registros de clientes;
	$customer = null;//guarda um único cliente para casos de create e update

	/*
	Listagem de clientes
	*/


	/*é a função que é chamada na trela principal de clientes em que vai buscar todos os registros no BD e guardar na variável $customers para poder exibir*/
	//esse é o backend da página index
	function index(){ 
		global $customers;
		$customers = find_all('customers'); //a find_all é a quem traz os dados
	}

/**
 *  Cadastro de Clientes
 */
function add() {

	if (!empty($_POST['customer'])) {

		$today = 
		date_create('now', new DateTimeZone('America/Sao_Paulo'));

		$customer = $_POST['customer'];
		$customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");

		save('customers', $customer);
		header('location: index.php');
	}
}


?>
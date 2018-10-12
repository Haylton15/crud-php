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

 ?>
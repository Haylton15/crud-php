<?php 
//formulário de cadastro
	require_once('functions.php');
	add();
 ?>

 <?php include(HEADER_TEMPLATE); ?>

 <h2>Novo CLiente</h2>


 <form action="add.php" method="post">
 	<hr/>
 	<div class="row">
	    <div class="form-group col-md-7">
	      <label for="name">Nome / Razão Social</label>
	      <input id="name" type="text" class="form-control" name="customer['name']">
	    </div>

	    <div class="form-group col-md-3">
	      <label for="campo2">CNPJ / CPF</label>
	      <input id="campo2" type="text" class="form-control" name="customer['cpf_cnpj']">
	    </div>

	    <div class="form-group col-md-2">
	      <label for="campo3">Data de Nascimento</label>
	      <input id="campo3" type="text" class="form-control" name="customer['birthdate']">
	    </div>
    </div>
    <div class="row">
    	<div class="form-group col-md-3">
    		<label for="campo4">Município</label>
    		<input id="campo4" type="text" class="form-control" name="customer['city']">
    	</div>

    	<div class="form-group col-md-2">
    		<label for="campo5">Telefone</label>
    		<input id="campo5" type="text" class="form-control" name="customer['phone']">

    	</div>
    	<div class="form-group col-md-2">
    		<label for="campo6">Celular</label>
    		<input id="campo6" type="text" class="form-control" name="customer['mobile']">
    	</div>

    	<div class="form-group col-md-1">
    		<label for="campo7">UF</label>
    		<input id="campo7" class="form-control" type="text" name="customer['state']">
    	</div>
    	<div class="form-group col-md-2">
    		<label for="campo8">Inscrição Estadual</label>
    		<input id="campo8" class="form-control" type="text" name="customer['ie']">
    	</div>

    </div>

    <div id="actions" class="row">
    	<div class="col-md-12">
    		<button type="submit" class="btn btn-primary">Salvar</button>
    		<a href="index.php" class="btn btn-default">Cancelar</a>
    	</div>
    </div>

 </form>

 <?php include(FOOTER_TEMPLATE); ?>
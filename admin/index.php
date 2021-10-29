<?php

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Registro De Automovel</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		.box-title{
			border-radius: 5px;
			box-shadow: 0px 0px 3px 1px green;
			padding: 10px 0px;
		}
		.error-msg{
			color: #dc3549;
			font-weight: 600;
		}
		.success-msg{
			color: gray;
			font-weight: 600;
		}

		body {
			color: #566787;
			background: White;
			font-family: "Varela Round", sans-serif;
			font-size: 13px;
  }
	</style>
</head>

<body>
	
	<div class="container-fluid">
		<div class="container">
			<div class="row m-3 text-center">
				<div class="col-lg-12">
					<h1 class="box-title">Registro De Automovel</h1>
				</div>
			</div>
			<div  class="row justify-content-center">
				<div class="col-lg-6">
				<button type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#exampleModalCenter" >Novo Carro</button>	
				</div>
				<div class="col-lg-6">
					<input type="text" id="search" class="form-control" placeholder="Pesquisar">
				</div>
			</div>
			<div class="row mt-5" id="tbl_rec">
		
			</div>
		</div>
	</div>
	
<!-- Insert Design Modal -->
	
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Adicionar Novo Carro</h5>
        <button type="button" class="Fechar" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="ins_rec">
	      <div class="modal-body">
			  	<div class="form-group">
					<label><b>Marca do Carro</b></label>
					<input type="text" name="marca" class="form-control" placeholder="marca">
					<span class="error-msg" id="msg_1"></span>
			  	</div>
			  	<div class="form-group">
					<label><b>Modelo</b></label>
					<input type="text" name="modelo" class="form-control" placeholder="Digite o modelo">
					<span class="error-msg" id="msg_2"></span>
			  	</div>
				<div class="form-group">
					<label><b>Cor</b></label>
					<select class="custom-select" name="cor_carro" id="cor_carro">
						<option value="" selected>Choose...</option>
						<option value="Preto">Preto</option>
						<option value="Branco">Branco</option>
						<option value="Cinza">Cinza</option>
					</select>
					<span class="error-msg" id="msg_3"></span>
			  	</div>
				<div class="form-group">
					<label><b>Ano de fabrico</b></label>
					<input type="date" name="anofabrico" class="form-control">
					<span class="error-msg" id="msg_4"></span>
			  	</div>
				<div class="form-group">
					<label class="mr-3"><b>Tipo de Combustivel :- </b></label>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="combustivel" value="Gasolina" checked>
					  <label class="form-check-label" >Gasolina</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="combustivel" value="Disel">
					  <label class="form-check-label" >Disel</label>
					</div>
					<span class="error-msg"  id="msg_5"></span>
				</div>	
				<div class="form-group">
					<span class="success-msg" id="sc_msg"></span>
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" id="Fechar_click" data-dismiss="modal">Fechar</button>
	        <button type="submit" class="btn btn-primary" >Novo Carro</button>
	      </div>
      </form>
    </div>
  </div>
</div>
	
<!-- End Insert Modal -->
		
<!-- Update Design Modal -->
	
<div class="modal fade" id="updateModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalCenterTitle">Actualizar</h5>
        <button type="button" class="Fechar" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="updata">
      <div class="modal-body">
		  	<div class="form-group">
				<label><b>User Name</b></label>
				<input type="text" class="form-control" name="marca" id="upd_1" placeholder="marca">
				<span class="error-msg" id="umsg_1"></span>
		  	</div>
		  	<div class="form-group">
				<label><b>Modelo</b></label>
				<input type="text" class="form-control" name="Modelo" id="upd_2" placeholder="Digite o modelo">
				<span class="error-msg" id="umsg_2"></span>
		  	</div>
			<div class="form-group">
				<label><b>cor_carro</b></label>
				<select class="custom-select" id="upd_3" name="cor_carro">
					<option value="" selected>Escola...</option>
					<option value="Preto">Preto</option>
					<option value="Branco">Branco</option>
					<option value="Cinza">Cinza</option>
					<option value="Azul">Azul</option>
					<option value="Vermelho">Vermelho</option>
					<option value="Verde">Verde</option>
				</select>
				<span class="error-msg" id="umsg_3"></span>
		  	</div>
			<div class="form-group">
				<label><b>Ano de Fabrico</b></label>
				<input type="date" class="form-control" id="upd_4" name="anofabrico">
				<span class="error-msg" id="umsg_4"></span>
		  	</div>
			<div class="form-group">
				<label><b>combustivel</b></label>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" id="upd_5" name="combustivel" value="Gasolina">
				  <label class="form-check-label" >Gasolina</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" id="upd_6" name="combustivel" value="Disel">
				  <label class="form-check-label" >Disel</label>
				</div>
				<span class="success-msg" id="umsg_5"></span>
			</div>
			<div class="form-group">
				<input type="hidden" name="dataval" id="upd_7">
				<span class="success-msg" id="umsg_6"></span>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="up_cancle">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>	
    </div>
  </div>
</div>	
	
<!-- End Update Design Modal -->
	
<!-- Delete Design Modal -->
	
<div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalCenterTitle">Tem a certeza que quer apagar esse registro ?</h5>
        <button type="button" class="Fechar" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <p>Ao apagar nao tera como recuperar os dados.?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="de_cancle" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="deleterec">Apagar</button>
      </div>
    </div>
  </div>
</div>	
	
<!-- End Delete Design Modal -->
	
<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript">
	
$(document).ready(function (){
	$('#tbl_rec').load('record.php');

	$('#search').keyup(function (){
		var search_data = $(this).val();
		$('#tbl_rec').load('record.php', {keyword:search_data});
	});

	//insert Record

	$('#ins_rec').on("submit", function(e){
		e.preventDefault();
		$.ajax({

			type:'POST',
			url:'insprocess.php',
			data:$(this).serialize(),
			success:function(vardata){

				var json = JSON.parse(vardata);

				if(json.status == 101){
					console.log(json.msg);
					$('#tbl_rec').load('record.php');
					$('#ins_rec').trigger('reset');
					$('#Fechar_click').trigger('click');
				}
				else if(json.status == 102){
					$('#sc_msg').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 103){
					$('#msg_1').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 104){
					$('#msg_2').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 105){
					$('#msg_3').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 106){
					$('#msg_4').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 107){
					$('#msg_5').text(json.msg);
					console.log(json.msg);
				}
				else{
					console.log(json.msg);
				}

			}

		});

	});

	//select data

	$(document).on("click", "button.editdata", function(){
		$('#umsg_1').text("");
		$('#umsg_2').text("");
		$('#umsg_3').text("");
		$('#umsg_4').text("");
		$('#umsg_5').text("");
		$('#umsg_6').text("");
		$('#umsg_7').text("");
		var check_id = $(this).data('dataid');
		$.getJSON("updateprocess.php", {checkid : check_id}, function(json){
			if(json.status == 0){
				$('#upd_1').val(json.marca);
				$('#upd_2').val(json.modelo);
				$('#upd_3').val(json.cor_carro);
				$('#upd_4').val(json.anofabrico);
				$('#upd_7').val(check_id);
				if(json.combustivel == 'Gasolina'){
					$('#upd_5').prop("checked", true);
				}
				else{
					$('#upd_6').prop("checked", true);
				}
			}
			else{
				console.log(json.msg);
			}
		});
	});

	//Actualizar

	$('#updata').on("submit", function(e){
		e.preventDefault();

		$.ajax({

			type:'POST',
			url:'updateprocess2.php',
			data:$(this).serialize(),
			success:function(vardata){

				var json = JSON.parse(vardata);

				if(json.status == 101){
					console.log(json.msg);
					$('#tbl_rec').load('record.php');
					$('#ins_rec').trigger('reset');
					$('#up_cancle').trigger('click');
				}
				else if(json.status == 102){
					$('#umsg_6').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 103){
					$('#umsg_1').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 104){
					$('#umsg_2').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 105){
					$('#umsg_3').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 107){
					$('#umsg_4').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 106){
					$('#umsg_5').text(json.msg);
					console.log(json.msg);
				}

				else{
					console.log(json.msg);
				}

			}

		});

	});

	//delete record

	var deleteid;

	$(document).on("click", "button.deletedata", function(){
		deleteid = $(this).data("dataid");
	});

	$('#deleterec').click(function (){
		$.ajax({
			type:'POST',
			url:'deleteprocess.php',
			data:{delete_id : deleteid},
			success:function(data){
				var json = JSON.parse(data);
				if(json.status == 0){
					$('#tbl_rec').load('record.php');
					$('#de_cancle').trigger("click");
					console.log(json.msg);
				}
				else{
					console.log(json.msg);
				}
			}
		});
	});


});

</script>

</body>
</html>

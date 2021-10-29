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
					<input type="text" id="search" class="form-control float-left" placeholder="Pesquisar">
				</div>
			</div>
			<div class="row mt-5" id="tbl_rec">
		
			</div>
		</div>
	</div>
	

	

	
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






});

</script>

</body>
</html>

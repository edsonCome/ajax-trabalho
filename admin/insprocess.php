<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['cor_carro']) && isset($_POST['anofabrico']) && isset($_POST['combustivel'])){

		$marca = $user_fun->htmlvalidation($_POST['marca']);
		$modelo = $user_fun->htmlvalidation($_POST['modelo']);
		$cor_carro = $user_fun->htmlvalidation($_POST['cor_carro']);
		$anofabrico = $user_fun->htmlvalidation($_POST['anofabrico']);
		$combustivel = $user_fun->htmlvalidation($_POST['combustivel']);

		if((!preg_match('/^[ ]*$/', $marca)) && (!preg_match('/^[ ]*$/', $modelo)) && (!preg_match('/^[ ]*$/', $cor_carro)) && (!preg_match('/^[ ]*$/', $combustivel)) && ($anofabrico != NULL)){

			$field_val['marca'] = $marca;
			$field_val['modelo'] = $modelo;
			$field_val['combustivel'] = $combustivel;
			$field_val['cor'] = $cor_carro;
			$field_val['anofabrico'] = $anofabrico;	

			$insert = $user_fun->insert("carros", $field_val);

			if($insert){
				$json['status'] = 101;
				$json['msg'] = "Data Successfully Inserted";
			}
			else{
				$json['status'] = 102;
				$json['msg'] = "Data Not Inserted";
			}

		}
		else{

			if(preg_match('/^[ ]*$/', $marca)){

				$json['status'] = 103;
				$json['msg'] = "Please Enter marca";

			}
			if(preg_match('/^[ ]*$/', $modelo)){

				$json['status'] = 104;
				$json['msg'] = "Porfavor digite o Modelo";

			}
			if(preg_match('/^[ ]*$/', $cor_carro)){

				$json['status'] = 105;
				$json['msg'] = "Porfavor selleciona a Cor";

			}
			if(preg_match('/^[ ]*$/', $combustivel)){

				$json['status'] = 106;
				$json['msg'] = "Porfavor escolha o combustivel";

			}
			if($anofabrico == NULL){

				$json['status'] = 107;
				$json['msg'] = "Please Enter anofabrico";

			}

		}

	}
	else{

		$json['status'] = 108;
		$json['msg'] = "Invalid Values Passed";

	}

}
else{

	$json['status'] = 109;
	$json['msg'] = "Invalid Method Found";

}


echo json_encode($json);

?>
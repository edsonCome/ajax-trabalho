<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['cor_carro']) && isset($_POST['anofabrico']) && isset($_POST['combustivel']) && isset($_POST['dataval'])){

		$marca = $user_fun->htmlvalidation($_POST['marca']);
		$modelo = $user_fun->htmlvalidation($_POST['modelo']);
		$cor_carro = $user_fun->htmlvalidation($_POST['cor_carro']);
		$anofabrico = $user_fun->htmlvalidation($_POST['anofabrico']);
		$combustivel = $user_fun->htmlvalidation($_POST['combustivel']);
		$update_id = $user_fun->htmlvalidation($_POST['dataval']);

		if((!preg_match('/^[ ]*$/', $marca)) && (!preg_match('/^[ ]*$/', $modelo)) && (!preg_match('/^[ ]*$/', $cor_carro)) && (!preg_match('/^[ ]*$/', $gender)) && ($anofabrico != NULL)){

			$condition['u_id'] = $update_id;

			$field_val['marca'] = $marca;
			$field_val['modelo'] = $modelo;
			$field_val['combustivel'] = $combustivel;
			$field_val['cor'] = $cor_carro;
			$field_val['anofabrico'] = $anofabrico;	

			$update = $user_fun->update("carros", $field_val, $condition);

			if($update){
				$json['status'] = 101;
				$json['msg'] = "Data Successfully Updated";
			}
			else{
				$json['status'] = 102;
				$json['msg'] = "Data Not Updated";
			}

		}
		else{

			if(preg_match('/^[ ]*$/', $marca)){

				$json['status'] = 103;
				$json['msg'] = "Please Enter marca";

			}
			if(preg_match('/^[ ]*$/', $modelo)){

				$json['status'] = 104;
				$json['msg'] = "Please Enter modelo";

			}
			if(preg_match('/^[ ]*$/', $cor_carro)){

				$json['status'] = 105;
				$json['msg'] = "Please Select cor_carro";

			}
			if(preg_match('/^[ ]*$/', $combustivel)){

				$json['status'] = 106;
				$json['msg'] = "Porfavor escolha o tipo de combustivel";

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
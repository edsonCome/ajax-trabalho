<?php

include_once('config.php');
$user_fun = new Userfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['checkid']) && $_GET['checkid'] > 0){

		$update_ch_id = $user_fun->htmlvalidation($_GET['checkid']);

		$condition0['u_id'] = $update_ch_id;
		$select_pre = $user_fun->select_assoc("carros", $condition0);

		if($select_pre){

			$json['status'] = 0;
			$json['marca'] = $select_pre['marca'];
			$json['modelo'] = $select_pre['modelo'];
			$json['cor_carro'] = $select_pre['cor'];
			$json['anofabrico'] = $select_pre['anofabrico'];
			$json['combustivel'] = $select_pre['combustivel'];
			$json['msg'] = "Success";

		}
		else{

			$json['status'] = 1;
			$json['marca'] = "NULL";
			$json['modelo'] = "NULL";
			$json['cor_carro'] = "NULL";
			$json['anofabrico'] = "NULL";
			$json['combustivel'] = "NULL";
			$json['msg'] = "Fail";

		}

	}
	else{
			$json['status'] = 2;
			$json['marca'] = "NULL";
			$json['modelo'] = "NULL";
			$json['cor_carro'] = "NULL";
			$json['anofabrico'] = "NULL";
			$json['combustivel'] = "NULL";
			$json['msg'] = "Invalid Values Passed";
	}
}
else{
			$json['status'] = 3;
			$json['marca'] = "NULL";
			$json['modelo'] = "NULL";
			$json['cor_carro'] = "NULL";
			$json['anofabrico'] = "NULL";
			$json['combustivel'] = "NULL";
			$json['msg'] = "Invalid Method Found";
}


echo json_encode($json);

?>
<?php

include_once('config.php');
$user_fun = new Userfunction();
$counter = 1;

if(isset($_POST['keyword']) && !empty(trim($_POST['keyword']))){

	$keyword = $user_fun->htmlvalidation($_POST['keyword']);

	$match_field['marca'] = $keyword;
	$match_field['modelo'] = $keyword;
	$select = $user_fun->search("carros", $match_field, "OR");

}
else{

	$select = $user_fun->select("carros");

}


?>

				<table class="table" style="vertical-align: middle; text-align: center;">
				  <thead class="thead-dark">
					<tr>
					  	<th scope="col">#</th>
					  	<th scope="col">Marca</th>
					  	<th scope="col">Modelo</th>
						<th scope="col">Combustivel</th>
					  	<th scope="col">Cor Do Carro</th>
						<th scope="col">Ano de fabrico</th>
						<th scope="col">Accao</th>
					</tr>
				  </thead>
				  <tbody>
				  	<?php if($select){ foreach($select as $se_data){ ?>
					<tr>
					  <th scope="row"><?php echo $counter; $counter++; ?></th>
					  	<td><?php echo $se_data['marca']; ?></td>
					  	<td><?php echo $se_data['modelo']; ?></td>
					  	<td><?php echo $se_data['combustivel']; ?></td>
						<td><?php echo $se_data['cor']; ?></td>
						<td><?php echo $se_data['anofabrico']; ?></td>
						<td>
							<button type="button" class="btn btn-info editdata" data-dataid="<?php echo $se_data['u_id']; ?>" data-toggle="modal" data-target="#updateModalCenter">Actualizar</button>
							<button type="button" class="btn btn-danger deletedata" data-dataid="<?php echo $se_data['u_id']; ?>" data-toggle="modal" data-target="#deleteModalCenter">Delete</button>
						</td>
					</tr>
					<?php }}else{ echo "<tr><td colspan='7'><h2>No Result Found</h2></td></tr>"; } ?>
				  </tbody>
				</table>	
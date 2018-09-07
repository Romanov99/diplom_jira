<?php 
require_once('db.php');

$con = new Datebase();


if(isset($_POST['name']) && isset($_POST['data_start'])){

	echo $con->AddRow($_POST['name'],$_POST['data_start'],$_POST['data_end'],$_POST['color'],$_POST['proc'],$_POST['parent'],$_POST['id_parent'],$_POST['res']);
}

if(isset($_POST['wanna_row'])){

	$tmp = $con->getAllRows();
	echo json_encode($tmp);

}

if(isset($_POST['wanna_refactor_id'])){
	
	$tmp = $con->getInfoRow($_POST['wanna_refactor_id']);
	echo json_encode($tmp);
}	

if(isset($_POST['name_ch'])){
	
	$tmp = $con->ChangeRow($_POST['name_ch'],$_POST['data_start_ch'],$_POST['data_end_ch'],$_POST['color_ch'],$_POST['proc_ch'],$_POST['parent_ch'],$_POST['id_parent_ch'],$_POST['res_ch'], $_POST['id_ch']);

	echo($tmp);

}

if(isset($_POST['wanna_delete_row'])){
	$tmp = $con->DeleteRow($_POST['wanna_delete_row']);
	echo($tmp);

}




	
 ?>
<?php
	$xhr = new MongoClient();
	$col = $xhr-> main -> users;

	$login = $_COOKIE['login'];
	$hash = $_COOKIE['hash'];

	$note = $_POST["in1"];

	$filter = array('Login' => $login,'hash' => $hash); // фильтр для поиска почты в БД

	$person = $col-> findOne($filter); // поиск по фильтру
	$note.="*".$person['note'];

	if(!empty($person)){

		$col ->update(array("Login"=>$login), array('$set' => array("note" => $note)));
		
		header("Location: index2.php");

		exit();

	}
	 include("index3.php");
	$xhr -> close();
	
?>
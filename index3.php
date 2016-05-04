<?
	$xhr = new MongoClient();
	$col = $xhr-> main -> users;

	$login = $_COOKIE['login'];
	$hash = $_COOKIE['hash'];

	$note = $_POST["in1"];

	$filter = array('Login' => $login,'hash' => $hash); // фильтр для поиска почты в БД

	$person = $col-> findOne($filter); // поиск по фильтру
	$array = explode('*', $person['note']);
	for($i = 0; $i<count($array); $i++)
	{
		echo $array[$i];
		echo "***";
	}
?>
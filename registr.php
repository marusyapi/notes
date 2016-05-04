<?php 
	$xhr = new MongoClient();
	$col = $xhr-> main -> users;

	$name = $_POST["email"];
	$filter = array("Email"=> $name); // фильтр для поиска почты в БД
	$person = $col-> findOne($filter); // поиск по фильтру
	$hash = md5(generate(10));
	if ($person == null)
	{
		$data = array(
						"Login" => $_POST["login"],
						"Password" => md5(sha1($_POST["pass"])),
						"Email" => $_POST["email"],
						"note" => "",
						"hash" => $hash);

		$col -> insert($data);

		$coll = $xhr -> main ->notes;

		$coll -> insert(array("Email" => $name));
		header("Location: index1.html");

		exit();
	}

	else 
	{
		echo "Mail is already Exist/ left this page and try again to register"; // header("Location: where i want .html")
	}
	
	$xhr -> close();
	
	function generate($length = 6) 
	{
		$chars = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
		$code = "";

		$clen = strlen($chars)-1;
		while (strlen($code)<$length) {
			$code.=$chars[mt_rand(0,$clen)];
		}
		return $code;
	}
?>
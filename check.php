<?php 
	$xhr = new MongoClient();
	$col = $xhr-> main -> users;
	$person = $col -> findOne(array("Login" => $_POST["login1"]));

	if(md5(sha1($_POST["pass1"])) === $person["Password"]) 
	{
		setcookie('login', $person['Login'], time()+60*60*24*30);
		setcookie('hash', $person['hash'], time()+60*60*24*30);
		
		echo header("Location: index2.html");
	}
	else 
	{
		echo "ne vse ne ok";
	}

 ?>
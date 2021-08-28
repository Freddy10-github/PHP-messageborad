<?php
	$filename = "messageData.json";

	function renderMessage(){
		global $filename;
		$file = fopen( $filename, "r");
		$filesize = filesize( $filename );
		return fread( $file, $filesize );
	}

	function saveMessage($name,$nickname,$email,$message,$createTime){
		$newMessage = [
			$name,
			$nickname,
			$email,
			$message,
			$createTime];
		global $filename;
		$file = fopen($filename, 'a');
		$originMessage = json_decode(renderMessage(),TRUE);
		$originMessage[] = 	$newMessage;

		
		fwrite($file,json_encode($originMessage));
		fclose($file);		
		// $template = "
		// <div class=\"message\">
		// 	<div class=\"name\">
		// 		<h3>$name <small>$nickname</small></h3>
		// 		<i class=\"far fa-edit edit\"></i>
		// 	</div>
		// 	<div class=\"mailLink\"><a href=\"mailto:$email\">$email</a></div>	
		// 	<div class=\"text\">
		// 		<pre>$message</pre	>
		// 	</div>
		// 	<div class=\"times\">
		// 		<i class=\"far fa-calendar-alt\"></i>
		// 		<span class=\"time\">Create : $createTime</span>
		// 		<i class=\"far fa-calendar-alt\"></i>
		// 		<span class=\"time\">Edit : $createTime</span>
		// 	</div>
		// </div>";
	}

	$nameError="";
	$nicknameError="";
	$emailError="";
	if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["name"]) {
		$name = $_POST['name'];
		$nickname = $_POST['nickname'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$createTime = date('Y-m-d H:i');
		saveMessage($name,$nickname,$email,$message,$createTime);
	}
// 	$messageData = renderMessage();
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>汪喵 message borad</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
	<div id="edit_page">
			<textarea wrap name="message" cols="30" rows="5"></textarea>
			<button>修改</button>
	
	</div>
	<div class="container">
		<h1>汪喵 message borad</h1>
		<form method="post" class="topFrom" id="newMessage" name="newMessage" action="index.php"> 
			<div class="wrap">
				<div class="profile">
					<input type="text" id="name" placeholder="姓名" name="name">
					<span class="error_message"><?= $nameError?></span>
					<input type="text" id="nickname" placeholder="外號" name="nickname"> 
					<span class="error_message"></span>     
					<input type="email" id="email" placeholder="E-mail" name="email">  
					<span class="error_message"></span>     
				</div>                           
				<textarea name="message" cols="30" rows="5"></textarea>
			</div>  
			<input type="submit">      
		</form>
		<div class="messages">
		
		</div>		
	</div>

	
</body>
<script src="./index.js"></script>
</html>

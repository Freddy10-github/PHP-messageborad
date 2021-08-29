<?php
	$filename = "messageData.json";
	$jsonData = file_get_contents($filename);
	$data = json_decode($jsonData,TRUE);
	date_default_timezone_set('Asia/Taipei');
	

// 存入新message
	function saveMessage($name,$nickname,$email,$message,$createTime){
		global $filename,$data;
		$file = fopen($filename, 'w');
		$originMessage = $data["messages"];

		//cookie
		$cookie="";
		if(!isset($_COOKIE["dogCat"])){
			setcookie("dogCat",$email,strtotime('+30 days'));
		}
		$new = [
			"who" => !isset($_COOKIE["dogCat"])?$email:$_COOKIE["dogCat"],
			"name"=>$name,
			"nickName"=>$nickname,
			"Email"=>$email,
			"message"=>$message,
			"CreateTime"=>$createTime,
			"EditTime"=>$createTime
		];
		array_unshift($originMessage,$new);
		$json = json_encode($originMessage,JSON_UNESCAPED_UNICODE);
		$readySave = "{\"messages\":$json}";
		fwrite($file,$readySave);
		fclose($file);

	}

	$nameError="";
	$nicknameError="";
	$emailError="";
	
	// new message subl
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST['name'];
		$nickname = $_POST['nickname'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$createTime = date('Y-m-d H:i');
		saveMessage($name,$nickname,$email,$message,$createTime);
	}
?>

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
	<div class="container">
		<h1>汪喵 message borad</h1>
		<form method="post" class="topFrom" id="newMessage" name="newMessage"> 
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
			<?php
				$jsonData = file_get_contents($filename);
				$data = json_decode($jsonData,TRUE);
				foreach($data["messages"] as $key => $message):
			?>
				<div key="<?=$key?>" class="message">
					<div class="name">
						<h3><?=$message["name"]?> <small><?=$message["nickName"]?></small></h3>
						<?php
							if($_COOKIE["dogCat"]==$message["who"]){
								echo "<i class=\"far fa-edit edit\"></i>";
							}
						?>
						
					</div>
					<div class="mailLink"><a href="mailto:<?=$message["Email"]?>"><?=$message["Email"]?></a></div>	
					<div class="text">
						<pre><?=$message["message"]?></pre	>
					</div>
					<div class="times">
						<i class="far fa-calendar-alt"></i>
						<span class="time">Create : <?=$message["CreateTime"]?></span>
						<i class="far fa-calendar-alt"></i>
						<span class="time editTime">Edit : <?=$message["EditTime"]?></span>
					</div>
					<div class="edit_page">
							<textarea wrap name="message" cols="30" rows="5"></textarea>
							<button>修改</button>	
					</div>
				</div>
			<?php 
				endforeach;
			?>

		</div>		
	</div>
	
</body>
<script src="./index.js"></script>
</html>

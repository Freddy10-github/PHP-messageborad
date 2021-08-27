<?php
	$calender_icon = "<i class=\"far fa-calendar-alt\"></i>";
	$eddit_icon = "<i class=\"fas fa-edit\"></i>";
	$name="";
	$nickname="";
	$email="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST["name"];
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
		<h1>汪喵 message borad<i class="fas fa-paw"></i></h1>
		<form method="post" class="topFrom">
			<div class="wrap">
				<div class="profile">
					<input type="text" id="name" placeholder="姓名" name="name">
					<span><?= $name?></span>
					<input type="text" id="nickname" placeholder="外號" name="nickname"> 
					<span></span>     
					<input type="email" id="email" placeholder="E-mail" name="email">  
					<span></span>     
				</div>                           
				<textarea name="message" cols="30" rows="5"></textarea>
			</div>  
			<input type="submit">      
		</form>
		<div class="massages">
			<div class="massage">
				<div class="name">
					<h3>羅國豐 <small>Freddy</small></h3>
					<i class="fas fa-edit"></i>
				</div>
				<div class="mailLink"><a href="mailto:a0983330053@gmail.com">a0983330053@gmail.com</a></div>
				<div class="text">
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
				</div>
				<div class="times">
					<?= $calender_icon?>
					<span class="time">Create : now</span>
					<?= $calender_icon?>
					<span class="time">Edit : tommor</span>
				</div>
			</div>
			<div class="massage">
				<div class="name">
					<h3>羅國豐 <small>Freddy</small></h3>
					<i class="fas fa-edit"></i>
				</div>
				<div class="mailLink"><a href="mailto:a0983330053@gmail.com">a0983330053@gmail.com</a></div>
				<div class="text">
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
				</div>
				<div class="times">
					<?= $calender_icon?>
					<span class="time">Create : now</span>
					<?= $calender_icon?>
					<span class="time">Edit : tommor</span>
				</div>
			</div>
		</div>
		
	</div>

	
</body>
<script src="./index.js"></script>
</html>

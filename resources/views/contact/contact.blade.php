<?php

header('Content-Type: text/html; charset=utf-8');

session_start();

if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['message']) and !empty($_POST['captcha'])){
	
	if($_POST['captcha']!=$_SESSION['captcha']){
		die('Kod captcha jest nieprawidłowy');
		$input = $_POST;
	}else{
		$email_odbiorcy = 'example@example.com';
		
		$header = 'Reply-To: <'.$_POST['email']."> \r\n"; 
		$header .= "MIME-Version: 1.0 \r\n"; 
		$header .= "Content-Type: text/html; charset=UTF-8"; 
		$wiadomosc = "<p>Dostałeś wiadomość od:</p>";
		$wiadomosc .= "<p>Imie i nazwisko: " . $_POST['name'] . "</p>";
		$wiadomosc .= "<p>Email: " . $_POST['email'] . "</p>";
		$wiadomosc .= "<p>Wiadomość: " . $_POST['message'] . "</p>";
		
		$message = '<!doctype html><html lang="pl"><head><meta charset="utf-8">'.$wiadomosc.'</head><body>';

		$subject = 'Wiadomość ze strony...';
		$subject = '=?utf-8?B?'.base64_encode($subject).'?=';
	
		if(mail($email_odbiorcy, $subject, $message, $header)){
			die('Wiadomość została wysłana');
		}else{
			die('Wiadomość nie została wysłana');
		}
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Formularz kontaktowy</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post">
    <label for="name">Imię i nazwisko</label>
    <input type="text" name="name" id="name" placeholder="Jan Kowalski" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="example@example.com" required>

    <label for="message">Wiadomość</label>
    <textarea name="message" id="message" placeholder="Wpisz swoją wiadomość" required></textarea>
	
	<!-- <label for="captcha">Przepisz kod captcha</label>
	<img src="captcha.php" alt="Captcha">
    <input type="text" name="captcha" id="captcha" required> -->

    <input type="submit" name="submit" value="Wyślij">
</form>

</body>
</html>

<style>
body {
	font-family: Arial, Helvetica, sans-serif;
	background-color: #cce6ff;
}
form{
    width:320px;
    margin:20px auto;
    border:2px solid #ccc;
	padding:20px;
}
form label {
    display:block;
    margin-bottom:5px;
    font-weight:bold;
    font-size:12px;
    color:#555555;
}
form textarea,form input {
	padding:5px; 
	border:1px solid #ccc; 
	margin-bottom:25px; 
	width:100%;
	box-sizing: border-box;
}
form input[type=submit] {
	cursor:pointer;
	margin-bottom:0px;
}
</style>
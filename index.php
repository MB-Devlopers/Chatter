<html>
<?php
error_reporting(E_ERROR | E_PARSE);
$cookie_name = "user";
if($_COOKIE[$cookie_name] == "" or !isset($_COOKIE[$cookie_name]) ) {
	if(!isset($_POST['username'])){
		echo '<script>location.replace("join.php");</script>';
		die();
	}
    if(isset($_POST['username'])){
	$username = $_POST['username'];
	$cookie_value = $username . " #". rand() ;
	echo $cookie_value;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
	$username = strip_tags($username);
	$chat = "<b>". $username . "</b> Joined the chat";
	$fp = fopen('chat.txt', 'a');  
	fwrite($fp, $chat. "/newline");  
	fclose($fp);
    die();
	}
}
if (isset($_POST['chat'])){
	if ($_POST['chat'] != ""){
		$strip = strip_tags($_POST['chat']);
		$chat = "<b>". $_COOKIE[$cookie_name]. ":</b> ". $strip;
		$fp = fopen('chat.txt', 'a');  
		fwrite($fp, $chat. "/newline");  
		fclose($fp); 
	}
}
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<center>
	<h1>
		Chatter - Simple Chat App
	</h1>
</center>
<body>
<?php
$myfile = fopen("chat.txt", "r") or die("Unable to open file!");
$a = fread($myfile,filesize("chat.txt"));
echo "<div id=chat>". str_replace("/newline","<br>", $a). "</div>";
fclose($myfile);
?>
<form action="" method="POST">
	<input type="text" name="chat">

	<button>Submit</button>
</form>
<form action="">
	<button id=refresh style="display: none;"> Refresh</button>
</form>
</body>

<script>
window.scrollTo(0,document.body.scrollHeight);
setTimeout(() => { document.getElementById("refresh").click(); }, 8000);
</script>

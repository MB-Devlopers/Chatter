<?php
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$cookie_value = $username. " #". rand() ;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 	
	$chat = "<b>". $username . "</b> Joined the chat";
	$fp = fopen('chat.txt', 'a');  
	fwrite($fp, $chat. "/newline");  
	fclose($fp);
	header("Location: index.php");
}
?>
<h1>Enter a Username to Join the chat</h1>
<br>
<form method=POST action='index.php'>
	<input type=text name=username>
	<button>Submit</button>
</form>
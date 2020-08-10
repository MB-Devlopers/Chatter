<?php
$cookie_name = "user";
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$cookie_value = $username;
	setcookie($cookie_name, $cookie_value); 	
    $username = strip_tags($username);
	$chat = "<b>". $username . "</b> Joined the chat";
	$fp = fopen('chat.txt', 'a');  
	fwrite($fp, $chat. "/newline");  
	fclose($fp);
	header("Location: index.php");
}
?>
<h1>Enter a Username to Join the chat</h1>
<br>
<form method=POST action="join.php">
	<input type=text name="username">
	<button>Submit</button>
</form>

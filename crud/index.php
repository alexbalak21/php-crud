<!-- <?php
require_once ("model.php");
$id= 3;
$username = "Max";
$password = "Qwerty789";
$email = "alex@email.com";
$age = 25;
$img = "max.jpg";

// updateUsers($id, $username, $password, $email, $age, $img);
// deleteUser(2);
?> -->

<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>CRUD - PHP</title>
</head>
<body>
<h1>CRUD - PHP</h1>
<ul>
<li><a href="?page=read">READ</a></li>
<li><a href="?page=create">CREATE</a></li>
<li><a href="?page=update">UPDATE</a></li>
<li><a href="?page=delete">DELETE</a></li>
</ul>
<br>
<form action="index.php" method="POST">
<input type="submit" name="test" value="test">
</form>

<?php
if(isset($_GET['page'])){
$page = $_GET['page'];
if($page == "create")
require_once("views/register.php");
if($page == "read")
require_once("views/read.php");
}



if(isset($_POST['username'])){
require_once ("controller.php"); 
checkPOST();
// insertUsers($username, $password, $email, $age, $img)
}



//DEBUG - TO REMOUVE 
echo "<br><br><br>GET:<br>";
print_r($_GET);
echo "<br><br>POST:<br>";
print_r($_POST);
print_r($_GET);
echo "<br><br>SERVER:<br>";
print_r($_SERVER);

?>
</body>
</html>
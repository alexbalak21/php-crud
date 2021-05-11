<?php
echo "CONTROLLER";
function checkPOST(){
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
$age = $_POST['age'];
$img = $_POST['img'];
if($password != $password2){
echo "PASSWORDS DID NOT MATCH";
return null;
}
createUser($username, $password, $email, $age, $img);
}


?>
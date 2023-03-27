<?php
session_start();
include_once("User.php");
if(isset($_POST['submit'])){
    if (empty($_POST['username'])&& empty($_POST['password'])&& empty($_POST['email'])) {
        header("location:register.php");}
        else{   
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email=$_POST['email'];
        $conn = new PDO('mysql:host=localhost;dbname=gi_dd', 'root',"");
        $query = "insert into users (username,email,password) values(:u,:e,:p)";
        $stm = $conn->prepare($query);
        $stm->execute(["u"=>$username ,"e"=>$email ,"p"=>$password]);

    header("location:login.php");   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="login.css">

</head>
<body>
    
<form  method="POST">
    <article>
      Username:<input type="text" id="username" name="username" >
<pre>Email:     <input type="email" id="email" name="email" ></pre>
<pre>
    
password:  <input type="password" id="password" name="password" ></pre>
<pre>     <button name="submit">Submit</button></pre>
</article>
</form>
</body>
</html>
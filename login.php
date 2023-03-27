<?php 
session_start();
 
if (isset($_POST["login"])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        header("location:login.php");}
        else{
    if (isset($_POST["username"]) && isset($_POST["password"])) {
    function getuser(){
    $conn = new PDO("mysql:host=localhost;dbname=gi_dd","root","");
    $query = "SELECT * FROM users";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);}
        $users = getuser();
        //print_r($users);
        foreach ($users as $u) {
            if ($u["username"] == $_POST["username"] && $u["password"] == $_POST["password"]) {
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["id"] = $u["id"];
                header("location:index.php");
            }
            
        }
    }}
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
<form  method="POST">
    <section>
Username:<input type="text" id="username" name="username" ><br>
<pre>password:  <input type="password" id="password" name="password" ></pre>
<button><a href="register.php"> Sign up </a></button>
<button name="login" value="submit">Login</button>
</section>
</form>
</body>
</html> 
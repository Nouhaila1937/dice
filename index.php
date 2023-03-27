<?php
session_start();
// include_once("User.php");
if (array_key_exists("username", $_SESSION)) {
$id = $_SESSION['id'];
}
if(isset($_POST['score'])){
    $score = $_POST['score'];
    function updateScore($id, $score)
    {   $conn = new PDO("mysql:host=localhost;dbname=gi_dd","root","");
        $query = "UPDATE USERS SET score=$score WHERE id=$id";
        $stmt = $conn->prepare($query);
        return $stmt->execute();
    }

    updateScore($id, $score);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<form action="" method="POST">
 <button class="a"><a href="logout.php" >Logout</a></button>
</form>
<?php
function getuser(){
$conn = new PDO("mysql:host=localhost;dbname=gi_dd","root","");
$query = "SELECT *FROM USERS ORDER BY SCORE DESC";
$stmt=$conn->prepare($query);
$stmt->execute();
    return $stmt->fetchAll();
}
$user = getuser();

?>
<section>
<div class="container">
    <img src="images/1.svg">
    <div id="pscore">Sum:0</div>
    <div id="scoree">Score:</div>
    <div name="score" id="score">0</div>
    <button name="lance" id="lance">Lance</button>
    <button name="save" id="save">Save</button>
    <button id="nv" name="nv">Nouveau</button>
    <?php 
    $username = $_SESSION['username'];
echo "<h1 class='use'>".$username."</h1>";  ?>
    </div>
<article>
<?php
foreach($user as $u){
    echo "<div class='user'>".$u['username']." : ".$u['score']."</div>";
}
?>
</article>
</section>
<script src="script.js"></script>
</body>
</html>



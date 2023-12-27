<?php
session_start();
include("../config/connect.php");
if (isset($_POST['out'])){
    session_destroy();
    header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>correction</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
<!--    <link rel='stylesheet' type='text/css' media='screen' href='../assets/css/quiz.css'>-->
</head>
<body>
<div class="app">
    <h1 class="bienvenue">Here is a Review, <?php echo $_SESSION['NickName']; ?> !</h1>
    <div class="quiz">
        <h2 id="questionE"></h2>
        <div id="answerE"></div>
        <p id="explication" ></p>
        <form action="" method="post" >
            <button id="logout" name="out" >Logout</button>
        </form>
    </div>
</div>
<script src="../js/main.js" ></script>

</body>
</html>
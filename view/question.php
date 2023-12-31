<?php
require_once '../model/reponseModel.php';
session_start();
if(empty($_SESSION['NickName'])){
    header("location: ../index.php");
}
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/question.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<!--<h1>--><?php
//        echo $_SESSION['NickName'];
//    ?><!--</h1>-->
<div class="blob2">
    <h1>Score : <span id="score">0</span> </h1>
    <div class="container">
        <div class="progress">
            <div class="percent"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul id="progress-bar" class="progressbar">
                        <li class="active">Question 1</li>
                        <li>Question 2</li>
                        <li>Question 3</li>
                        <li>Question 4</li>
                        <li>Question 5</li>
                        <li>Question 6</li>
                        <li>Question 7</li>
                        <li>Question 8</li>
                        <li>Question 9</li>
                        <li>Question 10</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="time">
        <div id="timer">10</div>
    </div>
</div>
<div class="question-section">

    <div class="question">

        <h1 id="question"></h1>
        <div class="Reponse" id="answer-buttons">
            <button class="Reponse" type="button" onclick="changeBackgroundColor(this)"></button>
        </div>
    </div>
</div>

<div class="blob1">
    <div class="svg"></div>
</div>

<div class="nextbtn">
    <button id="next-btn">Next</button>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js
"></script>
<script src="../js/main.js"></script>


</body>
</html>
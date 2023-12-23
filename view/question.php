<?php
require_once '../model/questionModel.php';
session_start();
$questionClass = new Quiz();
$questions = $questionClass->SelectQuestion();
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
<body>
<!--<h1>--><?php
//        echo $_SESSION['NickName'];
//    ?><!--</h1>-->
<div class="blob2">
    <h1>Score : 0</h1>
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
        <div id="timer">
            20
        </div>
        <div>
</div>
<div class="question-section">

    <div class="question">
        <?php
        foreach ($questions as $qestion) :
        ?>
        <h1>
            <?php echo $qestion['Question']; ?>
        </h1>
        <?php endforeach; ?>
    </div>

<!--    <form method="post">-->
    <div class="Reponse">
        <button type="submit" id="button1" class="btn" name="btnone" onclick="changeBackgroundColor('button1')">Reponse 1</button>
        <button type="submit" id="button2" class="btn" name="btnone" onclick="changeBackgroundColor('button2')">Reponse 2</button>
        <button type="submit" id="button3" class="btn" name="btnone" onclick="changeBackgroundColor('button3')">Reponse 3</button>
        <button type="submit" id="button4" class="btn" name="btnone" onclick="changeBackgroundColor('button4')">Reponse 4</button>

    </div>
<!--    </form>-->

</div>
<div class="blob1">
    <div class="svg"></div>
</div>

<div class="nextbtn">
    <button id="Next" >Next</button>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../js/question.js"></script>
<script src="../js/main.js"></script>


            <script >
                var timer;
                var ele = document.getElementById('timer');

                (function () {
                    var sec = 20;
                    timer = setInterval(() => {
                        ele.innerHTML = sec;
                        sec--;

                        if (sec < 0) {
                            clearInterval(timer);
                        }
                    }, 1000);
                })();

            </script>
</body>
</html>
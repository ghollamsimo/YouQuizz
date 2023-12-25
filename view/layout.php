<?php
    session_start();
    if (isset($_POST['submit'])){
        $_SESSION['NickName'] = $_POST['NickName'];
        header( 'location: ../Quiz/view/question.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Quizz Game</title>
</head>
<body>
<div class="blob2">
    <div class="svg"></div>
</div>

<div class="container">
    <div class="login">
        <div class="left">
            <h1 class="text-3xl">Welcome To YouQuizz</h1>
            <h3>Dive into the World of YouQuizz!</h3>
            <div class="blob">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#5D3587"
                          d="M65.8,-51.8C81.4,-33,87.3,-5.8,81.3,17.8C75.3,41.4,57.3,61.5,35.1,71.8C12.9,82.1,-13.6,82.6,-36.2,72.6C-58.9,62.7,-77.8,42.4,-82.9,19.1C-88.1,-4.1,-79.5,-30.3,-63.4,-49.3C-47.3,-68.3,-23.6,-80.1,0.8,-80.7C25.1,-81.3,50.3,-70.7,65.8,-51.8Z"
                          transform="translate(100 100)" />
                </svg>
                <img class="img" src="img" alt="">
            </div>
        </div>
        <div class="right">
            <h4><span><i class='bx bx-leaf'></i></span>YouQuizz</h4>
            <h1 class="text-3xl">You can Add Nick Name In YouQuizz !</h1>
            <div class="inputs">
                <form method="post">
                <form action="" method="post">
                    <input class="input" type="text" name="NickName" placeholder="Enter Your Name "
                           id="exampleInputPassword1">
                    <input data-modal-target="popup-modal" data-modal-toggle="popup-modal"  type="button"  value="Valide" class="submit bg-[#392467] my-10">

            </div>

        </div>
    </div>
</div>

<div class="blob1">
    <div class="svg"></div>
</div>


<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-[100%] md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[40rem] max-h-full">
        <div class="relative bg-white rounded-lg shadow">
<!--            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent  hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="popup-modal">-->
<!--                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">-->
<!--                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>-->
<!--                </svg>-->
<!--                <span class="sr-only">Close modal</span>-->
<!--            </button>-->
            <div class="p-4 md:p-5 text-center">
                <h3 class="mb-5 text-2xl font-bold text-[#392467]">YouQuiz Game Chart</h3>
                <hr>
                <p class="text-[#5D3587] m-5 text-lg">Customize this chart based on the specific features and goals of your "YouQuiz" project. Regularly monitoring these engagement metrics will help you make informed decisions to enhance user experience and keep your audience engaged.</p>
                <button data-modal-hide="popup-modal" type="button" class="button text-center me-2">
                    Exit Game
                </button>
                <button type="submit" name="submit" class="button">Continue</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--<script src="../js/question.js"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>
</html>

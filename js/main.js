function changeBackgroundColor(clickedButton) {
    clickedButton.style.backgroundColor = "#392467";
    clickedButton.style.color = 'white';
}


const questionElement = document.getElementById("question");
const answerButton = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");

let array = [];
let currentQuestionIndex = 0;
let score = 0;

window.onload = () => {
    let xml = new XMLHttpRequest();

    xml.onreadystatechange = () => {
        if (xml.readyState === 4 && xml.status === 200) {
            array = JSON.parse(xml.responseText);
            showQuestion();
        }
    };

    xml.open("GET", "../model/questionModel.php", true);
    xml.send();
}

function showQuestion() {
    resetState();
    let currentQuestion = array[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement.innerHTML = questionNo + ". " + currentQuestion.question_text;

    // Supprimer tous les écouteurs d'événements existants
    Array.from(answerButton.children).forEach(button => {
        button.removeEventListener("click", selectReponse);
    });

    currentQuestion.Answer.forEach(reponse => {
        const button = document.createElement("button");
        button.innerText = reponse.Answer;
        button.classList.add("btn");
        answerButton.appendChild(button);
        if (reponse.correct) {
            button.dataset.correct = 'true';
        }

        button.addEventListener("click", selectReponse);
    });
    console.log('hhhhhhh', response)
    console.log("Current Question:", currentQuestion);
}

function resetState() {
    nextButton.style.display = 'none';
    while (answerButton.firstChild) {
        answerButton.removeChild(answerButton.firstChild);
    }
}

function selectReponse(event) {
    const selectedButton = event.target;
    const isCorrect = selectedButton.dataset.correct === 'true';

    if (isCorrect) {
        selectedButton.classList.add("correct");
        score++;
    } else {
        selectedButton.classList.add("incorrect");
    }

    Array.from(answerButton.children).forEach(button => {
        if (button.dataset.correct === 'true') {
            button.classList.add("correct");
        }
        button.disabled = true;
    });

    nextButton.style.display = 'block';
}

function showScore() {
    resetState();
    questionElement.innerHTML = "Score : " + score + " out of " + array.length + " !!";
    nextButton.innerHTML = "Play Again";
    nextButton.style.display = 'block';
}

function handleNextButton() {
    currentQuestionIndex++;
    if (currentQuestionIndex < array.length) {
        showQuestion();
    } else {
        showScore();
    }
}

nextButton.addEventListener("click", () => {
    if (currentQuestionIndex < array.length) {
        handleNextButton();
    } else {
        startQuiz();
    }
    console.log("Current Index:", currentQuestionIndex);

});

function startQuiz() {
    currentQuestionIndex = 0;
    score = 0;
    nextButton.innerHTML = "Next";
    showQuestion();
}


// var timer;
// var ele = document.getElementById('timer');
//
// (function () {
//     var sec = 20;
//     timer = setInterval(() => {
//         ele.innerHTML = sec;
//         sec--;
//         if (sec < 5){
//             ele.style.color = '#DF2E38'
//             if (sec < 0) {
//                 clearInterval(timer);
//                 // window.location.href = "../model/questionModel.php"
//             }
//         }
//
//     }, 1000);
// })();


// var Score
// var scorechanged = document.getElementById('score')
// function changeScore(){
//     var yourscore = 100
//     for (var i = 0 ; i < Score ; i++){
//         if (scorechanged == )
//     }
// }

const progressBar = {
    Bar: $('#progress-bar'),
    Next: function () {
        const currentActive = $('#progress-bar li.active');
        currentActive.next('li').addClass('active');
        currentActive.removeClass('active');
    }
};

$("#Next").on('click', function () {
    progressBar.Next();
});
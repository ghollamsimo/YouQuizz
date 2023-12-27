
// var Score

// function changeScore(){
//     var yourscore = 100
//     for (var i = 0 ; i < Score ; i++){
//         if (scorechanged == )
//     }
// }


const but = document.getElementById('btn')
function changeBackgroundColor(clickedButton) {
    but.style.backgroundColor = "#392467";
    but.style.color = 'white';
}

const explication = document.getElementById("explication");
const questionElement = document.getElementById("question");
const answerButton = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");
const correction =document.getElementById('correction');
const title =document.querySelector('.bienvenue')

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

    xml.open("POST", "../model/questionModel.php", true);
    xml.send();
}

function showQuestion() {
    resetState();

    let currentQuestion = array[currentQuestionIndex];

    if (currentQuestion) {
        let questionNo = currentQuestionIndex + 1;
        questionElement.innerHTML = questionNo + ". " + currentQuestion.explication;

        Array.from(answerButton.children).forEach(button => {
            button.removeEventListener("click", selectReponse);
        });

        currentQuestion.Answer.forEach(reponse => {
            const button = document.createElement("button");
            button.innerText = reponse.Answer;
            button.classList.add("btn");
            answerButton.appendChild(button);
            console.log(reponse)
            if (reponse.explication !== false) {
                button.dataset.correct = "true";
            }

            button.addEventListener("click", selectReponse);
        });
    } else {
        // Handle the case when currentQuestion is undefined (e.g., show an error message)
        console.error("Current question is undefined.");
    }

    // console.log("Current Question:", currentQuestion);
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
        console.log("correct: ", isCorrect)
        selectedButton.classList.add("correct");
        score++;
        document.querySelector("#score").innerText = score;
    } else {
        console.log("error: ")
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
// const aaa = document.getElementById('')
function showScore() {
    resetState();
    questionElement.innerHTML = "Score  : " + score + " Out Of " + array.length + " !! Or";
    window.location.href = 'http://localhost/Quiz/view/correction.php'
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
        progressBar.Next();
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
// (function timer () {
//     var sec = 10;
//     timer = setInterval(() => {
//         ele.innerHTML = sec;
//         sec--;
//
//             if (sec === 0) {
//
//                setTimeout(() => {
//                    if (currentQuestionIndex < array.length) {
//                        sec = 10;
//                        handleNextButton();
//
//                    } else {
//                        startQuiz();
//                    }
//                    clearInterval(timer);
//                },1000);
//             }
//
//     }, 1000);
// })();




const progressBar = {
    Bar: document.getElementById('progress-bar'),
    Next: function() {
        const currentActive = document.querySelector('#progress-bar li.active');
        const nextElement = currentActive.nextElementSibling;

        if (nextElement && nextElement.tagName === 'LI') {
            nextElement.classList.add('active');
            currentActive.classList.remove('active');
        }
    }
};

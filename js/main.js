function changeBackgroundColor(buttonId) {
    var clickedButton = document.getElementById(buttonId);
    clickedButton.style.backgroundColor = "#392467";
    clickedButton.style.color = 'white';

}

var timer;
var ele = document.getElementById('timer');

(function () {
    var sec = 20;
    timer = setInterval(() => {
        ele.innerHTML = sec;
        sec--;
        if (sec < 5){
            ele.style.color = '#DF2E38'
            if (sec < 0) {
                clearInterval(timer);
                // window.location.href = "../model/questionModel.php"
            }
        }

    }, 1000);
})();


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
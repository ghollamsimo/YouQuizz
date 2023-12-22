function changeBackgroundColor(buttonId) {
    var clickedButton = document.getElementById(buttonId);
    clickedButton.style.backgroundColor = "#392467";
    clickedButton.style.color = 'white';
}

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